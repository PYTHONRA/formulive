// TODO : empêcher que le formulaire soit soumis en html par le navigateur
// Quel est le principe pour empêcher ? 
/* On va empecher l'événement de soumission de se propager (event.preventDefault()) */
// D'où part l'évenement ? Du bouton, et remonte jusqu'au formulaire 
const btn = document.getElementById('btn_login');
btn.addEventListener('click', (ev) => {
    ev.preventDefault(); // pour empêche l'évenement de se propage
    submitForm(); 
    
})

/* À titre d'information, l'attribut defer dans la balise script, 
 indique que le chargement du script doit être déferré (~ différé) à la fin du chargement de la page.
 Cela permet d'éviter d'avoir à mettre la balise script en fin de page. 
 */

// TODO : rajouter les données du formulaire 
function submitForm(){
    let formParams = new URLSearchParams();  
    formParams.append('pseudo', 'James');
    formParams.append('motdepasse', 'password');
    let headers = new Headers();
    headers.append('Accept', 'application/json');
    const requestOptions = {
        method:'POST', 
        body:formParams, 
        headers: headers
    }; 
    fetch('login.php', requestOptions) // Ici il faudrait envoyer les champs de formulaire au serveur
    .then(response => response.json()) //  POur cela il faudrait indiquer au serveur que je veux du JSON 
    .then(data => console.log(data))
}