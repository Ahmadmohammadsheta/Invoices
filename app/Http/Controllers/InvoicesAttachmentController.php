<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicesAttachment;
use App\Services\InvoicesAttachmentService;

class InvoicesAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoicesAttachment $invoicesAttachment, InvoicesAttachmentService $invoicesAttachmentService)
    {
        return $invoicesAttachmentService->showInvoicesAttachmentFile($invoicesAttachment->invoice_number, $invoicesAttachment->file_name);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoicesAttachment $invoicesAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoicesAttachment $invoicesAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoicesAttachment $invoicesAttachment)
    {
        //
    }

    /**
     * download the specified resource from storage.
     * @param  \App\Models\InvoicesAttachment  $invoicesAttachment
     */
    public function download(InvoicesAttachment $invoicesAttachment, InvoicesAttachmentService $invoicesAttachmentService)
    {
        return $invoicesAttachmentService->downloadInvoicesAttachmentFile($invoicesAttachment->invoice_number . '/' . $invoicesAttachment->file_name, $invoicesAttachment->file_name);
    }
}
