<form method="post">
    @csrf
    producto:<input type="text" name="idproducto" value="{{$compra->idproducto}}"/><br/>
    cantidad:<input type="text" name="cantidad" value="{{$compra->cantidad}}"/><br/>
    <input type="submit" /><br>
    <div>{{$mensaje}}</div>
</form>    