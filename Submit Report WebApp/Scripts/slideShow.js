var index = 0;slideShow();
function slideShow(){
    var images = document.getElementsByClassName("mySlides");
        for(let i=0;i<images.length;i++){
            images[i].style.display = "none";
        }
    index++;
    if(index>images.length){index=1;}
    images[index-1].style.display="block";
    setTimeout(slideShow, 4000);       
}
