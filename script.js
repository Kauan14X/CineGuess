const input = document.getElementById("movieInput");
const suggestions = document.getElementById("suggestions");

input.addEventListener("input", () => {

    let value = input.value;

    fetch("api/suggestions.php?q=" + value)
    .then(res => res.json())
    .then(data => {

        suggestions.innerHTML = "";

        data.forEach(movie => {

            let div = document.createElement("div");
            div.innerText = movie;

            div.onclick = () => {
                input.value = movie;
                suggestions.innerHTML = "";
            };
            
            suggestions.appendChild(div)

        });

    });
});


button.addEventListener("click", () => {

fetch("api/check_guess.php", {

method: "POST",

headers:{
"Content-Type":"application/x-www-form-urlencoded"
},

body:"guess=" + input.value

})

.then(res => res.json())
.then(data => {

results.innerHTML = "";

for(let key in data){

let div = document.createElement("div");

div.innerText = key + " : " + data[key];

if(data[key] === "green") div.className = "correct";
else if(data[key] === "yellow") div.className = "close";
else div.className = "wrong";

results.appendChild(div);

}

});

});