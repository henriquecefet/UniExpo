<?php
include("conexao.php");
header("Content-type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

if(isset($_GET['funcao'])){
    $funcao = $_GET['funcao'];
    switch ($funcao) {
        case "CadastrarPerfil":
            CadastrarPerfil();
            break;
    }
}
else{
    http_response_code(404);
}

function CadastrarPerfil(){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $nomme= $_REQUEST["nome"];
     $email = $_REQUEST["email"];
     $curso = $_REQUEST["curso"];
     $hashsenha = md5($_REQUEST["senha"]);
     $sql =<<<EOF
        INSERT INTO public.curso (nomme, email ,curso ,hashsenha)
        VALUES ('$nome', '$email', '$curso',  '$hashsenha ' );
EOF;

     $ret = pg_query($db, $sql);
     if(!$ret) {
        echo pg_last_error($db);
        http_response_code(501);
     } else {
        http_response_code(200);
     }
   }
   else{
       http_response_code(404);
   }
}
?>
