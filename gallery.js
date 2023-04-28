let gallery1 = document.querySelector("#photo1");

const photos = ["img/1.jpg", "img/2.jpg", "img/3.jpg", "img/4.jpg", "img/5.jpg"];
const intervalTime = 14;
let i = 1;

gallery1.style.opacity = 1;

function fadeIn(photo){
    let interval;
    interval = setInterval(() => {
        if(photo.style.opacity < 1){
            photo.style.opacity -= -0.05;
        } else{
            clearInterval(interval);
        }
    }, intervalTime);
}

function fadeOut(photo){
    let interval;
    interval = setInterval(() => {
        if(photo.style.opacity > 0){
            photo.style.opacity -= 0.05;
        } else{
            clearInterval(interval);
        }
    }, intervalTime);
}

function switchPhoto(gallery){
    if(i == photos.length){
        i = 0;
    }
    let photo = photos[i];

    fadeOut(gallery);
    setTimeout(() => {
        fadeIn(gallery);
        gallery.src = photo;
    }, (intervalTime * 20));

    i++;
}

setInterval(() => {
    switchPhoto(gallery1);
}, 4000);
