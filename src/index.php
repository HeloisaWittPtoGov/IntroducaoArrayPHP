<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="ISO8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
      $(function(){
        $("#BtnExibirListaCompras").on("click", function(){
          $.get(
            "controller.php",
            {
              action: "listaCompra",
              etapa: "exibeLista",
            },
            
            function(response){
            $("#exibiListaCompras").append(response)
              $("#BtnAdicionar2").prop("disabled", false);
              $("#BtnExibirListaCompras").prop("disabled", true);
              console.log(response)
            },
          ) 
        })
        $("#BtnAdicionar2").on("click", function(){
          $.get(
            "controller.php",
            {
              action: "listaCompra",
              etapa: "adicionar2",
            },

            function(response){
            $("#exibiListaCompras").empty(),
            $("#exibiListaCompras").append(response),
            $("#BtnRemover").prop("disabled", false);
            console.log(response)
            }
          )
        })

        $("#BtnRemover").on("click", function(){
          $.get(
            "controller.php",
            {
              action: "listaCompra",
              etapa:"removerPrimeiro",
            },
            function(response){
              $("#exibiListaCompras").empty()
              $("#exibiListaCompras").append(response)
            }
          )
        })
        $("#BtnExibirNomes").on("click", function(){
          $.get(
            "controller.php",
            {
              action: "ordenarNomes",
              etapa: "exibirNomes",
            },
            function(response){
              $("#exibeNomes").empty()
              $("#exibeNomes").append(response)
              $("#BtnOrdemAlfabetica").prop("disabled", false)
              $("#BtnOrdemDecrescente").prop("disabled", false)

            }
          )
        })
        $("#BtnOrdemAlfabetica").on("click", function(){
          $.get(
            "controller.php",
            {
              action:"ordenarNomes",
              etapa: "ordemAlfabetica"
            },
            function(response){
              $("#exibeNomes").empty()
              $("#exibeNomes").append(response)
            }
          )
        })
        $("#BtnOrdemDecrescente").on("click", function(){
          $.get(
            "controller.php",
            {
              action:"ordenarNomes",
              etapa: "ordemDecrescente"
            },
            function(response){
              $("#exibeNomes").empty()
              $("#exibeNomes").append(response)
            }
          )
        })
        $("#BtnExibirNumeros").on("click", function(){
          $.get(
            "controller.php",
            {
              action:"filtraNumeros"
            },
            function(response){
              $("#exibeNumeros").empty(),
              $("#exibeNumeros").append(response)
            }
          )
        })
        $("#BtnFiltraPares").on("click", function(){
          $.get(
            "controller.php",
            {
              action: "filtraNumeros",
              etapa: "filtraPares"
            },
            function(response){
              $("#exibeNumeros").empty().append(response)
            }
          )
        })
         $("#BtnFiltraImpares").on("click", function(){
            $.get(
              "controller.php",
              {
                action: "filtraNumeros",
                etapa: "filtraImpares"
              },
              function(response){
                $("#exibeNumeros").empty().append(response)
              }
            )
        })
        $("#BtnPesquisarFruta").on("click", function(){
          $.post(
            "controller.php",
            {
              action: "pesquisarFruta",
              fruta: $("#nmFruta").val(),
            },
            function(response){
              $("#informaFruta").empty().append(response)
            }
          )
        })
        $("#BtnExibirProdutos").on("click", function(){
          $.get(
            "controller.php",
            {
              action: "exibeProduto",
            },
            function(response){
              $("#exibeProdutos").empty().append(response)
            }
          )
        })
        $("#BtnExibeAlunos").on("click", function(){
          $.post(
            "controller.php",
            {
              action: "exibeAlunos",
              etapa:"consultaAluno",
            },
            function(response){
              $("#exibeAlunos").append(response)
            }
          )
        })
        $("#BtnIncluirAluno").on("click", function(){
          $.post(
            "controller.php",
            {
              action: "exibeAlunos",
              etapa: "incluirAlunos",
              nome: $("#nmAluno").val(),
              idade: $("#nrIdade").val(),
              nota: $("#nrNota").val(),
            },
            function(response){
              $("#exibeAlunos").empty()
              $("#exibeAlunos").append(response)
            }
          )
        })
        $("#BtnAtualizarAluno").on('click', function(){
          $.post(
            "controller.php",
            {
            action: "exibeAlunos",
            etapa: "atualizarAluno",
            nome: $("#nmAluno").val(),
            idade: $("#nrIdade").val(),
            nota: $("#nrNota").val(),
          },
          function(response){
            $("#exibeAlunos").empty()
            $("#exibeAlunos").append(response)
          }

          )
        })
        $("#BtnIncluirProdutos").on("click", function(){
          $.get(
            "controller.php",
            {
              action:"exibeProduto",
              etapa: "incluirProduto",
              produto: $("#nmProduto").val(),
              preco: $("#nrPreco").val(),
            },
            function(response){
              $("#exibeProdutos").empty()
              $("#exibeProdutos").append(response)
            }
          )
        })

      })
    </script>
  </head>
  <body>
    <div>
      <table>
        <tr>
          <td>
            <button type="button" id="BtnExibirListaCompras">Exibir Lista de Compras</button>
          </td>
          <td>
            <button type="button" id="BtnAdicionar2" disabled>Adicionar</button>
          </td>
          <td>
            <button type="button" id="BtnRemover" disabled>Remover</button>
          </td>
        </tr>
      </table>
      <ul id="exibiListaCompras"></ul>
    </div>
    <div>
      <table>
        <tr>
            <td>
              <button type="button" id="BtnExibirNomes">Exibir Nomes</td>
          <td>
            <button type="button" id="BtnOrdemAlfabetica" disabled>Ordem Alfabetica</button>
          </td>
          <td>
            <button type="button" id="BtnOrdemDecrescente" disabled>Ordem Decrescente</button>
          </td>
        </tr>
      </table>
      <ul id="exibeNomes"></ul>
    </div>
    <div>
      <table>
        <tr>
          <td>
            <button type="button" id="BtnExibirNumeros">Exibir Numeros</button>
          </td>
          <td>
            <button type="button" id="BtnFiltraPares">Filtrar Pares</button>
          </td>
          <td>
            <button type="button" id="BtnFiltraImpares">Filtrar Impares</button>
          </td>
        </tr>
      </table>
      <ul id="exibeNumeros"></ul>
    </div>
    <div>
      <table>
        <tr>
        <td style="text-align: right;">
          Fruta:
        </td>
        <td>
          <input id="nmFruta" type="text">
        </td>
        <td>
          <button type="button" id="BtnPesquisarFruta">Pesquisar</button>
        </td>
        </tr>
      </table>
      <p id="informaFruta"></p>
    </div>
    <div>
      <table>
        <tr>
          <td>
            <button type="button" id="BtnExibirProdutos">Exibir Produtos</button>
          </td>
          <td style="text-align: rigth;">
            Produto:
          </td>
          <td>
            <input id="nmProduto" type="text">
          </td>
          <td style="text-align: rigth;">
            Preco:
          </td>
          <td>
            <input id="nrPreco" type="number">
          </td>
          <td>
            <button type="button" id="BtnIncluirProdutos">Incluir Produtos</button>
          </td>
        </tr>
      </table>
      <p id="exibeProdutos"></p>
    </div>
    <div>
      <table>
        <tr>
          <td>
            <button type="button" id="BtnExibeAlunos">Exibir Alunos</button>
          </td>
          <td style="text-align: right;">
            Nome:
          </td>
          <td>
            <input id="nmAluno" type="text">
          </td>
          <td style="text-align: right;">
            Idade:
          </td>
          <td>
            <input id="nrIdade" type="number">
          </td>
          <td style="text-align: right;">
            Nota:
          </td>
          <td>
            <input id="nrNota" type="number">
          </td>
          <td>
            <button type="button" id="BtnIncluirAluno">Incluir Aluno</button>
          </td>
          <td>
            <button type="button" id="BtnAtualizarAluno">Atualizar Aluno</button>
          </td>
        </tr>
      </table>
      <ul id="exibeAlunos"></ul>
    </div>
  </body>
</html>
