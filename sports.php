<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>운동 하자</title>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/sports.css">
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <?php
    $kind = $_GET["kind"];

    if($kind == "back") {
        $mode = 1;
        $sports_kind1 = "시티트 로우";
        $sports_kind2 = "랫풀 다운";
    }
    if($kind == "chest") {
        $mode = 2;
        $sports_kind1 = "벤치 프레스";
        $sports_kind2 = "인클라인 덤벨 프레스";
    }
    if($kind == "shoulder") {
        $mode = 3;
        $sports_kind1 = "사이드 레터럴 레이즈";
        $sports_kind2 = "벤트 오버 레터럴 레이즈";
    }
    if($kind == "abdomen") {
        $mode = 4;
        $sports_kind1 = "레그 레이즈";
        $sports_kind2 = "크런치";
    }
    if($kind == "lowerbody") {
        $mode = 5;
        $sports_kind1 = "레그 프레스";
        $sports_kind2 = "스쿼트";
    }
    ?>
    <div id="sports_main">
        <img src="./img/sports<?=$mode?>-1.jpeg"> <!-- 받은 get에 값에 따라 다른 이미지를 표현-->
        <h2><?=$sports_kind1?></h2>               <!-- 받은 get에 값에 따라 다른 설명을 표현-->
        <img src="./img/sports<?=$mode?>-2.jpeg">
        <h2><?=$sports_kind2?></h2>
    </div>
    <footer>
        <?php include "footer.php";?>
    </footer>
</body>
</html>