<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>운동 하자</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<script type="text/javascript" src="./js/login.js"></script>
<script>
	function check_input()
	{
    	if (!document.login_form.id.value)
    	{
     	   alert("아이디를 입력하세요");    
        	document.login_form.id.focus();
        	return;
    	}

    	if (!document.login_form.pass.value)
    	{
        	alert("비밀번호를 입력하세요");    
        	document.login_form.pass.focus();
        	return;
    	}
    	document.login_form.submit();
	}
</script>
</head>
<body> 
	<header>
    	<?php include "header_logo.php";?>
    </header>
	<section>
        <div id="join_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">		       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/login.png" onclick="check_input()"></a>
                  	</div>		    	
           		</form>
        		</div>
    		</div>
        </div>
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

