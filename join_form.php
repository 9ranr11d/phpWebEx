<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>운동 하자</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/join.css">
<script>
    var checkID = null;
    var checkNic = null;
    function check_input()
    {
      if (!document.join_form.id.value) {
          alert("아이디를 입력하세요!");    
          document.join_form.id.focus();
          return;
      }

      if(checkID != 1) {
          alert("아이디 중복체크를 해주세요");
          document.join_form.id.focus();    //checkID가 1이 아니면 회원가입 불가
          return;
      }

      if (!document.join_form.nic.value) {
          alert("닉네임을 입력하세요!");    
          document.join_form.nic.focus();
          return;
      }

      if(checkNic != 1) {
          alert("닉네임 중복체크를 해주세요");
          document.join_form.nic.focus();   //checkNic가 1이 아니면 회원가입 불가
          return;
      }

      if (!document.join_form.pass.value) {
          alert("비밀번호를 입력하세요!");    
          document.join_form.pass.focus();
          return;
      }

      if (!document.join_form.pass_confirm.value) {
          alert("비밀번호확인을 입력하세요!");    
          document.join_form.pass_confirm.focus();
          return;
      }

      if (!document.join_form.name.value) {
          alert("이름을 입력하세요!");    
          document.join_form.name.focus();
          return;
      }

      if (!document.join_form.email1.value) {
          alert("이메일 주소를 입력하세요!");    
          document.join_form.email1.focus();
          return;
      }

      if (!document.join_form.email2.value) {
          alert("이메일 주소를 입력하세요!");    
          document.join_form.email2.focus();
          return;
      }

      if (document.join_form.pass.value != 
            document.join_form.pass_confirm.value) {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.join_form.pass.focus();
          document.join_form.pass.select();
          return;
      }

      document.join_form.submit();
   }

    function reset_form() {
      document.join_form.id.value = "";  
      document.join_form.pass.value = "";
      document.join_form.pass_confirm.value = "";
      document.join_form.nic.value = "";
      document.join_form.name.value = "";
      document.join_form.email1.value = "";
      document.join_form.email2.value = "";
      document.join_form.id.focus();
      return;
    }

   function check_id() {    
        window.open("join_check_id.php?id=" + document.join_form.id.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        checkID = 1;    //아이디 중복 체크 후 checkID를 1로 설정
   }
   function check_nic() {
        window.open("join_check_nic.php?nic=" + document.join_form.nic.value, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
        checkNic = 1;   //닉네임 중복 체크 후 checkNic를 1로 설정
   }
   function change_check_id(obj) {
        checkID = 0;    //함수 실행 시 checkID를 o으로 변경 
   }
   function change_check_nic(obj) {
        checkNic = 0;   //함수 실행 시 checkID를 o으로 변경
   }
</script>
</head>
<body> 
	<header>
        <?php include "header_logo.php";?>
    </header>
	<section>
        <div id="join_content">
      		<div id="join_box">
          	<form  name="join_form" method="post" action="join_insert.php">
			    <h2>회원 가입</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id" onchange="change_check_id(this)">  <!--중복체크 후 아이디를 다시 변경할 경우 chang_check_id() 실행-->
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
                       <div class="form nic">
				        <div class="col1">닉네임</div>
				        <div class="col2">
							<input type="text" name="nic" onchange="change_check_nic(this)"> <!--중복체크 후 닉네임을 다시 변경할 경우 chang_check_nic() 실행-->
				        </div>  
				        <div class="col3">
				        	<a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_nic()"></a>
				        </div>                 
			       	</div>
			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="password" name="pass">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="password" name="pass_confirm">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1">@<input type="text" name="email2">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>