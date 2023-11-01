<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
use App\Http\Resources\Sections\SectionResource;
use App\Repository\SectionRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class SectionController extends Controller
{
    use TraitResponseTrait;
    private $sectionRepository;
    public function __construct(SectionRepositoryInterface $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $data = $this->sectionRepository->all();
    //     // Check if the request is for an API response.
    //     if ($request->wantsJson())
    //     {
    //         // Return an API response.
    //         return $this->sendResponse($data, "", 200);
    //     }
    //     return view('sections.index', ['data' => $data]);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->sectionRepository->all();

        return $request->wantsJson() ?
        $this->sendResponse(SectionResource::collection($data), "", 200) : view('sections.index', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        $data = $this->sectionRepository->create($request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('sections.index')->with('success', 'تم الاضافة بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($section, "", 200) : view('sections.show', ['data' => $section]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request, Section $section)
    {
        $data = $this->sectionRepository->edit($request->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('sections.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section, Request $request)
    {
        $data = $this->sectionRepository->delete($section->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('sections.index')->with('success', 'تم الحذف بنجاح');
    }
}
