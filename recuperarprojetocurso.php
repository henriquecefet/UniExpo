<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $idcurso = $_GET["idcurso"];
  $sql =<<<EOF
    select projeto.*, curso.nome from public.projeto join perfil_projeto on (projeto_idprojeto = idprojeto) join perfil on (perfil_idperfil = idperfil) join curso on (curso_idcurso = idcurso and idcurso =   $idcurso);
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
      array_push($response["projetos"], $projeto);
    }
    echo json_encode($response);
  }
}

?>
