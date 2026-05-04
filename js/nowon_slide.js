$(document).ready(function(){
    var swiperNowOn = new Swiper('.now-on',{
        wrapperClass:'card-list',
        slideClass:'nowon-item',

        slidesPerView:7,
        spaceBetween:30,
        loop:true,
        autoplay:{
            delay:1500,
            disableOnInteraction:false
        },

        navigation:{
            nextEl:'.btn-next',
            prevEl:'.btn-prev'
        }
    })

    //자동 슬라이드 호버시 정지
    $('.card-list').on({
        mouseover:function(){
            swiperNowOn.autoplay.stop();
        },
        mouseout: function(){
            swiperNowOn.autoplay.start();
        }
    })





})