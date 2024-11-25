const btn_loc = document.querySelector("#btn-loc");
const mapa = document.querySelector("#mapa");

const btn_talk = document.querySelector("#btn-talk");
const btn_cancel = document.querySelector("#btn-cancel");
const blocks = document.querySelectorAll(".content");
const email_box = document.querySelector("#email-box");

var form = document.forms["mail-form"].elements;
const sub_button = document.querySelector("#sub-button");

btn_loc.addEventListener("click", () => {
    if (mapa.style.display === 'none') {
        mapa.style.display = 'flex';
        btn_loc.textContent = 'Ocultar localização';
    } else {
        mapa.style.display = 'none';
        btn_loc.textContent = 'Mostrar localização';
    }

})


btn_talk.addEventListener("click", () => {

    blocks.forEach((block) => {
        if (block.id != "email-box"){
            block.style.display = 'none';
        }
    })
    email_box.style.display = 'flex';
    btn_loc.style.display = 'none';
})

btn_cancel.addEventListener("click", () => {
    blocks.forEach((block) =>{
        if (block.id != "email-box"){
            block.style.display = 'block';
        }else {
            block.style.display = 'none';
        }
        btn_loc.style.display = 'flex';
    })
})

function validate() {
    sub_button.disabled = true;

    var valid = true;

    for (var i = 0; i < form.length; i++){
        
        if(form[i].type === "text"){

           if (form[i].value.length == 0){
                valid = false;
           } 

        }

        if(form[i].type === "number"){

            if (isNaN(form[i].value) || form[i].value.length == 0){
                 valid = false;
            } 
         }

         if(form[i].type === "checkbox"){

            if (!form[i].checked){
                 valid = false;
            } 
         }        
        }
        
        sub_button.disabled = !valid;
}

