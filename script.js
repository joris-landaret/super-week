const user = "/users";
const book = "/books";

// Display Users
const button = document.createElement("button");
button.innerHTML = "Afficher les utilisateurs ?";
document.body.append(button);

const div = document.createElement("div");
document.body.append(div);

button.addEventListener("click", async () => {

    const request = await fetch(user);
    console.log(request);
    const text = await request.text();
    div.innerHTML = "</br>"+text;
    console.log(div.innerHTML);
    
});

let input = document.createElement("input");
input.setAttribute('type', 'text');
input.setAttribute('placeholder', 'id de l\'utilisateur');
document.body.append(input);
let user_id = input.value;

const submit = document.createElement("button");
submit.innerText = "Envoyer"
document.body.append(submit);

submit.addEventListener("click", async () => {
    
    const user_id = input.value;
    console.log(user_id);
    const request = await fetch(user+"/"+user_id)
    console.log(request);
    const text = await request.text();
    console.log(text);
    div.innerHTML = "</br>"+text;
});