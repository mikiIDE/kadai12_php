<?php
//get-todo.php
session_start();
require_once __DIR__ . '/funcs.php'; //関数ファイル読み込み

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$todo_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$pdo = db_conn();
$sql = "SELECT * FROM todo_list WHERE id = :todo_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo_id', $todo_id, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

$todos = $stmt->fetch(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($todos);