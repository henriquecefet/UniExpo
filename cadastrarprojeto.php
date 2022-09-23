<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nome= $_REQUEST["nome"];
  $descricaoProjeto = $_REQUEST["descricaoProjeto"];
  $nomeOrientador = md5($_REQUEST["nomeOrientador"]);
  $sql =<<<EOF
     INSERT INTO public.projeto (nome, descricao ,orientador)
     VALUES ('$nome', '$descricaoProjeto', '$nomeOrientador' );
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
