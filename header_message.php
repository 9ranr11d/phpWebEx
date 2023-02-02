<?php
    //내 정보 일 때 헤더
    session_start();
    if(isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if(isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if(isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if(isset($_SESSION["usernickname"])) $usernickname = $_SESSION["usernickname"];
    else $usernickname = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";

    $con = mysqli_connect("localhost", "user1", "12345", "sports");

    $sql = "SELECT hit FROM message WHERE hit=0 AND rv_id='$userid';";
    $result = mysqli_query($con, $sql);
    
    $nrcount = mysqli_num_rows($result);
    
    mysqli_close($con);
?>
<div id="top">
    <div id="page_name">
        <h4>
            <a href="index.php"><img src="./img/logo.gif"></a>
        </h4>
    </div>
    <div id="main_menu">
        <ul id="top_menu">
            <li><a href="message_send.php">쪽지 보내기</a></li>
            <li><span><a href="message_box.php?mode=rv&page=1">수신 쪽지함(<?=$nrcount?>)</a></span></li>
			<li><span><a href="message_box.php?mode=send&page=1">송신 쪽지함</a></span></li>
        </ul>
    </div>
    <div id="login_menu">
        <ul id="login_ul">
<?php
    if(!$userid) {
?>
            <li><a href="join_form.php">회원가입</a></li>
            <li> | </li>
            <li><a href="login_form.php">로그인</a></li>
</div>
<?php
    } else {
?> 
            <li><a href="loginfo.php"><img src="./img/myinpo.gif"><?=$usernickname?>(<?=$username?>)</a></li>
            <li> | </li>
            <li><a href="logout.php">로그아웃</a></li>
<?php
    }
?> 
        </ul>
    </div>
</div>
<hr>