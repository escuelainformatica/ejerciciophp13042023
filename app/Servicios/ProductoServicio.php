<?php
namespace App\Servicios;
use App\Models\Producto;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ProductoServicio {

    public function listar():?Collection
    {
        return Producto::all();
    }
    public function exist($idProducto):bool
    {
        $obj=Producto::find($idProducto);
        return $obj!==null;
    }
    public function obtenerCombo():?Collection
    {
        try {
            $productos=Producto::orderBy('nombre')->get(["idproducto","nombre"]);
            $productos->prepend(new Producto(['id'=>null,'nombre'=>'--- seleccione un producto ---']));
        } catch(Exception $ex) {
            $productos=collect([new Producto(['id'=>null,'nombre'=>'--- no se pudo conectar ---'])]);
        }
        return $productos;
    }

}