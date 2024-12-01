<!-- header.php -->
<?php
session_start();
require_once __DIR__ . "/../php/funcs.php";
// ログイン状態の簡易チェック
$is_logged_in = isLoggedIn();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <!-- カレンダー用Bootstrap読み込み -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>YOUR TO DO LIST</title>
</head>
<body>
    <header>
        <div id="navi">
            <div class="header-title">
                YOUR TO DO LIST
                <div class="menu">
                    <?php if (!$is_logged_in) : ?> 
                        <!-- 未ログインの場合 -->
                        <div id="login">ログイン</div>
                        <div id="new">新規登録</div>
                    <?php else : ?> 
                        <!-- ログイン済みの場合 -->
                        <div id="logout">ログアウト</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>