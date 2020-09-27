function joinFunction(){
    document.getElementById("joinForm").style.display = "block";
    document.getElementById("signin").style.display = "none";
}

function closeForm(){
    document.getElementById("joinForm").style.display = "none";
}

window.onclick = function(event) {
    if (event.target == form-popup) {
        ('form-popup').style.display = "none";
    }
}

function openAction(evt, actn){
    if(actn == 'join'){
        document.getElementById("signin").style.display = "none";
        document.getElementById("register").style.display = "block";
    }else{
        document.getElementById("signin").style.display = "block";
        document.getElementById("register").style.display = "none";
        this.className += "active"; 
    }
}

function slideshow_js(){
    var slideIndex = 0;
    showSlides();

    function showSlides(){
        var i;
        var slides = document.getElementsByClassName("slides");
        var dots = document.getElementsByClassName("dot");

        for(i=0; i<slides.length; i++){
            slides[i].style.display = "none";
        }
        slideIndex++;
        if(slideIndex > slides.length){
            slideIndex = 1;
        }
        for(i=0; i< dots.length; i++){
            dots[i].className = dots[i].className.replace("active","");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += "active";
        setTimeout(showSlides, 2000);
}
}