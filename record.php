<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>운동 하자</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header> 
<?php
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?> 
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		일지 작성
		</h3>
	    <form  name="board_form" method="post" action="record_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
					<ul>
						<li><span><input name="subject" type="radio" value="등" checked>등</span></li>	<!-- 오늘 한 운동 종목을 radio로 받는다-->
						<li><span><input name="subject" type="radio" value="가슴">가슴</span></li>
						<li><span><input name="subject" type="radio" value="복근">복근</span></li>
						<li><span><input name="subject" type="radio" value="어깨">어깨</span></li>
						<li><span><input name="subject" type="radio" value="하체">하체</span></li>
					</ul>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="location.href='read_record.php'">목록</button></li>
				<li><button type="button" onclick="check_input()">완료</button></li>
			</ul>
	    </form>
	</div>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
