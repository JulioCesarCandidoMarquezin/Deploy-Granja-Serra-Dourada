const btn_login = document.querySelector("#btn-login");
const btn_cad = document.querySelector("#btn_cad");
const login = document.querySelector("#login");
const cad = document.querySelector("#cadastro");

btn_cad.addEventListener("click", ()  =>{
    login.style.display = "none"; 
    cad.style.display = "flex";
})