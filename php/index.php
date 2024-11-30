<!-- index.php -->
<?php
session_start();
include("funcs.php");
// ログイン状態の簡易チェック
$is_logged_in = isLoggedIn();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>YOUR TO DO</title>
</head>

<body>
    <header>
        <div id="navi">
            <div class="header-title">
                YOUR TO DO LIST
            </div>
        </div>
    </header>
    <main>
        <div class="form-group">
            登録済みの情報を入力してね<br>
            初めての場合は先に<a href="sign-in.php">登録</a>へ！
        </div>
        <div class="info">
            <form action="login-act.php" method="post">
                <div class="form-group">
                    <label for="lid">ユーザー名：</label>
                    <input type="text" id="lid" name="lid" required>
                </div>
                <div class="form-group">
                    <label for="lpw">パスワード：</label>
                    <input type="password" id="lpw" name="lpw" required>
                </div>
                <button type="submit" id="login">ログイン</button>
            </form>
        </div>
    </main>
</body>
<?php include '../inc/footer.php'; ?>