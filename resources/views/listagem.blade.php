@extends('includes/app')

@section('content')


    <div class="container">

        <h1 class="text-center">ENDEREÇOS CADASTRADOS</h1>

        <a class="btn btn-primary"href="{{route('buscar')}}">
            Adicionar CEP
        </a>

        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
        @endif

        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Logradouro</th>
                    <th scope="col">Número</th>
                    <th scope="col">Complemento</th>

                    <th scope="col">Bairro</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">DDD</th>
                    <th scope="col">Data de Criação</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($address as $key => $addres_s)




                    <tr>

                        <td>{{ $addres_s->id }}</td>
                        <td>{{ $addres_s->cep }}</td>

                        <td>{{ $addres_s->logradouro }}</td>
                         <td>{{ $addres_s->numero }}</td>
                         <td>{{ $addres_s->complemento }}</td>
                        <td>{{ $addres_s->bairro }}</td>
                        <td>{{ $addres_s->cidade }}</td>
                        <td>{{ $addres_s->estado }}</td>
                        <td>{{ $addres_s->ddd }}</td>
                        <td>{{ (new DateTime($addres_s->created_at))->format('d-m-Y H:i:s') }}</td>

                    </tr>

                @endforeach

            </tbody>
        </table>


    </div>
    @endsection



