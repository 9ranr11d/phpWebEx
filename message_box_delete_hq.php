<?php

    $num = $_POST["delete_list"];   //체크박스로 받은 값을 배열로 불러온다
    $page = $_POST["page"];         //submit으로 page, mode를 get으로 가져올 줄 모르겟다. 그래서 input type hidden으로 들고왔다.
    $mode = $_POST["mode"];         //실력이 쌓여서 get으로도 들고 올수 있으면 그때 바꾸겟다.

    $con = mysqli_connect("localhost", "user1", "12345", "sports");
    for($i = 0; $i < count($num); $i++) {
    $sql = "select * from message where num = $num[$i]";    //num[i]에 맞는 $num값의 데이터를 검색하고 삭제한다.
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $sql = "delete from message where num = $num[$i]";
    mysqli_query($con, $sql);
    }
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'message_box.php?mode=$mode&page=$page';
	     </script>
	   ";
?>

