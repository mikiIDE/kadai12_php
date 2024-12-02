<?php
// get-todos.php
session_start();
require_once __DIR__ . '/funcs.php'; //関数ファイル読み込み

if (!isset($_SESSION['user_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized']);
    exit();
}

$date = $_GET['date'];
$user_id = $_SESSION['user_id'];

$pdo = db_conn();
$sql = "SELECT * FROM todo_list WHERE user_id = :user_id AND todo_date = :date ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->execute();

$todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($todos);