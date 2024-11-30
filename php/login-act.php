<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値
$name= $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
$stmt = $pdo->prepare("SELECT * FROM your_info WHERE lid=:lid"); 
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR); //lidだけ渡すのがポイント！
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()


//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id(); //ここで一旦SESSIONに預ける
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  //Login成功時（select.phpへ）
  redirect("select.php");

}else{
  //Login失敗時(login.phpへ)
  redirect("index.php");

}

exit();
