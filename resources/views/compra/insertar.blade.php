<style>
    .rojo {
    background-color: red;
    color:white;
    font-size: 8px;
    }
</style>
<form method="post">
    @csrf
    producto:
    <select name="idproducto">
        @foreach($productos as $producto)        
            <option value="{{$producto->idproducto}}" {{$producto->idproducto==$compra->idproducto?'selected':''}}>{{$producto->nombre}}</option>
        @endforeach
    </select><br>
    producto:
    <select name="idproducto">
        @foreach(productoServicio()->obtenerCombo() as $producto)        
            <option value="{{$producto->idproducto}}" {{$producto->idproducto==$compra->idproducto?'selected':''}}>{{$producto->nombre}}</option>
        @endforeach
    </select><br>

    @error("idproducto","compra")
    <div class="rojo">{!!$message!!}</div>        
    @enderror
    cantidad:<input type="text" name="cantidad" value="{{$compra->cantidad}}"/><br/>
    @error("cantidad","compra")
    <div class="rojo">{!!$message!!}</div>        
    @enderror
    <input type="submit" /><br>
    <div>{{$mensaje}}</div>
</form>    