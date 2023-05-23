const user = "/users";
const book = "/books";

// Display all users
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

// Display one user
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

// Display all books
const button2 = document.createElement("button");
button2.innerHTML = "Afficher les livres ?";
document.body.append(button2);

button2.addEventListener("click", async () => {

    const request = await fetch(book);
    console.log(request);
    const text = await request.text();
    div.innerHTML = "</br>"+text;
    console.log(div.innerHTML);
    
});

// Display one book
let input2 = document.createElement("input");
input2.setAttribute('type', 'text');
input2.setAttribute('placeholder', 'id du livre');
document.body.append(input2);

const submit2 = document.createElement("button");
submit2.innerText = "Envoyer"
document.body.append(submit2);

submit2.addEventListener("click", async () => {
    
    const book_id = input2.value;
    console.log(book_id);
    const request = await fetch(book+"/"+book_id)
    console.log(request);
    const text = await request.text();
    console.log(text);
    div.innerHTML = "</br>"+text;
});