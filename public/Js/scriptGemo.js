let next = document.querySelector(".next")
let prev = document.querySelector(".prev")
let login = document.querySelector(".login_popup");
let hidelogin = document.querySelector(".Hidelogin");

next.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').appendChild(items[0])
    ;
})
prev.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').prepend(items[items.length - 1])
})

function next1(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').appendChild(items[0])
    
}

setInterval(next1,5000);


let iconCart = document.querySelector('.icon-cart');
let body = document.querySelector('body');
let closeCart = document.querySelector('.close');



iconCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
})
closeCart.addEventListener('click', () => {
    body.classList.toggle('showCart');
})

   



   