<?php
function print_array($array) {
  echo "<ul>";
  foreach ($array as $item) {
    echo "<li>".$item. "</li>";
  }
  echo "</ul>";
  $nrItens = count($array);
  echo "Total:".$nrItens;
}

function soma_numeros($array){
  $nrSomaArray = array_sum($array);
  echo "O soma dos valor e: ".$nrSomaArray;
}

if ($_GET['action'] == 'listaCompra') {

  $arrListaCompras =["Arroz", "Laranja", "Batata", "Carne", "Brocolis"];

  switch($_GET['etapa']) {
    case 'exibeLista': 
     print_array($arrListaCompras);
      break;

    case 'adicionar2': 
      array_push($arrListaCompras,"Azeite","Maionese");
      print_array($arrListaCompras);
      break;
      
    case 'removerPrimeiro': 
    array_push($arrListaCompras,"Azeite","Maionese"); 
    array_shift($arrListaCompras);
    print_array($arrListaCompras);
    break;
  }
} 
else if ($_GET['action'] == 'ordenarNomes'){

  $arrNomes = ["Maria", "Ana", "Joao","Marina","Jose","Lucas", "Beatriz"];

  switch ($_GET['etapa']) {
    case 'exibirNomes':
      print_array($arrNomes);
      break;

    case "ordemAlfabetica":
      sort($arrNomes, SORT_STRING);
      print_array($arrNomes);
      break;

    case "ordemDecrescente": 
      rsort($arrNomes, SORT_STRING);
      print_array($arrNomes);
      break;
  }
}
else if ($_GET['action'] == 'filtraNumeros'){
  
  $arrNumeros = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'];
  echo '<pre>';
  print_r($arrNumeros);
  echo '</pre>';
  
 switch ($_GET['etapa']) {
  case 'filtraPares':
    $numerosPares = array_filter($arrNumeros,function($numero){
      return $numero % 2 == 0;
    });
    
    echo '<pre>';
    print_r($numerosPares);
    echo '</pre>';

    soma_numeros($numerosPares);;
    break;

  case 'filtraImpares':
    $numerosImpares = array_filter($arrNumeros,function($numero){
      return $numero % 2 != 0;
    });
    echo '<pre>';
    print_r($numerosImpares);
    echo '</pre>';

    soma_numeros($numerosImpares);
    break;
  }
  
}
else if ($_POST['action'] == 'pesquisarFruta'){
  $arrFrutas = ["Morango","Banana","Uva","Tangerina","Abacaxi", "Melancia"];

  $nmFruta = $_POST["fruta"];

  $indice = array_search($nmFruta, $arrFrutas);

  if ($indice !== false){
    echo "A fruta ".$nmFruta." Foi encontrada na posicao:".$indice;
  } else{
    echo "A fruta ".$nmFruta." Nao foi encontrada";
  }
}
else if ($_GET['action'] == 'exibeProduto'){
  $arrProdutos = ["Arroz","Feijao","Macarrao"];
  $arrPrecos = ["5.50","7.20","4.80"];

  $produto = $_GET["produto"];
  $preco = $_GET["preco"];
   $arrListaProdutos = array_combine($arrProdutos, $arrPrecos);

  if($_GET['etapa'] =="incluirProduto"){
    $arrProdutos []= $produto;
    $arrPrecos []= $preco;

    $arrListaProdutos = array_combine($arrProdutos, $arrPrecos);
    
    echo '<pre>';
    print_r($arrListaProdutos);
    echo'</pre>';

  } else{
      echo '<pre>';
      print_r($arrListaProdutos);
      echo '</pre>';
    } 

}
else if ($_POST['action'] == 'exibeAlunos'){
  $arrAlunos =[
    "101"=>["nome"=>"Maria","idade"=>20,"nota"=>8.7],
    "102"=>["nome"=>"Lucas","idade"=>21,"nota"=>9.5],
    "103"=>["nome"=>"Ana","idade"=>19,"nota"=>6.7]
  ];
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $nota = $_POST["nota"];

  switch ($_POST['etapa']) {
    case 'consultaAluno':
      echo '<pre>';
      print_r($arrAlunos);
      echo'</pre>';
      break;
    
    case'incluirAlunos':
      $novoAluno = ['nome'=> $nome,'idade'=> $idade,'nota'=> $nota];

      $novoId = count($arrAlunos) + 101;
      $arrAlunos[$novoId]=$novoAluno;

      echo '<pre>';
      print_r($arrAlunos);
      echo'</pre>';

      break;

    case "atualizarAluno":
      $novaNota =$_POST["nota"];
      foreach($arrAlunos as &$aluno){
        if($aluno['nome']=== $nome){
          $aluno['nota'] = $novaNota;
        }
      }
      echo '<pre>';
      print_r($arrAlunos);
      echo'</pre>';
      break;

     case "filtrar8":
      $arrAlunosNota8 = array_filter($arrAlunos, function($aluno){
        return $aluno['nota'] >= 8;
      });
      echo '<pre>';
      print_r($arrAlunosNota8);
      echo'</pre>';
      break;

      case 'ordenar':
      uasort($arrAlunos, function($aluno1, $aluno2){
        if($aluno1['nota']== $aluno2['2']){
          return 0;
        }
        return ($aluno2['nota'] > $aluno1['nota']) ? 1:-1;
      });
      echo '<pre>';
      print_r($arrAlunos);
      echo'</pre>';
      break;
  }
  
  $totalAlunos = count($arrAlunos);
  $nrTotalNotas = 0;
  foreach($arrAlunos as $aluno){

   $nrTotalNotas = $nrTotalNotas + $aluno['nota'];
  }
  $nrMedia = $nrTotalNotas/$totalAlunos;

  echo "A media dos alunos e: ".$nrMedia;
  
}
