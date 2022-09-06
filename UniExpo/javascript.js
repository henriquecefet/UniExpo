function abrirMenu() {
    document.getElementById("navbar").style.width = "250px";
}

function fecharMenu() {
    document.getElementById("navbar").style.width = "0";
}

function redirecionarLogin(){
    location.href="login.html";
}

function redirecionarCadastro(){
    location.href="cadastro.html";
}

function redirecionarCursos(){
    location.href="cursos.html";
}

function lerDados(){
  		  var settings = {
              "url": "https://projetouniexpo.herokuapp.com/recuperaPerfil.php?email=",
               "method": "GET",
               "timeout": 0,
               "processData": false,
               "mimeType": "multipart/form-data",
               "contentType": false,

          };
  		    $.ajax(settings).done(function (response) {
                console.log(response);
                var jx = JSON.parse(response);
                for (let i = 0; i < jx.perfis.length; i++) {
                    let nome = document.getElementById('nome').innerHTML(jx.perfis[i].nome);
                }
            })
}
