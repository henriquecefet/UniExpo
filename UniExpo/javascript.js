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

function GetInfo() {

    fetch('https://projetouniexpo.herokuapp.com/login.php?email=calopsita.chapeu%40gmail.com&senha=senha123')
        .then(response => response.json())
        .then(data => {

            document.getElementById('nome').innerHTML="nome";

        })

        .catch(err => alert("Something Went Wrong: Try Checking Your Internet Coneciton"))
}
