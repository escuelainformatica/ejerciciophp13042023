<style>
    .rojo {
        background-color: red;
        color:white;
    }
    </style>
<form method="post">
    @csrf
    numero:<input type="text" name="numero" value="{{$val['numero']}}"/><br/>
    @error("numero","post")
    <div class="rojo">{!!$message!!}</div>        
    @enderror
    texto1:<input type="text" name="texto1" value="{{$val['texto1']}}"/><br/>
    @error("texto1","post")
    <div  class="rojo">{{$message}}</div>        
    @enderror
    texto2:<input type="text" name="texto2" value="{{$val['texto2']}}" /><br/>
    @error("texto2","post")
    <div  class="rojo">{{$message}}</div>        
    @enderror
    <input type="submit" />
    @if ($errors->post->count())
    <ul  class="rojo">
    @foreach($errors->post->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
    @endif


</form>    