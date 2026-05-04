$(function(){
    var menuBtn = document.querySelector('.m-menu-btn');
    var gnb = document.querySelector('.gnb');

    menuBtn.addEventListener('click',()=>{
        //메뉴에 active 클래스 넣었다 뺐다 함
        gnb.classList.toggle('active');

        //버튼 모양 변경 (x자 만들기)
        menuBtn.classList.toggle('open');
    });



})