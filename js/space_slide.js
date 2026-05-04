$(document).ready(function(){  
    
    var swiperSpace = new Swiper('.space-slider',{
        wrapperClass:'space-slide-list',
        slideClass:'space-slide',
        
        spaceBetween:30,
        loop:true,
        autoplay:{
            delay:2500,
            disableOnInteraction:false
        },
        pagination:{
            el:'.space-dots',
            clickable:true,

            bulletClass:'dot',
            bulletActiveClass:'on',
            renderBullet:function(index, className){
               return '<li class="' + className + '"></li>';
            }
        }
    })

    $('.space-slide-list').on({
        mouseover:function(){
            swiperSpace.autoplay.stop();
        },
        mouseout:function(){
            swiperSpace.autoplay.start();
        }
    })

});