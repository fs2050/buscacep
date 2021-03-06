<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\SalvarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Address;


class ControllerSearch extends Controller
{


    public function index()
    {   $address = Address::all();
        return view('listagem')->with(
            [
                'address' => $address,
            ]
        );
    }


    public function buscar()
    {
        return view('buscar');
    }

    public function search(
        Request $request
    ) {
        $cep = $request->input('cep');

        $response = Http::get(url: "https://viacep.com.br/ws/$cep/json/")->json();

        return view('salvar')->with(
            [
                'cep' => $request->input(key: 'cep'),
                'logradouro' => $response['logradouro'],

                'bairro' => $response['bairro'],
                'cidade' => $response['localidade'],
                'estado' => $response['uf'],
                'ddd' => $response['ddd']
            ]

        );
    }






    public function salvar(
        SalvarRequest $request
    ) {
        //dd($request->all());
        $address = Address::where('numero', $request->input(key: 'numero'))->first();
        $address = Address::where('complemento', $request->input(key: 'complemento'))->first();



        if (!$address){
            Address::create(
                   [
                       'cep' => $request->input('cep'),

                       'logradouro' => $request->input('logradouro'),
                       'numero' => $request->input('numero'),
                       'complemento' => $request->input('complemento'),
                       'bairro' => $request->input('bairro'),
                       'cidade' => $request->input('cidade'),
                       'estado' => $request->input('estado'),
                       'ddd' => $request->input('ddd'),
                   ]
               );
               return redirect('/')->withSuccess('Endereço salvo com sucesso!');
           }
            //dd($address->id);

            return redirect('/')->withError('Endereço já está cadastrado!');
    }
}
