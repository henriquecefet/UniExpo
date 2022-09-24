<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $email = $_GET["email"];
  $hashsenha = md5($_GET["senha"]);
  $sql =<<<EOF
     select * from perfil where email = '$email' and hashsenha = '$hashsenha';
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["perfis"] = array();
     $podeir = false;
    while($row = pg_fetch_row($ret)) {
      $podeir = true;
      $perfil = array();
      $perfil["id"] = $row[0];
      $perfil["nome"] = $row[1];
      $perfil["email"] = $row[2];
      $perfil["curso"] = $row[3];
      array_push($response["perfis"], $perfil);
      break;
    }
    if($podeir){
      echo json_encode($response);
      //echo '<script src="pacote.js"> setarInfo() </script>';
      header('Location: perfil.html');
    }
    else{
      header('Location: login.html');
    }

  }
}

?>
