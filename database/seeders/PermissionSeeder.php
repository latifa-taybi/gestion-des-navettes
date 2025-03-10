<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $routes = Route::getRoutes();
        foreach ($routes as $route) {
            if($route->getName() !== null){
                Permission::create([
                    'name'=>$route->getName()
                ]);
            }
        }
    }
}
