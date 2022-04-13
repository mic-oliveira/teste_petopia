<?php

namespace App\Http\Controllers;

use App\Actions\Sale\MakeSale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;

class SaleController extends Controller
{

    public function index()
    {
        //
    }

    public function store(StoreSaleRequest $request): SaleResource
    {
        return SaleResource::make(MakeSale::run($request->validated()));
    }

    public function show(Sale $sale)
    {
        //
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    public function destroy(Sale $sale)
    {
        //
    }
}
