<?php


if ($_GET['action'] == 'listaCompra') {

  $arrListaCompras =["Arroz", "Laranja", "Batata", "Carne", "Brocolis"];

  switch($_GET['etapa']) {
    case 'exibeLista': 
      echo "<ul>";
      foreach ($arrListaCompras as $item) {
        echo "<li>".$item. "</li>";
      }
      echo "</ul>";
      break;

    case 'adicionar2': 
    case 'removerPrimeiro': 
  }
}