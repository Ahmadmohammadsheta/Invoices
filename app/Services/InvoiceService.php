<?php

namespace App\Services;

use App\Models\Invoice;
use App\Repository\InvoiceRepositoryInterface;

class InvoiceService
{
    private $invoiceRepository;
    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function allInvoices()
    {
        return $this->invoiceRepository->all();
    }

    public function latest()
    {
        return Invoice::latest()->first();
    }

    public function find($id)
    {
        return Invoice::find($id);
    }

    public function update(Invoice $product, array $data)
    {
        $product->update($data);

        return $product;
    }
}
