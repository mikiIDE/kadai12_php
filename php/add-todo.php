<?php
// add-todo.php
session_start();
require_once __DIR__ . '/funcs.php'; //関数ファイル読み込み

if ($_SERVER['REQUEST_METHOD'] != 'POST') {//直接このページを見に来た場合はリダイレクトする
    redirect("index.php");
}

// ログインチェック
if (!isset($_SESSION['user_id'])) {
    redirect('main.php');
}
$user_id = $_SESSION['user_id'];

//検証環境では以下を使う
// if (!isset($_SESSION['user_id'])) {
//     $user_id = 1;  // 開発用の仮のユーザーID
// } else {
//     $user_id = $_SESSION['user_id'];
// }

// デバッグログ
error_log('POSTデータ: ' . print_r($_POST, true));

$todo_date = $_POST['todo_date'];
$title = $_POST['title'];
$description = $_POST['description'] ?? '';

$pdo = db_conn();
$sql = "INSERT INTO todo_list (user_id, todo_date, title, description) 
        VALUES (:user_id, :todo_date, :title, :description)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':todo_date', $todo_date, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);

if ($stmt->execute()) {
   redirect("main.php");
} else {
    echo "失敗しました";
}