<!-- sign-in.php -->
<?php
session_start();
require_once __DIR__ . "/funcs.php";
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
            あなたの情報を登録してね
        </div>
        <div class="info">
            <form action="sign-in-act.php" method="post">
            <div class="form-group">
                    <label for="name">お  名  前  ：</label>
                    <input type="text" id="name" name="name" placeholder="64文字以内の全角で入力してください" required>
                </div>
                <div class="form-group">
                    <label for="lid">ユーザー名：</label>
                    <input type="text" id="lid" name="lid" placeholder="ログイン時に必要です" required>
                </div>
                <div class="form-group">
                    <label for="lpw">パスワード：</label>
                    <input type="password" id="lpw" name="lpw" placeholder="ログイン時に必要です" required>
                </div>
                <button type="submit" id="signin">登録</button>
            </form>
        </div>
    </main>
</body>
<?php include '../inc/footer.php'; ?>