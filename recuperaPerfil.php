<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $email = $_REQUEST["email"];

  $sql =<<<EOF
     select * from perfil where email = '$email';
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["perfis"] = array();
    while($row = pg_fetch_row($ret)) {
      $perfil = array();
      $perfil["id"] = $row[0];
      $perfil["nome"] = $row[2];
      $perfil["email"] = $row[1];
      $perfil["curso"] = $row[3];
      array_push($response["perfil"], $perfil);
    }
    echo json_encode($response);
  }
}

?>
