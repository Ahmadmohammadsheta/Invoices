<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Repository\StockRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class StockController extends Controller
{
    use TraitResponseTrait;
    private $stockRepository;
    public function __construct(StockRepositoryInterface $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->stockRepository->all();

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('stocks.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stocks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->product_id as $key => $value) {
            $data = new Stock();
            $data->product_id = $value;
            $data->quantity = $request->quantity[$key];
            $data->price = $request->price[$key];
            $data->buying_price = $request->buying_price[$key];
            $data->color_id = $request->color_id[$key];
            $data->size_id = $request->size_id[$key];
            $data->description = $request->description[$key];
            $data->save();
        }
        // $data = $this->stockRepository->create($request->validated());
        return 'تم الاضافة بنجاح.';
        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('stocks.index')->with('success', 'تم الاضافة بنجاح');

    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($stock, "", 200) : view('stocks.show', ['data' => $stock]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $data = $this->stockRepository->edit($request->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('stocks.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock, Request $request)
    {
        $data = $this->stockRepository->delete($stock->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('stocks.index')->with('success', 'تم الحذف بنجاح');
    }
}
