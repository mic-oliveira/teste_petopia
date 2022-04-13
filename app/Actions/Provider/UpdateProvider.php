<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProvider
{
    use AsAction;

    public function handle(array $provider, $id): Provider
    {
        $updatedProvider = FindProvider::run($id);
        $updatedProvider->fill($provider);
        isset($provider['address']) ? $updatedProvider->addressable->fill($provider['address'])->save() : null;
        isset($provider['document']) ? $updatedProvider->documentation->fill($provider['document'])->save() : null;
        $updatedProvider->save();
        return $updatedProvider->refresh();
    }
}
