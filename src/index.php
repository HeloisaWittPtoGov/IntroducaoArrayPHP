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
  </body>
</html>
