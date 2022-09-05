<?php
header("Content-type: text/html; charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$host        = "host = ec2-34-233-115-14.compute-1.amazonaws.com";
$port        = "port = 5432";
$dbname      = "dbname = dbausclhsrca45";
$credentials = "user = xmgknnbnrrfsip password=8d4babda99903940e95e1df59f23f9adead22c1ec99585f19a771e85711a5f68";
$db = pg_connect( "$host $port $dbname $credentials"  );
	if(!$db) {
	      echo "Error : Unable to open database\n";
	 } else {
	     echo "Opened database successfully\n";
	}
//CadastrarPerfil
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["funcao"] == "CadastrarPerfil")){
  $nome= $_REQUEST["nome"];
  $email = $_REQUEST["email"];
  $curso = $_REQUEST["curso"];
  $hashsenha = md5($_REQUEST["senha"]);
  CadastrarPerfil($nome, $email, $curso, $hashsenha);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["funcao"] == "CadastrarProjeto")){
  $nomme = $_REQUEST["nome"];
  $descricao = $_REQUEST["descricao"];
  $orientador = $_REQUEST["orientador"];
  CadastrarProjeto($nome, $email, $curso, $hashsenha);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST["funcao"] == "CadastrarProjetoPerfil")){
  $projeto = $_REQUEST["projeto "];
  $perfil = $_REQUEST["perfil"];
  CadastrarProjetoPerfil($projeto, $perfil);
}

function CadastrarPerfil($nome, $email, $curso, $hashsenha){
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

function CadastrarProjeto($nome, $descricao, $orientador){
        $sql =<<<EOF
           INSERT INTO public.projeto (nomme, email ,curso ,hashsenha)
           VALUES ('$nome', '$descricao', '$orientador');
EOF;
        $ret = pg_query($db, $sql);
        if(!$ret) {
           http_response_code(501);
        } else {
           http_response_code(200);
        }
  }

function CadastrarProjeto($nome, $descricao, $orientador){
              $sql =<<<EOF
                 INSERT INTO public.projeto (nomme, email ,curso ,hashsenha)
                 VALUES ('$nome', '$descricao', '$orientador');
EOF;
              $ret = pg_query($db, $sql);
              if(!$ret) {
                 http_response_code(501);
              } else {
                 http_response_code(200);
              }
  }
function CadastrarProjetoPerfil($projeto, $perfil){
                $sql =<<<EOF
                   INSERT INTO public.perfil_projeto (perfil_idperfil, projeto_idprojeto)
                   VALUES ($projeto, $perfil);
EOF;
                $ret = pg_query($db, $sql);
                if(!$ret) {
                   http_response_code(501);
                } else {
                   http_response_code(200);
                }
  }
  function lerPerfil($idPerfil){
    $sql =<<<EOF
    SELECT * from public.perfil where idperfil = $idPerfil ;
EOF;

  }

?>
