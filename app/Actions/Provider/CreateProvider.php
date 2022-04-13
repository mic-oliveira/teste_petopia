<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateProvider
{
    use AsAction;

    public function handle(array $provider): Provider
    {
        $createdProvider = Provider::create($provider);
        $createdProvider->addressable()->create($provider['address']);
        $createdProvider->documentation()->create($provider['document']);
        return $createdProvider->refresh();
    }
}
