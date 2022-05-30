var hasBeenClicked = false;
$('.mobileToggler').click(function(){
    var mobileNav = document.getElementById('altList');
    if (!hasBeenClicked) {
        hasBeenClicked = true;
        mobileNav.style.display = "flex";
    } else {
        hasBeenClicked = false;
        mobileNav.style.display = "none";
    }
});

$("#owlSlider").owlCarousel({
    loop:true,
    items:1,
    nav: false,
    dots: false,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true
});

$("#owlNews").owlCarousel({
    loop: true,
    items: 3,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    slideBy: 3,
    responsive: {
        0: {
            items: 3
        },
        320: {
            items: 1
        },
        375: {
            items: 1
        },
        425: {
            items: 1
        },
        1440: {
            items: 3
        }
    }
});

var twoItems = document.getElementsByClassName("twoItem");
$(".twoItem").click(function(){
    for(var i = 0; i <twoItems.length; i++){
        var active = document.getElementsByClassName("active");
        active[0].className = active[0].className.replace("active", "");
        this.classList.add("active");
    }
})