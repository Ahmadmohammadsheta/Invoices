<?php

namespace App\Repository\Eloquent;

use App\Models\Invoice;
use App\Services\InvoicesDetailService;
use App\Services\InvoicesAttachmentService;
use App\Repository\InvoiceAttachmentRepositoryInterface;
use App\Http\Traits\ImageProccessingTrait as TraitImageProccessingTrait;

class InvoiceAttachmentRepository extends BaseRepository implements InvoiceAttachmentRepositoryInterface
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

}
