<?php

namespace App\Http\Controllers;

use App\Http\Resources\Colors\ColorResource;
use App\Models\Color;
use Illuminate\Http\Request;
use App\Repository\ColorRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class ColorController extends Controller
{
        use TraitResponseTrait;
        private $colorRepository;
        public function __construct(ColorRepositoryInterface $colorRepository)
        {
            $this->colorRepository = $colorRepository;
        }

        /**
         * Display a listing of the resource.
         */
        public function index(Request $request)
        {
            $data = $this->colorRepository->all();
            return $this->sendResponse(ColorResource::collection($data), "", 200);

            return $request->wantsJson() ?
            $this->sendResponse($data, "", 200) : view('colors.index', ['data' => $data]);
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            $data = $this->colorRepository->create($request->validated());

            return $request->wantsJson() ?
            $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('colors.index')->with('success', 'تم الاضافة بنجاح');

        }

        /**
         * Display the specified resource.
         */
        public function show(Color $color, Request $request)
        {
            return $request->wantsJson() ?
            $this->sendResponse($color, "", 200) : view('colors.show', ['data' => $color]);
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Color $color)
        {
            $data = $this->colorRepository->edit($request->id, $request->validated());

            return $request->wantsJson() ?
            $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('colors.index')->with('success', 'تم التعديل بنجاح');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Color $color, Request $request)
        {
            $data = $this->colorRepository->delete($color->id);
            return $request->wantsJson() ?
            $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('colors.index')->with('success', 'تم الحذف بنجاح');
        }
    }
