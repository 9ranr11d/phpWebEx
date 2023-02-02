<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>운동 하자</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/message.css">
<script>
	function chkBox(bool) {
		var obj = document.getElementsByName("delete_list[]");
		for(var i = 0; i < obj.length; i++) {
			obj[i].checked = bool;
		}
	}
</script>
</head>
<body> 
<header>
    <?php include "header_message.php";?>
</header>  
<section>
    <form  name="message_delete" method="post" action="message_box_delete_hq.php" enctype="multipart/form-data">
   	    <div id="message_box">
	        <h3>
<?php
	//메세지 단체 삭제
			$page = $_GET["page"];

		    $mode = $_GET["mode"];

		    if ($mode=="send")
			    echo "송신 쪽지함 > 목록보기";
		    else
			    echo "수신 쪽지함 > 목록보기";
?>
		    </h3>
	        <div>
	    	    <ul id="message">
				    <li>
                        <span class="col1"><input type="checkbox" onclick="chkBox(this.checked)"></span>
					    <span class="col2">번호</span>
				    	<span class="col3">제목</span>
				    	<span class="col4">
<?php						
					    	if ($mode=="send")
					    		echo "받은이";
					    	else
					    		echo "보낸이";
?>
	    				</span>
		    			<span class="col5">등록일</span>
			    	</li>
<?php
	$con = mysqli_connect("localhost", "user1", "12345", "sports");

	if ($mode=="send")
		$sql = "select * from message where send_id='$userid' order by num desc";
	else
		$sql = "select * from message where rv_id='$userid' order by num desc";

	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 10;

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	  $num    = $row["num"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];

	  if ($mode=="send")
	  	$msg_id = $row["rv_id"];
	  else
	  	$msg_id = $row["send_id"];
	  
	  $result2 = mysqli_query($con, "select name from members where id='$msg_id'");
	  $record = mysqli_fetch_array($result2);
	  $msg_name     = $record["name"];	  
?>
	    			<li>
                        <span class="col1"><input name="delete_list[]" type="checkbox" value="<?=$num?>"></span>
			    		<span class="col2"><?=$number?></span>
				    	<span class="col3"><a href="message_view.php?mode=<?=$mode?>&num=<?=$num?>"><?=$subject?></a></span>
    					<span class="col4"><?=$msg_name?></span>
	    				<span class="col5"><?=$regist_day?></span>
						<input name="mode" type="hidden" value="<?=$mode?>">	<!-- get으로 보내는 법 모르겟다. 임시방편-->
						<input name="page" type="hidden" value="<?=$page?>">	<!-- 이하동문-->
		    		</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);
?>	
	    	</ul>
			<ul id="page_num">
				<li>
					<div id="delete_btn">
						<button type="button" onclick="location.href='message_box.php?mode=<?=$mode?>&page=<?=$page?>'">취소</button>
						<button type="submit">삭제</button>
					</div>
				</li>
			</ul>
            <br>
            <br>
            <br>
	    </div>
    </from>
</section> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
