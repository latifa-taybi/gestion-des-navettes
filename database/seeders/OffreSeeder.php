<?php

namespace Database\Seeders;

use App\Models\Societe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $societe = new Societe();
        $societe->name="latifa";
        $societe->description="latiiiiiiiiiiiifa";
        $societe->logo="lien";
        $societe->email="latifa@gmail.com";
        $societe->tele="0713158469";
        $societe->save();
    }
}
