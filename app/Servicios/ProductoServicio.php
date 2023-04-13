<?php
namespace App\Servicios;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Collection;

class ProductoServicio {

    public function listar():?Collection
    {
        return Producto::all();
    }

}