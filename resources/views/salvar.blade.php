@extends('includes/app')
@section('content')


    <div class="container">

        <h1 class="text-center">ENDEREÇO</h1>



        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                    @endforeach
                </ul>

            </div>
         @endif




        <form action="{{route('salvar')}}" method="POST">

            @csrf

            <div class="form-group">
                <label>CEP</label>
                <input type="text" class="form-control" name="cep" value="{{$cep}}">
            </div>
            <div class="form-group">
                <label>LOGRADOURO</label>
                <input type="text" class="form-control" name="logradouro" value="{{$logradouro}}">
            </div>
            <div class="form-group">
                <label>NÚMERO</label>
                <input type="text" class="form-control" name="numero" >
            </div>
            <div class="form-group">
                <label>COMPLEMENTO</label>
                <input type="text" class="form-control" name="complemento" >
            </div>
            <div class="form-group">
                <label>BAIRRO</label>
                <input type="text" class="form-control" name="bairro" value="{{$bairro}}">
            </div>
            <div class="form-group">
                <label>CIDADE</label>
                <input type="text" class="form-control" name="cidade" value="{{$cidade}}">
            </div>
            <div class="form-group">
                <label>ESTADO</label>
                <input type="text" class="form-control" name="estado" value="{{$estado}}">
            </div>
            <div class="form-group">
                <label>DDD</label>
                <input type="text" class="form-control" name="ddd" value="{{$ddd}}">
            </div>


            <button type="submit" class="btn btn-success">salvar</button>
        </form>
    </div>

@endsection
