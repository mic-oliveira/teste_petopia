<?php

namespace App\Http\Controllers;

use App\Actions\Provider\CreateProvider;
use App\Actions\Provider\ListProviders;
use App\Actions\Provider\UpdateProvider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Http\Resources\ProviderResource;
use App\Models\Provider;
use Illuminate\Http\Response;

class ProviderController extends Controller
{

    public function index()
    {
        return ProviderResource::collection(ListProviders::run());
    }

    public function store(StoreProviderRequest $request): ProviderResource
    {
        return ProviderResource::make(CreateProvider::run($request->validated()));
    }

    public function show(Provider $provider): ProviderResource
    {
        return ProviderResource::make($provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProviderRequest  $request
     * @param  \App\Models\Provider  $provider
     * @return ProviderResource
     */
    public function update(UpdateProviderRequest $request, Provider $provider): ProviderResource
    {
        return ProviderResource::make(UpdateProvider::run($request->validated(), $provider->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return Response
     */
    public function destroy(Provider $provider)
    {
        //
    }
}
