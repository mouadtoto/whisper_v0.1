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



let messageContainer = document.getElementById('messageContainer');

window.Echo.private(`private.chat.${receiverId}.${SenderId}`)
    .listen('.chat-message',(e)=>{
        console.log(e);
        const message = e.message;
        const divCol = document.createElement('div');
        divCol.className = 'col-start-1 col-end-8 p-3 rounded-lg';

        // Création de l'élément div contenant les éléments enfants
        const divFlexRow = document.createElement('div');
        divFlexRow.className = 'flex flex-row items-center';

        // Création de l'élément cercle avec la lettre "A"
        const divCircle = document.createElement('div');
        divCircle.className = 'flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0';
        divCircle.textContent = 'him'; // Contenu texte

        // Création de l'élément div contenant le texte
        const divTextContainer = document.createElement('div');
        divTextContainer.className = 'relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl';

        // Création de l'élément texte
        const divText = document.createElement('div');
        divText.textContent = message; // Contenu texte

        // Ajout des éléments enfants dans leur parent respectif
        divTextContainer.appendChild(divText);
        divFlexRow.appendChild(divCircle);
        divFlexRow.appendChild(divTextContainer);
        divCol.appendChild(divFlexRow);

        messageContainer.appendChild(divCol);


    });

