let submitButton = document.getElementById("submit-button");
let responseSpan = document.getElementById("response-item");
let nameInput = document.getElementById("name-input");

function submitForm() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST","app.php", true);
    xmlhttp.onreadystatechange = () => {
        if(xmlhttp.status == 200){
            responseSpan.innerText = xmlhttp.responseText;
        }
    }
    xmlhttp.send("name="+nameInput.value);
    console.log("sent");
}

submitButton.addEventListener("click", () => submitForm());