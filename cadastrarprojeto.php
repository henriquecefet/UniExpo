<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $nome= $_REQUEST["nome"];
  $descricaoProjeto = $_REQUEST["descricaoProjeto"];
  $nomeOrientador = $_REQUEST["nomeOrientador"];
  $idPerfil = $_REQUEST["idperfil"];
  $sql =<<<EOF
     INSERT INTO public.projeto (nome, descricao ,orientador)
     VALUES ('$nome', '$descricaoProjeto', '$nomeOrientador' );
EOF;
  $ret = pg_query($db, $sql);

$sql2 =<<<EOF
     SELECT idprojeto FROM public.projeto where nome = $nome;
EOF;
  $ret2 = pg_query($db, $sql2);
  while($row = pg_fetch_row($ret2)) {
    $idprojeto = $row[0];
  }

  $sql3 =<<<EOF
     INSERT INTO public.perfil_projeto (perfil_idperfil,projeto_idprojeto)
     VALUES ($idPerfil, $idprojeto, '$nomeOrientador' );
EOF;
  $ret3 = pg_query($db, $sql3);

  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
      header("Location: https://projetouniexpo.herokuapp.com/UniExpo/perfil.html");
  }
}

?>
