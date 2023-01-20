let multipleSubmitButton = document.getElementById("multiple-image-submit-button");
let singleSubmitButton = document.getElementById("single-image-submit-button");
let carouselInner = document.getElementById("carousel-inner");
let multipleFileInput = document.getElementById("multiple-file-input");
let singleFileInput =  document.getElementById("single-file-input");
let fetchingDiv = document.getElementById("fetching");
let carousel = document.getElementById("carousel");

function handleResponseData(data){
    console.log(data);
    let pathList = data.path;
    let errorList = data.error;
    if(data.request == 'multiple'){
        fetchingDiv.hidden = true;
        pathList.forEach(element => {
            carouselInner.append(generateCarouselItem(element));
        });
        carouselInner.firstElementChild.classList.add("active");
        carousel.hidden = false;
    }
}

function generateCarouselItem(url){
    let carouselImage = document.createElement("img");
    carouselImage.src = url;
    carouselImage.classList.add("d-block", "w-100");
    carouselImage.alt = "Uploaded image";

    let carouselItem = document.createElement('div');
    carouselItem.classList.add("carousel-item");
    carouselItem.append(carouselImage);

    return carouselItem;
}

async function submitForm(key,button, fileInput) {
    fileInput.disabled = true;
    button.disabled = true;
    const url = '/upload.php';
    const formData = new FormData();
    formData.append("command", key);
    for (let i = 0; i < fileInput.files.length; i++) {
        formData.append(fileInput.name, fileInput.files[i]);
    }
    
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
    fetchingDiv.hidden = false;
    handleResponseData(responseData);
}


multipleSubmitButton.addEventListener("click", () => submitForm("multiple",multipleSubmitButton, multipleFileInput));
singleSubmitButton.addEventListener('click', () => submitForm("single",singleSubmitButton, singleFileInput));