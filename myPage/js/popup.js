document.addEventListener("DOMContentLoaded", function(){
    const modal = document.getElementById('modal-layer');
    const chkToday = document.getElementById('chk_today');

    if (!modal) {
        return;
    }

    //오늘 날짜 생성
    const now = new Date();
    const today = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();

    //브라우저 저장소(localStorage)에서 'hidePopup'라는 이름의 값을 가져옴.
    const expiresDate = localStorage.getItem('hidePopup'); 

    //저장된 날짜와 오늘 날짜가 다를 때만 팝업 뜸.
    if(expiresDate !== today) {
        modal.style.display = 'flex';
    }

    //전역 함수로 등록하여 HTML의 onclick에서 호출 가능하게 함.
    window.closeModal = function(){ //창을 닫는 함수
        //만약 '오늘 하루 보지 않기' 체크박스가 선택되어 있다면
        if(chkToday && chkToday.checked) {
            //브라우저 저장소에 오늘 날짜 저장
            localStorage.setItem('hidePopup', today);
        } 

        //팝업창을 숨김
        modal.style.display = 'none';
    };
    modal.addEventListener('click', function(event) {
        if (event.target === modal) {
            window.closeModal();
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal.style.display === 'flex') {
            window.closeModal();
        }
    });
});
