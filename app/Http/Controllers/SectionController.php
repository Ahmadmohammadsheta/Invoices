<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
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
    public function index(Request $request)
    {
        // Check if the request is for an API response.
        if ($request->acceptsJson())
        {
            // Return an API response.
            return $this->sendResponse($this->sectionRepository->all(), "", 200);
        }
        return view('sections.index', ['data' => $this->sectionRepository->all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        $data = $this->sectionRepository->create($request->validated());

        // Check if the request is for an API response.
        if ($request->acceptsJson())
        {
            // Return an API response.
            return $this->sendResponse($data, 'تم تسجيل الدخول بنجاح.', 201);
        }

        // Otherwise, return the view.
        return redirect()->route('sections.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section, Request $request)
    {
        // Check if the request is for an API response.
        if ($request->acceptsJson())
        {
            // Return an API response.
            return $this->sendResponse($this->sectionRepository->find($section->id), "", 200);
        }

        return view('sections.show', ['data' => $this->sectionRepository->find($section->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionRequest $request)
    {
        $data = $this->sectionRepository->edit($request->id, $request->validated());
        return redirect()->route('sections.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $this->sectionRepository->delete($request->id);
        return redirect()->route('sections.index')->with('danger', 'تم الحذف بنجاح');
    }
}
