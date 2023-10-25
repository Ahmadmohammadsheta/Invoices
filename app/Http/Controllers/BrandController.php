<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

use App\Repository\BrandRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class BrandController extends Controller
{
    use TraitResponseTrait;
    private $BrandRepository;
    public function __construct(BrandRepositoryInterface $BrandRepository)
    {
        $this->BrandRepository = $BrandRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->BrandRepository->all();

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('brands.index', ['data' => $data]);
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
        $data = $this->BrandRepository->create($request->validated());
        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('brands.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($brand, "", 200) : view('brands.show', ['data' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $data = $this->BrandRepository->edit($request->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, Request $request)
    {
        $data = $this->BrandRepository->delete($brand->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم الحذف بنجاح');
    }
}
