<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $sobre= $_REQUEST["sobre"];
  $sql =<<<EOF
     INSERT INTO public.perfil (sobre)
     VALUES ('$sobre');
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