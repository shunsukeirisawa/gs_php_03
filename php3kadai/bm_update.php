<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
require_once('funcs.php');

//1. POSTデータ取得
$bookTitle   = $_POST['bookTitle'];
$bookUrl  = $_POST['bookUrl'];
$bookComment    = $_POST['bookComment'];
$id = $_POST['id'];

$pdo = db_conn();

//３．データ登録SQL作成

// $sql = "UPDATE an_table SET name=:name,email=:email,naiyou=:naiyou,age=:age WHERE id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':name', $name, PDO::PARAM_STR);     //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':email', $email, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':age', $age, PDO::PARAM_INT);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();

// if ($status == false) {
//     sqlError($stmt);
// } else {
//     redirect("select.php");
// }




$stmt = $pdo->prepare("UPDATE
                        gs_bm_table
                    SET
                        bookTitle = :bookTitle,
                        bookUrl = :bookUrl,
                        bookComment = :bookComment
                    WHERE
                        id = :id;");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':bookTitle', $bookTitle, PDO::PARAM_STR);
$stmt->bindValue(':bookUrl', $bookUrl, PDO::PARAM_STR);
$stmt->bindValue(':bookComment', $bookComment, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}