
        //입력과 검증 함수
        function check_input() {
            //이름 입력 여부 확인
            if(!document.signUp_form.name.value.trim()){ 
                alert("이름을 입력하세요!");
                document.signUp_form.name.focus();
                return;
            }
            //비밀번호 입력 여부 확인
            if(!document.signUp_form.pass.value.trim()){ 
                alert("비밀번호를 입력하세요!");
                document.signUp_form.pass.focus();
                return;
            }
            //비밀번호 확인 입력 여부 확인
            if(!document.signUp_form.confirmPw.value.trim()){ 
                alert("비밀번호 확인을 입력하세요!");
                document.signUp_form.confirmPw.focus();
                return;
            }
            
            //이메일 입력 여부 확인
            if(!document.signUp_form.email.value.trim()){ 
                alert("이메일을 입력하세요!");
                document.signUp_form.email.focus();
                return;
            }
            //핸드폰 번호 입력 여부 확인
            if(!document.signUp_form.tel.value.trim()){ 
                alert("핸드폰 번호를 입력하세요!");
                document.signUp_form.tel.focus();
                return;
            }

            //비밀번호와 비밀번호 확인 일치 여부
            if(document.signUp_form.pass.value.trim() != document.signUp_form.confirmPw.value.trim()){
                alert("비밀번호가 일치하지 않습니다. \n 다시 입력해주세요.");
                document.signUp_form.pass.focus();
                document.signUp_form.pass.select();//블럭지정
                return;
            }

            //모든 검증이 완료되면 폼 전송
            document.signUp_form.submit();
        }
            //폼 초기화 함수
            function reset_form(){
                document.signUp_form.id.value = "";
                document.signUp_form.name.value = "";
                document.signUp_form.pass.value = "";
                document.signUp_form.confirmPw.value = "";
                document.signUp_form.email.value = "";
                document.signUp_form.tel.value = "";
                document.signUp_form.id.focus(); //아이디 입력 창에 포커스
                return;
            }

