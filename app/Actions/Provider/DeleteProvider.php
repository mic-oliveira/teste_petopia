<?php

namespace App\Actions\Provider;

use Lorisleiva\Actions\Concerns\AsAction;

class DeleteProvider
{
    use AsAction;

    public function handle($id)
    {
        $provider = FindProvider::run($id);
        $provider->delete();
        return $provider->refresh();
    }
}
