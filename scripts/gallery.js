let gallery = document.querySelector("#gallery-photos");

let photos = [];
let j = 1;

for(let i = 0; i < 5; i++){
    photos.push(`images/gallery/${i+1}.jpg`);
}

setInterval(() => {
    if(j == photos.length){
        j = 0;
    }

    let photo = photos[j];
    gallery.style.opacity = 0;

    setTimeout(() => {
        gallery.src = photo;
        gallery.style.opacity = 1;
    }, 300);

    j++;
}, 4000);
