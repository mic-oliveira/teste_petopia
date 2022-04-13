<?php

namespace App\Actions\Provider;

use App\Models\Provider;
use Lorisleiva\Actions\Concerns\AsAction;

class FindProvider
{
    use AsAction;

    public function handle(int $id)
    {
        return Provider::findOrFail($id);
    }
}
