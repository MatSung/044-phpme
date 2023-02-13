let submitButton = document.getElementById("submit-button");
let imageContainer = document.getElementById("single-image-container");

let nameInput = document.getElementById("name-input");
let surnameInput = document.getElementById("surname-input");
let imageInput = document.getElementById("image-input");
let checkboxInputs = [...document.getElementsByName("languages[]")];

function gatherData(){
    let formData = new FormData();
    formData.append('name', nameInput.value);
    formData.append('surname', surnameInput.value);
    formData.append('picture', imageInput.files[0]);
    checkboxInputs.forEach(element => {
        if (element.checked){
            formData.append('languages[]', element.value);
        }
    });
    return formData;
}

function handleResponseData(data){
    imageContainer.firstElementChild.src = data.final;
    imageContainer.hidden = false;
}

async function sendData(){
    let formData = gatherData();
    
    //loading data

    const url = '?page=profile-image';
    const response = await fetch(url, {
        method: 'POST',
        cache: 'no-cache',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: formData
    });

    const responseData = await response.json();

    handleResponseData(responseData);
}

function validateData(){
    let isValid = true;
    if(!nameInput.value){
        isValid = false;
    }
    if(!surnameInput.value){
        isValid = false;
    }
    return isValid;
}

submitButton.addEventListener("click",() => {
    if(validateData()){
        sendData();
    } else {
        alert("Enter data please.");
    }
});