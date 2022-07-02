function changeImage(e){
    var mainImage = document.querySelector("#single-product-image");
    var temp = mainImage.src
    mainImage.src = e.src;
    e.src = temp
}