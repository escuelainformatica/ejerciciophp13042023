<style>
    .rojo {
    background-color: red;
    color:white;
    font-size: 8px;
    }
</style>
<form method="post">
    @csrf
    producto:<input type="text" name="idproducto" value="{{$compra->idproducto}}"/><br/>
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