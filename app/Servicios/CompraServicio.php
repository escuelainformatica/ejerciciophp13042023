<?php
namespace App\Servicios;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CompraServicio {
    public $request;
    
    public function __construct(Request $request) {
        $this->request=$request;
    }
    public function createInstanciaRequest() {
        return new Compra($this->request->all(["idproducto","cantidad"]));
    }


    public function listar():?Collection
    {
        return Compra::all();
    }
    public function agregar(Compra $compra):bool
    {        
        $compra->save(); // insertar o actualizar.
        // agregar el stock en producto
        $prod=Producto::find($compra->idproducto);
        if($prod===null) { // el producto no se encontro
            return false;
        }
        $prod->stock=$prod->stock+$compra->cantidad;
        $prod->save(); // aqui vs a actualizar ya que $prod es un valor leido desde la base de datos
        return true;
    }
}