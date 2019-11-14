$('.owl-carousel').owlCarousel({
    loop:false,
    margin: 20,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            autoplay: true,
            autoplayTimeout: 3000
           
        },
        600:{
            items: 2,
            nav: false, 
            autoplayTimeout: 2500
        },
        1000:{
            items: 2,
            autoplay: true,
            loop: true,
        },
        1500:{
            items:3,
            
            loop:false,
           
        }
    }
})