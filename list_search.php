<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #edbf07;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
ul { list-style-type: none; }
</style>
<script>
   function ckonly(chk){
	   var obj = document.getElementsByName("addck");
	   for(var i=0; i<obj.length; i++){
	   	if(obj[i] != chk){
	   		obj[i].checked = false;
	   	}
	   }
   }
   function receive_person_send() {
      document.list_box.submit();
      self.close();
   }
</script>
</head>
<body>
<?php
session_start();
    if(isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
?>
<h3>받는 사람 목록</h3>
<p>
<form action="message_send.php" name="list_box" method="post" target="adrload">
   <ul>
<?php
      $con = mysqli_connect("localhost", "user1", "12345", "sports");

      $sql = "select nickname, name, id from members";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
            if($userid != $row['id']) {   //자기 자신은 표시 안함
?>
      <li><input type="checkbox" name="addck" value="<?php echo $row['id'];?>" onclick="ckonly(this)" /><?=$row["nickname"]?>(<?=$row["name"]?>)</li>
<?php //현재 가입 되어 있는 목록 체크박스로 띄움
            }
      }
      }else{
      echo "가입자가 없습니다.";
      }
    
    mysqli_close($con);
?>
   </ul>
</form>
</p>
<div id="list_end">
   <button type="button" onclick="receive_person_send()">가져오기</button>
   <button type="button" onclick="javascript:self.close()">닫기</button>
</div>
</body>
</html>

