let submitButton = document.getElementById("submit-button");
let carouselInner = document.getElementById("carousel-inner");
let fileInput = document.getElementById("file-input");
let fetchingDiv = document.getElementById("fetching");
let carousel = document.getElementById("carousel");

function handleResponseData(data){

    // check if error

    fetchingDiv.hidden = true;
    carouselInner.querySelector(".active img").src = data.shift();
    data.forEach(element => {
        carouselInner.append(generateCarouselItem(element));
    });
    carousel.hidden = false;

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

async function submitForm() {
    fileInput.disabled = true;
    submitButton.disabled = true;
    const url = '/upload.php';
    const formData = new FormData();
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



submitButton.addEventListener("click", () => submitForm());