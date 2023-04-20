<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use App\Servicios\CompraServicio;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public $compraServicio;
    public $request;
    public function __construct(CompraServicio $compraServicio, Request $request)
    {
        $this->compraServicio = $compraServicio;
        $this->request = $request;
        
    }
    public function listar()
    {
        return view("compra.listar", [
            'compras' => compraServicio()->listar(),
            'cantidadPaginas'=>compraServicio()->cantPaginas(),
            'pagina'=>request()->get("page",1)
        ]);
    }
    public function insertar()
    {
        $compra = $this->compraServicio->createInstanciaRequest();
        if ($this->request->isMethod("POST")) {
            
            if ($this->compraServicio->agregar($compra)) {
                return redirect()->route("comprarlistar");
            } else {
                return view("compra.insertar", [
                    'compra' => $compra,
                     'mensaje' => 'producto no encontrado',
                     'productos'=>productoServicio()->obtenerCombo()]);
            }
        } else {
            return view("compra.insertar", [
                'compra' => $compra, 
                'mensaje' => null,
                'productos'=>productoServicio()->obtenerCombo()]);
        }
    }
    public function formulario()
    {
        var_dump($this->request->isMethod("POST"));
        if ($this->request->isMethod("POST")) {
            $val = $this->request->validate([
                'numero' => ['required'],
                'texto1' => ['required'],
                'texto2' => ['required'],
            ]);
            var_dump($val);            
        }
        //return view()->make("compra.formulario");        
        return view("compra.formulario");
    }
    public function formulario2()
    {
        if ($this->request->isMethod("POST")) {
            $val = $this->request->validateWithBag('post', [
                'numero' => ['required','numeric'],
                'texto1' => ['required','max:5'],
                'texto2' => ['required','max:5'],
            ]);
          
        } else {
            $val=['numero'=>old("numero",0),'texto1'=>old("texto1",''),'texto2'=>old("texto2",'')];
            
        }
        return view("compra.formulario",['val'=>$val]);
    }
}