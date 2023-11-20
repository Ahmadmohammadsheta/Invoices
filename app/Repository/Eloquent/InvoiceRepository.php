<?php

namespace App\Repository\Eloquent;

use Exception;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use App\Services\InvoicesDetailService;
use App\Services\InvoicesAttachmentService;
use App\Repository\InvoiceRepositoryInterface;
use App\Http\Traits\ImageProccessingTrait as TraitImageProccessingTrait;

class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    use TraitImageProccessingTrait;
    const IMAGE_PATH = 'invoices';

   /**
    * InvoiceRepository constructor.
    *
    * @param Invoice $model
    */
    public function __construct(Invoice $model, InvoicesDetailService $invoicesDetailService, InvoicesAttachmentService $invoicesAttachmentService)
    {
        parent::__construct($model);
        $this->invoicesDetailService = $invoicesDetailService;
        $this->invoicesAttachmentService = $invoicesAttachmentService;
    }

   /**
    * @param array $attributes
    *
    * @return Invoice
    */
    public function createInvoice(array $attributes): Invoice
    {
        $attributes['created_by'] = auth()->id();
        // Create the invoice object
        $invoice = $this->model->create($attributes);

        // Create invoice details object
        $this->invoicesDetailService->createInvoicesDetailByRelation($attributes, $invoice);

        // Create invoice attachments object
        if (array_key_exists('img', $attributes)) {
            $this->invoicesAttachmentService->createInvoicesAttachmentByRelation($attributes, $invoice);
        }

        return $invoice;
    }

    /**
     * @param id $attributes
     * @return Model
     */
    public function editInvoice($id, array $attributes)
    {
        // Select the wanted invoice object
        $invoice = $this->model->findOrFail($id);

        // Update the invoice object
        $invoice->update($attributes);

        // Update invoice details object
        $this->invoicesDetailService->updateInvoicesDetailByRelation($attributes, $invoice);

        // Update invoice attachments object
        if (array_key_exists('img', $attributes)) {
            $this->invoicesAttachmentService->updateInvoicesAttachmentByRelation($attributes, $invoice);
        }

        return $invoice;
    }

    /**
     * @param id $attributes
     * @return Model
     */
    public function deleteInvoice($id): ?Invoice
    {
        // Select the wanted invoice object
        $invoice = $this->model->findOrFail($id);

        $file = $invoice->invoicesAttachment->file_name;
        // AMA.try use traancaction
        DB::beginTransaction();

        try {
            // Code that may throw an exception

            // delete the invoice object
            $invoice->delete($id);

            // delete invoice attachments object
            if ($file->exists()) {
                $this->invoicesAttachmentService->deleteInvoicesAttachmentFolder($invoice->invoice_number);
            }

            return $invoice;

        } catch (Exception $e) {
            // Code that is executed if an exception occurs
            DB::rollBack();
            // return $e->getMessage();
        }

        // Everything went well, so commit the transaction.
        DB::commit();

        // return DB::transaction(function() use($projectImage){
        //     $this->deleteImage(ProjectImage::IMAGE_PATH, $projectImage->img);
        //     $projectImage->delete();
        //     return response()->json([
        //         "success" => true,
        //         "message" => "تم حذف الصورة",
        //     ], 200);
        // });


        // $project  = Project::onlyTrashed()->findOrFail($id) ;
        // if (!count($project->levels)) {
        //     $this->deleteImages($project->projectImages()->pluck('img')->toArray(), 'projects');
        //     $project->projectImages()->delete();
        //         $project->forceDelete();
        //     return $this->sendResponse("", "تم حذف المنطقه", 200);
        // }else{
        //     return $this->sendError("لا يمكن حذف منطقه تحتوي على اقسام فرعية", [], 422);

        // }
    }
}
