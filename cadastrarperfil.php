<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nome= $_REQUEST["nome"];
  $email = $_REQUEST["email"];
  $curso = $_REQUEST["curso"];
  $hashsenha = md5($_REQUEST["senha"]);
  $sql =<<<EOF
     INSERT INTO public.curso (nomme, email ,curso ,hashsenha)
     VALUES ('$nome', '$email', '$curso',  '$hashsenha' );
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
  }
}
}

?>
