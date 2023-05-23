const user = "/users";
const book = "/books";

// Display Users
const button = document.createElement("button");
button.innerHTML = "afficher les utilisateurs ?";
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