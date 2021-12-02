@extends('includes/app')

@section('content')

  <body>
    <div class="container">

        <h1 class="text-center">BUSCAR CEP</h1>
        <form action="{{route('search')}}">
            <div class="form-group">
                <label>CEP</label>
                <input type="text" class="form-control" name="cep">
            </div>
            <button type="submit" class="btn btn-success">enviar</button>
        </form>
    </div>



@endsection
