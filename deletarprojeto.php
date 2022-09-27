<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $idprojeto = $_REQUEST["idprojeto"];

  $sql =<<<EOF
  delete from projeto where idprojeto = $idprojeto;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     header('Location: https://uniexpo.herokuapp.com/UniExpo/login.html');
  }
}
?>
