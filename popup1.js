document.querySelector("#open-popup1").addEventListener("click", function(){
    document.body.classList.add("active-popup1");
});

document.querySelector("#.popup1 .close-btn").addEventListener("click", function(){
    document.body.classList.remove("active-popup1");
});