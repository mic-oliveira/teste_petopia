<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = collect([
            ['fu_code' => 12, 'fu_shortname' => 'AC', 'name' => 'Acre'],
            ['fu_code' => 27, 'fu_shortname' => 'AL', 'name' => 'Alagoas'],
            ['fu_code' => 13, 'fu_shortname' => 'AM', 'name' => 'Amazonas'],
            ['fu_code' => 16, 'fu_shortname' => 'AP', 'name' => 'Amapá'],
            ['fu_code' => 29, 'fu_shortname' => 'BA', 'name' => 'Bahia'],
            ['fu_code' => 23, 'fu_shortname' => 'CE', 'name' => 'Ceará'],
            ['fu_code' => 53, 'fu_shortname' => 'DF', 'name' => 'Distrito Federal'],
            ['fu_code' => 32, 'fu_shortname' => 'ES', 'name' => 'Espírito Santo'],
            ['fu_code' => 52, 'fu_shortname' => 'GO', 'name' => 'Goiás'],
            ['fu_code' => 21, 'fu_shortname' => 'MA', 'name' => 'Maranhão'],
            ['fu_code' => 31, 'fu_shortname' => 'MG', 'name' => 'Minas Gerais'],
            ['fu_code' => 50, 'fu_shortname' => 'MS', 'name' => 'Mato Grosso do Sul'],
            ['fu_code' => 51, 'fu_shortname' => 'MT', 'name' => 'Mato Grosso'],
            ['fu_code' => 15, 'fu_shortname' => 'PA', 'name' => 'Pará'],
            ['fu_code' => 25, 'fu_shortname' => 'PB', 'name' => 'Paraíba'],
            ['fu_code' => 26, 'fu_shortname' => 'PE', 'name' => 'Pernambuco'],
            ['fu_code' => 22, 'fu_shortname' => 'PI', 'name' => 'Piauí'],
            ['fu_code' => 41, 'fu_shortname' => 'PR', 'name' => 'Paraná'],
            ['fu_code' => 33, 'fu_shortname' => 'RJ', 'name' => 'Rio de Janeiro'],
            ['fu_code' => 24, 'fu_shortname' => 'RN', 'name' => 'Rio Grande do Norte'],
            ['fu_code' => 11, 'fu_shortname' => 'RO', 'name' => 'Rondônia'],
            ['fu_code' => 14, 'fu_shortname' => 'RR', 'name' => 'Roraima'],
            ['fu_code' => 43, 'fu_shortname' => 'RS', 'name' => 'Rio Grande do Sul'],
            ['fu_code' => 42, 'fu_shortname' => 'SC', 'name' => 'Santa Catarina'],
            ['fu_code' => 28, 'fu_shortname' => 'SE', 'name' => 'Sergipe'],
            ['fu_code' => 35, 'fu_shortname' => 'SP', 'name' => 'São Paulo'],
            ['fu_code' => 17, 'fu_shortname' => 'TO', 'name' => 'Tocantins'],
        ]);
        $states->each(function ($state) {
            State::create(
                [
                    'fu_code' => $state['fu_code'],
                    'fu_shortname' => $state['fu_shortname'],
                    'name' => mb_strtoupper($state['name']),
                ]
            );
        });
    }
}
