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
        <!-- ポップアップ -->
        <div id="popup-wrapper">
            <div id="popup-inside">
                <div id="close">x</div>
                <div id="message">
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="success" data-show-popup="true"> <!-- data属性を追加 -->
                            <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?>
                        <?php endif; ?>
                        </div>
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="error" data-show-popup="true">
                                <?php
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                                ?>
                            </div>
                        <?php endif; ?>
                </div>
            </div>
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

    <script>
        // ポップアップメッセージ用
        const popupWrapper = document.getElementById('popup-wrapper');
        const close = document.getElementById('close');
        const successMessage = document.querySelector('[data-show-popup="true"]');

        // ページ読み込み時にポップアップを表示
        window.onload = function() {
            if (successMessage) {
                popupWrapper.style.display = "block";
            }
        };

        // ポップアップの外側又は「x」のマークをクリックしたときポップアップを閉じる
        popupWrapper.addEventListener('click', e => {
            if (e.target.id === popupWrapper.id || e.target.id === close.id) {
                popupWrapper.style.display = 'none';
            }
        });
    </script>

</body>
<?php include '../inc/footer.php'; ?>