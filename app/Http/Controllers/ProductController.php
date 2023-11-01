<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\Products\ProductResource;
use App\Repository\UnitRepositoryInterface;
use App\Repository\ProductRepositoryInterface;
use App\Repository\SectionRepositoryInterface;
use Illuminate\View\View;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class ProductController extends Controller
{
    use TraitResponseTrait;
    private $productRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(ProductRepositoryInterface $productRepository, SectionRepositoryInterface $sectionRepository, UnitRepositoryInterface $unitRepository)
    {
        $this->productRepository = $productRepository;
        $this->sectionRepository = $sectionRepository;
        $this->unitRepository = $unitRepository;
        // $this->middleware(['permission:product-list|product-create|product-edit|product-delete'], ['only' => ['index', 'show']]);
        // $this->middleware(['permission:product-create'], ['only' => ['create', 'store']]);
        // $this->middleware(['permission:product-edit'], ['only' => ['edit', 'update']]);
        // $this->middleware(['permission:product-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('products.index', [
            'data' => $this->productRepository->all(),
            'sections' => $this->sectionRepository->all(),
            'units' => $this->unitRepository->all()
        ]);
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
    public function store(ProductRequest $request)
    {
        $this->productRepository->create($request->validated());
        return redirect()->route('products.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->productRepository->find($id);
        // dd(new ProductResource($data));
        return $this->sendResponse(new ProductResource($data), "", 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request)
    {
        $this->productRepository->edit($request->id, $request->validated());
        return redirect()->route('products.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $this->productRepository->delete($request->id);
        return redirect()->route('sections.index')->with('danger', 'تم الحذف بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getProducts($id)
    {
        $products = $this->productRepository->getProducts($id);
        return json_encode($products);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function getProduct($id)
    {
        $product = $this->productRepository->find($id);
        return json_encode($product);
    }
}
