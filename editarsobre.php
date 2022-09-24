<?php
include("conexao.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $sobre = $_REQUEST["sobre"];
  $idPerfil = $_REQUEST["idperfil"];
  $sql =<<<EOF
     UPDATE public.perfil set sobre = '$sobre' where idperfil = $idPerfil;
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
      header("Location: https://projetouniexpo.herokuapp.com/UniExpo/perfil.html");
  }
}

?>
