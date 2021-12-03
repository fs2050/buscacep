@extends('includes/app')

@section('content')

  <body>

     <!-- Adicionando Javascript -->
     <script>

        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
             /*    document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=(""); */
        /*         document.getElementById('ibge').value=(""); */
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
            /*     document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf); */
             /*    document.getElementById('ibge').value=(conteudo.ibge); */
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

        };

        </script>
        </head>

        <body>
        <!-- Inicio do formulario -->
        <div class="container">

            <h1 class="text-center">BUSCAR CEP</h1>
          <form class="form-group" method="get" action="{{route('search')}}">
            <label>CEP</label>
            <input class="form-control" name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                   onblur="pesquisacep(this.value);" required/></label><br />
           {{--  <label>Rua:
            <input name="rua" type="text" id="rua" size="60" /></label><br />
            <label>Bairro:
            <input name="bairro" type="text" id="bairro" size="40" /></label><br />
            <label>Cidade:
            <input name="cidade" type="text" id="cidade" size="40" /></label><br />
            <label>Estado:
            <input name="uf" type="text" id="uf" size="2" /></label><br />
            <label>IBGE: --}}
          {{--   <input name="ibge" type="text" id="ibge" size="8" /></label><br /> --}}

            <button type="submit" class="btn btn-success">enviar</button></form>

            </div>
        </body>




@endsection
