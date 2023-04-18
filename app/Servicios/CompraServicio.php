<?php
namespace App\Servicios;

use App\Models\Compra;
use App\Models\Producto;
use App\Rules\ProductoExiste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompraServicio
{
    public $request;
    public $productoServicio;

    public function __construct(ProductoServicio $productoServicio, Request $request)
    {
        $this->request = $request;
        $this->productoServicio = $productoServicio;
    }
    public function createInstanciaRequest()
    {
        if ($this->request->isMethod("POST")) {
            //Validator::extend()
            $val = $this->request->validateWithBag('compra', [ // redirecciona
                'idproducto' => ['required', 'numeric',new ProductoExiste($this->productoServicio)],
                'cantidad' => ['required', 'gt:0'],
            ]);
        } else { // si fallo o se abrio el formulario la primera vez.
            $val=['idproducto'=>old('idproducto',''),'cantidad'=>old('cantidad','')];

        }
        return new Compra($val); // no tiene un contexto en la base de datos
    }


    public function listar(): ?Collection
    {
        return Compra::all();
    }
    public function agregar(Compra $compra): bool
    {
        $compra->save(); // insertar o actualizar.
        // agregar el stock en producto
        $prod = Producto::find($compra->idproducto);
        if ($prod === null) { // el producto no se encontro
            return false;
        }
        $prod->stock = $prod->stock + $compra->cantidad;
        $prod->save(); // aqui vs a actualizar ya que $prod es un valor leido desde la base de datos
        return true;
    }
}