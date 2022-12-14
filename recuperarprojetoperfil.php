<?php
include("conexao.php");
if ($_SERVER["REQUEST_METHOD"] == "GET"){
  $idperfil = $_GET["id"];

  $sql =<<<EOF
  select projeto.*, endereco from public.link
  join public.projeto on (link.projeto_idprojeto = idprojeto )
  join perfil_projeto on (perfil_projeto.projeto_idprojeto = idprojeto)
  join perfil on (perfil_idperfil = idperfil and idperfil = $idperfil);
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
      $projeto["link"] = $row[4];
      array_push($response["projetos"], $projeto);
    }
    echo json_encode($response);
  }
}

?>
