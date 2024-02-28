import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
let pending = document.getElementById('Pending');
let Friends = document.getElementById('Friends');
let putdata = document.getElementById('putdata');
pending.addEventListener('click' , getpending);
Friends.addEventListener('click' , getFriends);

function getpending(){
    fetch('/requests/pending')
    .then(response => response.json())
    .then(data =>console.log(data));
}

function getFriends(){
    fetch('/requests/Friends')
    .then(response => response.json())
    .then(data =>console.log(data));
}