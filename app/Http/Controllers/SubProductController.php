<?php

namespace App\Http\Controllers;

use App\Models\SubProduct;
use Illuminate\Http\Request;
use App\Repository\SubProductRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class SubProductController extends Controller
{
    use TraitResponseTrait;
    private $subProductRepository;
    public function __construct(SubProductRepositoryInterface $subProductRepository)
    {
        $this->subProductRepository = $subProductRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->subProductRepository->all();

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('subProducts.index', ['data' => $data]);
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
        $data = $this->subProductRepository->create($request->validated());
        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('stocks.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubProduct $subProduct, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($subProduct, "", 200) : view('subProducts.show', ['data' => $subProduct]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubProduct $subProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubProduct $subProduct)
    {
        $data = $this->subProductRepository->edit($request->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubProduct $subProduct, Request $request)
    {
        $data = $this->subProductRepository->delete($subProduct->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم الحذف بنجاح');
    }
}
