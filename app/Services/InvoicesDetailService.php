<?php

namespace App\Services;

class InvoicesDetailService
{
    /**
     * create Invoices Detail to use it in the Invoice Repository
     */
    public function createInvoicesDetailByRelation(array $data, $invoice)
    {
        $data['section'] = $invoice->section->name;
        $data['product'] = $invoice->product->name;
        $data['status'] = $invoice->status;
        $data['value_status'] = $invoice->value_status;
        $data['user'] = auth()->user()->name;

        $invoice->invoicesDetail()->create($data);

        return $invoice;
    }

    /**
     * update Invoices Detail to use it in the Invoice Repository
     */
    public function updateInvoicesDetailByRelation(array $data, $invoice)
    {
        $data = [
            'section' => $invoice->section->name,
            'product' => $invoice->product->name,
            'status' => $invoice->status,
            'value_status' => $invoice->value_status,
            'user' => $invoice->invoicesDetail->user,
        ];

        $invoice->invoicesDetail()->update($data);

        return $invoice;
    }
}
