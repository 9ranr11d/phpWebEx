<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>운동 하자</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
  function check_input() {
  	  if (!document.message_form.rv_id.value)
      {
          alert("수신 아이디를 입력하세요!");
          document.message_form.rv_id.focus();
          return;
      }
      if (!document.message_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.message_form.subject.focus();
          return;
      }
      if (!document.message_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.message_form.content.focus();
          return;
      }
      document.message_form.submit();
   }
   function list_search() {
		window.name="adrload"; 	//이 창의 이름을 adrload로 설정
        window.open("list_search.php", "receive_list", "left=700,top=300,width=350,height=200");	//새창을 열고 그 창 이름을 receive_list로 설정
   }
</script>
</head>
<body> 
<header>
<?php include "header_message.php";?>
</header>  
<section>
   	<div id="message_box">
	    <h3 id="write_title">
	    		쪽지 보내기
		</h3>
	    <form  name="message_form" method="post" action="message_insert.php?send_id=<?=$userid?>" enctype="multipart/form-data">
	    	<div id="write_msg">
	    	    <ul>
				<li>
					<span class="col1">보내는 사람 : </span>
					<span class="col2"><?=$username?>(<?=$usernickname?>)</span>
				</li>	
				<li>
					<span class="col1">수신 아이디 : </span>
<?php
    if(isset($_POST['addck']))
    {
        $receive_nic = $_POST['addck'];	//receive_list(list_search.php)에서 addck라는 변수가 돌아 올경우 receive_nic에 넣고 아님 공백 넣는다.
    }else{
        $receive_nic = "";
    }
?>
					<span class="col2"><input name="rv_id" type="text" value="<?php echo $receive_nic;?>"></span>	<!--수신 아이디 input에 receive_nic을 넣는다.-->
					<button type="button" onclick="list_search()">주소록</button>
				</li>	
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	    <button type="button" onclick="check_input()">보내기</button>
	    	</div>	    	
	    </form>
	</div>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
