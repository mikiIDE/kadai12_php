<!-- header.php -->
<?php
session_start();
require_once __DIR__ . "/../php/funcs.php";
// ログイン状態の簡易チェック
$is_logged_in = isLoggedIn();

//var_dump($_SESSION);  // デバッグ用＞セッションの中身を確認
//var_dump($is_logged_in);  // デバッグ用＞ログイン状態を確認
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- カレンダー用Bootstrap読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- アイコンやボタン用のBootstrap読み込み -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>YOUR TO DO LIST</title>
</head>

<body>
    <header>
        <div id="navi">
            <div class="header-title">
                <a href="index.php"> YOUR TO DO LIST </a>
                <?php if ($is_logged_in) : ?>
                    <div class="your-name"><?= h($_SESSION["name"]) ?>さん</div>
                <?php endif; ?>
            </div>
            <div class="menu">
                <!-- ?php if (!$is_logged_in) : ?> -->
                <!-- 未ログインの場合 -->
                <!-- <a href="index.php"><button id="login-btn"><i class="bi bi-box-arrow-in-right"></i>　ログイン</button></a>
                        <a href="sign-in.php"><button id="signin-btn"><i class="bi bi-person-plus"></i>　新規登録</button></a>
                     ?php else : ?> -->
                <?php if ($is_logged_in) : ?>
                    <!-- ログイン済みの場合 -->
                    <form action="/php/logout.php" method="POST" style="display: inline;">
                        <button type="submit" id="logout-btn">
                            <i class="bi bi-box-arrow-right"></i>　ログアウト
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </header>