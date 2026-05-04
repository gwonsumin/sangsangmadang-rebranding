$(function(){
    var heroSwiper = new Swiper('.hero',{
        spaceBetween:30,
        loop:true,
        pagination:{
            el:'.swiper-pagination',
            clickable:true
        },
        autoplay:{
            delay:3500,
            disableOnInteraction:false
        },
        navigation:{
            nextEl:'.swiper-button-next',
            prevEl:'.swiper-button-prev'
        }
    })

})