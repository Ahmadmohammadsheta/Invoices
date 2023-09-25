<?php

namespace App\Services;
use App\Http\Traits\ImageProccessingTrait as TraitImageProccessingTrait;

class InvoicesAttachmentService
{
    const IMAGE_PATH = 'invoices';
    use TraitImageProccessingTrait;
    /**
     * create Invoices Attachment to use it in the Invoice Repository
     */
    public function createInvoicesAttachmentByRelation(array $data, $invoice)
    {
        $data['file_name'] = $this->setfile($data['img'], $this::IMAGE_PATH . '/' . $invoice->invoice_number, 450, 450);
        $data['created_by'] = $invoice->invoicesDetail->user;
        $invoice->invoicesAttachment()->create($data);

        return $invoice;
    }

    /**
     * update Invoices Attachment to use it in the Invoice Repository
     */
    public function updateInvoicesAttachmentByRelation(array $data, $invoice)
    {
        $this->deleteImage($this::IMAGE_PATH . '/' . $invoice->invoice_number, $invoice->invoicesAttachment->file_name);
        $data = ['file_name' => $this->setfile($data['img'], 'invoices/'.$invoice->invoice_number, 450, 450)];
        $invoice->invoicesAttachment()->update($data);

        return $invoice;
    }

    /**
     * show Invoices Attachment file to use it in the Invoice Attachment Controller
     */
    public function showInvoicesAttachmentFile($invoice_number, $file_name)
    {
        return $this->openFile($this::IMAGE_PATH . '/' . $invoice_number . '/' . $file_name);
    }

    /**
     * show Invoices Attachment file to use it in the Invoice Attachment Controller
     */
    public function downloadInvoicesAttachmentFile($path, $fileName)
    {
        return $this->downloadFile($this::IMAGE_PATH . '/' . $path, $fileName);
    }

    /**
     * delte Invoices Attachment file to use it in the Invoice Attachment Controller
     */
    public function deleteInvoicesAttachmentFile($invoice_number, $file_name)
    {
        return $this->deleteImage($this::IMAGE_PATH . '/' . $invoice_number, $file_name);
    }

    /**
     * delte Invoices Attachment file to use it in the Invoice Attachment Controller
     */
    public function deleteInvoicesAttachmentFolder($invoice_number)
    {
        return $this->deleteFilesFolder($this::IMAGE_PATH . '/' . $invoice_number);
    }
}
