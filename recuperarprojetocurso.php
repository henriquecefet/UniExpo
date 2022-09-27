<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $idcurso = $_GET["curso"];
  $sql =<<<EOF
  select projeto.*, curso.nome, endereco from link
  join public.projeto on (projeto.idprojeto = link.projeto_idprojeto)
  join perfil_projeto on (perfil_projeto.projeto_idprojeto = projeto.idprojeto)
  join perfil on (perfil_projeto.perfil_idperfil =  perfil.idperfil)
  join curso on (perfil.curso_idcurso = curso.idcurso and curso.idcurso = idcurso);
EOF;
  $ret = pg_query($db, $sql);
  if(!$ret) {
     http_response_code(501);
  } else {
     http_response_code(200);
     $response["projetos"] = array();
    while($row = pg_fetch_row($ret)) {
      $projeto = array();
      $projeto["nome"] = $row[0];
      $projeto["descricao"] = $row[1];
      $projeto["orientador"] = $row[2];
      $projeto["idprojeto"] = $row[3];
      $projeto["curso"] = $row[4];
      $projeto["link"] = $row[5];
      array_push($response["projetos"], $projeto);
    }
    echo json_encode($response);
  }
}

?>
