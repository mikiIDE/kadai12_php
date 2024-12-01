<!-- sign-in.php -->
<?php
require_once __DIR__ .'/../inc/header.php';
?>
    <main>
        <div class="form-group">
            あなたの情報を登録してね
        </div>
        <div class="info">
            <form action="sign-in-act.php" method="post">
            <div class="form-group">
                    <label for="name">お  名  前  ：</label>
                    <input type="text" id="name" name="name" placeholder="64文字以内の全角" required>
                </div>
                <div class="form-group">
                    <label for="lid">ユーザーID：</label>
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