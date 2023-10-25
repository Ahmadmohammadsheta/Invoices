<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Repository\CategoryRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class CategoryController extends Controller
{
    use TraitResponseTrait;
    private $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->categoryRepository->all();

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('categories.index', ['data' => $data]);
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
        $data = $this->categoryRepository->create($request->validated());
        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('categories.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($category, "", 200) : view('categories.show', ['data' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $this->categoryRepository->edit($request->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, Request $request)
    {
        $data = $this->categoryRepository->delete($category->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم الحذف بنجاح');
    }
}
