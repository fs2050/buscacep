@extends('includes/app')

@section('content')

  <body>
    <div class="container">

        <h1 class="text-center">BUSCAR CEP</h1>
        <form action="{{route('search')}}">
            <div class="form-group">
                <label>CEP</label>
                {{-- <input type="text" class="form-control" name="cep" required/> --}}
                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                onblur="pesquisacep(this.value);" /></label><br />

            </div>
            <button type="submit" class="btn btn-success">enviar</button>
        </form>
    </div>
     <!-- Adicionando Javascript -->
     <script>

        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
                document.getElementById('ibge').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);
                document.getElementById('ibge').value=(conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/$cep/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

        </script>
        </head>

        <body>
        <!-- Inicio do formulario -->
          <form method="get" action="{{route('search')}}">
            <label>Cep:
            <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                   onblur="pesquisacep(this.value);" /></label><br />
           

            <button type="submit" class="btn btn-success">enviar</button></form>



@endsection
