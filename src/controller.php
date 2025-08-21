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
      array_push($arrListaCompras,"Azeite","Maionese");
      echo "<ul>";
      foreach ($arrListaCompras as $item) {
        echo "<li>".$item. "</li>";
      }
      echo "</ul>";
      break;
      
    case 'removerPrimeiro': 
    array_push($arrListaCompras,"Azeite","Maionese"); 
    array_shift($arrListaCompras);
    echo "<ul>";
      foreach ($arrListaCompras as $item) {
        echo "<li>".$item. "</li>";
      }
      echo "</ul>";
     
  }
}