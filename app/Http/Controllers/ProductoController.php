<?php

namespace App\Http\Controllers;

use App\Servicios\ProductoServicio;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public $productoServicio;
    public function __construct(ProductoServicio $productoServicio) 
    {
        $this->productoServicio=$productoServicio;
    }
    public function listar()
    {
        return view("producto.listar",['productos'=>$this->productoServicio->listar()]);
    }
}
