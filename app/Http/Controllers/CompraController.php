<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Servicios\CompraServicio;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public $compraServicio;
    public $request;
    public function __construct(CompraServicio $compraServicio,Request $request) 
    {
        $this->compraServicio=$compraServicio;
        $this->request=$request;
    }
    public function listar()
    {
        return view("compra.listar",['compras'=>$this->compraServicio->listar()]);
    }
    public function insertar()
    {
        if ($this->request->isMethod("POST")) {
            $compra=$this->compraServicio->createInstanciaRequest();
            if ($this->compraServicio->agregar($compra)) {
                return redirect()->route("comprarlistar");
            } else {
                return view("compra.insertar",['compra'=>$compra,'mensaje'=>'producto no encontrado']);
            }
        } else {
            return view("compra.insertar",['compra'=>new Compra(),'mensaje'=>null]);
        }
    }
}
