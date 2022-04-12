<?php

namespace App\Http\Controllers;

use App\Actions\Customer\CreateCustomer;
use App\Actions\Customer\ListCustomer;
use App\Actions\Customer\UpdateCustomer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CustomerController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return CustomerResource::collection(ListCustomer::run());
    }

    public function store(StoreCustomerRequest $request): CustomerResource
    {
        return CustomerResource::make(CreateCustomer::run($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return Response
     */
    public function show(Customer $customer)
    {
        //
    }

    public function update(UpdateCustomerRequest $request, Customer $customer): CustomerResource
    {
        return CustomerResource::make(UpdateCustomer::run($request->validated(), $customer->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
