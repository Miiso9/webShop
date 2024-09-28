<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bihStates = [
            "USZ" => "Unsko-sanska Zupanija",
            "PZ" => "Posavska Zupanija",
            "TZ" => "Tuzlanska Zupanija",
            "ZDK" => "Zeničko-dobojska Zupanija",
            "BPK" => "Bosansko-podrinjska Zupanija",
            "ZSB" => "Zupanija Srednja Bosna",
            "HNZ" => "Hercegovačko-neretvanska Zupanija",
            "ZZH" => "Zapadnohercegovačka Zupanija",
            "SZ" => "Sarajevska Zupanija",
            "HBZ" => "Hercegbosanska Zupanija",
            "RS"=> "Republika srpska"
        ];

        $countries = [
            ['code' => 'bih', 'name' => 'Bosna i Hercegovina', 'states' => json_encode($bihStates)],
            ['code' => 'cro', 'name' => 'Hrvatska', 'states' => null],
            ['code' => 'srb', 'name' => 'Srbija', 'states' => null],
            ['code' => 'cg', 'name' => 'Crna Gora', 'states' => null],
        ];
        Country::insert($countries);
    }
}
