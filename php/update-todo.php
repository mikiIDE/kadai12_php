<?php
//get-todo.php
session_start();
require_once __DIR__ . '/funcs.php'; //関数ファイル読み込み
if ($_SERVER['REQUEST_METHOD'] != 'POST') {//直接このページを見に来た場合はリダイレクトする
    redirect("index.php");
}
if (!isset($_SESSION['user_id'])) { //ログインIDが確認できない場合もリダイレクトする
    redirect("index.php");
}

$todo_id = $_POST['todo_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

$pdo = db_conn();
$sql = "UPDATE todo_list SET title = :title, description = :description 
        WHERE id = :todo_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);

if ($stmt->execute()) {
    $_SESSION['success'] = 'TODOを更新しました';
} else {
    $_SESSION['error'] = '更新に失敗しました';
}

header('Location: ' . $_SERVER['HTTP_REFERER']);