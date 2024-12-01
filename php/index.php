<?php
// index.php
require_once __DIR__ .'/../inc/header.php';
?>
    <main>
        <div class="form-group">
            登録済みの情報を入力してね<br>
            初めての場合は先に登録のため<button><a href="sign-in.php">こちら　<i class="bi bi-person-plus"></i></a></button>へ！
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
                    <label for="lid">ユーザーID：</label>
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