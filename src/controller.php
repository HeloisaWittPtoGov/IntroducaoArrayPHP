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
      $nrItens = count($arrListaCompras);
      echo "Total de Itens:".$nrItens;
      break;

    case 'adicionar2': 
      array_push($arrListaCompras,"Azeite","Maionese");
      echo "<ul>";
      foreach ($arrListaCompras as $item) {
        echo "<li>".$item. "</li>";
      }
      echo "</ul>";
      $nrItens = count($arrListaCompras);
      echo "Total de Itens:".$nrItens;
      break;
      
    case 'removerPrimeiro': 
    array_push($arrListaCompras,"Azeite","Maionese"); 
    array_shift($arrListaCompras);
    echo "<ul>";
      foreach ($arrListaCompras as $item) {
        echo "<li>".$item. "</li>";
      }
      echo "</ul>";
      $nrItens = count($arrListaCompras);
      echo "Total de Itens:".$nrItens;
  }
} 
else if ($_GET['action'] == 'ordenarNomes'){

  $arrNomes = ["Maria", "Ana", "Joao","Marina","Jose","Lucas", "Beatriz"];

  switch ($_GET['etapa']) {
    case 'exibirNomes':
      echo "<ul>";
      foreach ($arrNomes as $item) {
        echo "<li>".$item. "</li>";
      }
      echo "</ul>";
      break;

    case "ordemAlfabetica":

    case "ordemDecrescente": 

  }
}