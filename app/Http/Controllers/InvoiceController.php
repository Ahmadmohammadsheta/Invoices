<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\InvoiceRequest;
use App\Notifications\NewInvoiceAdded;
use Illuminate\Support\Facades\Notification;
use App\Repository\InvoiceRepositoryInterface;
use App\Repository\SectionRepositoryInterface;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InvoicesExport;

class InvoiceController extends Controller
{
    private $invoiceRepository;
    public function __construct(InvoiceRepositoryInterface $invoiceRepository, SectionRepositoryInterface $sectionRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoices.index', ['data' => $this->invoiceRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ProductService $productService)
    {
        return view('invoices.create', ['sections' => $this->sectionRepository->all(), 'products'=> $productService->allProducts()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\InvoiceRequest  $request
     */
    public function store(InvoiceRequest $request)
    {
        $invoice = $this->invoiceRepository->createInvoice($request->validated());
        // $users = auth()->user();
        $users = User::first();
        Notification::send($users, new NewInvoiceAdded($invoice));
        return redirect()->route('invoices.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Invoice  $invoice
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice, ProductService $productService)
    {
        return view('invoices.edit', ['invoice' => $invoice,
        'sections' => $this->sectionRepository->all(),
        'products'=> $productService->allProducts()]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Models\Invoice  $invoice
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $this->invoiceRepository->editInvoice($invoice->id, $request->validated());
        return redirect()->route('invoices.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Invoice  $invoice
     */
    public function destroy(Request $request)
    {
        $this->invoiceRepository->deleteInvoice($request->invoice_id);
        return redirect()->route('invoices.index')->with('success', 'تم الحذف بنجاح');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Invoice  $invoice
     */
    public function printingPage(Invoice $invoice)
    {
        return view('invoices.invoice', ['invoice' => $invoice]);
    }

    /**
     * Export invoices files
     */
    public function export()
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }
}
