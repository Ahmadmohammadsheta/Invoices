<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Repository\CustomerRepositoryInterface;
use App\Http\Traits\ResponseTrait as TraitResponseTrait;

class CustomerController extends Controller
{
    use TraitResponseTrait;
    private $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attributes = array();
        $data = $this->customerRepository->forAllConditionsFinally($attributes);

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('customers.index', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     */
    public function traders(Request $request)
    {
        $attributes = array();
        $attributes['columnName'] = 'type';
        $attributes['columnValue'] = 1;

        $data = $this->customerRepository->forAllConditionsFinally($attributes);
        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('customers.index', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     */
    public function clients(Request $request)
    {
        $attributes = array();
        $attributes['columnName'] = 'type';
        $attributes['columnValue'] = 2;

        $data = $this->customerRepository->forAllConditionsFinally($attributes);

        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('customers.index', ['data' => $data]);
    }

    /**
     * Display a listing of the resource.
     */
    public function towice(Request $request)
    {
        $attributes = array();
        $attributes['columnName'] = 'type';
        $attributes['columnValue'] = 3;

        $data = $this->customerRepository->forAllConditionsFinally($attributes);
        return $request->wantsJson() ?
        $this->sendResponse($data, "", 200) : view('customers.index', ['data' => $data]);
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
    public function store(CustomerRequest $request)
    {
        // Check the user's age.
        // if (!$request->checkAge()) {
        //     return redirect()->back()->withErrors('You must be at least 18 years old to register.');
        // }
        $data = $this->customerRepository->create($request->validated());
        return $this->sendResponse("", "تم اضافة ". $data->name." بنجاح", 200);

        return $request->wantsJson() ?
        $this->sendResponse($data, 'تم الاضافة بنجاح.', 201) : redirect()->route('customers.index')->with('success', 'تم الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, Request $request)
    {
        return $request->wantsJson() ?
        $this->sendResponse($customer, "", 200) : view('customers.show', ['data' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $this->customerRepository->edit($customer->id, $request->validated());

        return $request->wantsJson() ?
        $this->sendResponse("",  "تم تعديل ". $data->name." بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Ajax update the specified resource in storage.
     */
    public function updating(CustomerRequest $request, $id)
    {
        $data = $this->customerRepository->edit($id, $request->validated());
        return $this->sendResponse($data, "تم تعديل ". $data->name." بنجاح", 200);

        return $request->wantsJson() ?
        $this->sendResponse($data, "تم التعديل بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, Request $request)
    {
        $data = $this->customerRepository->delete($customer->id);
        return $request->wantsJson() ?
        $this->sendResponse($data, "تم الحذف بنجاح", 200) : redirect()->route('subProducts.index')->with('success', 'تم الحذف بنجاح');
    }

    /**
     * Ajax remove the specified resource from storage.
     */
    public function deleting($id, Request $request)
    {
        $this->customerRepository->delete($id);
        return $this->sendResponse("", "تم الحذف بنجاح", 200);
    }
}
