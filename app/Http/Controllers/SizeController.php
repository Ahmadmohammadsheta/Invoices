<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Repository\SizeRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;


class SizeController extends Controller
{
    use TraitResponseTrait;
    private $sizeRepository;
    public function __construct(SizeRepositoryInterface $sizeRepository)
    {
        $this->sizeRepository = $sizeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->sizeRepository->all();

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('sizes.index', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->sizeRepository->create($request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('sizes.index')->with('success', 'تم الاضافة بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($size, "", 200) : view('sizes.show', ['data' => $size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $data = $this->sizeRepository->edit($request->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('sizes.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size, Request $request)
    {
        $data = $this->sizeRepository->delete($size->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('sizes.index')->with('success', 'تم الحذف بنجاح');
    }
}
