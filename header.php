<?php
    //기본 헤더
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
?>
<div id="top">
    <div id="page_name">
        <h4>
            <a href="index.php"><img src="./img/logo.gif"></a>
        </h4>
    </div>
    <div id="main_menu">
        <ul id="top_menu">
            <li><a href="record.php">일지 작성</a></li>
            <li><a href="read_record.php">일지 보기</a></li>
            <li><a href="board.php">자유게시판</a></li>
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