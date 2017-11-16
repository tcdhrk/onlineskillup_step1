<?php
//接続　phpからデータベースへ
//mysqliクラスのオブジェクトを作成
$mysqli = new mysqli('ホスト名', 'ユーザ名', 'パスワード', 'データベース名');
//エラーが発生したら
if ($mysqli->connect_error){
    print("接続失敗：" . $mysqli->connect_error);
    exit();
}

//実行　INSERTの例
//プリペアドステートメントを作成　ユーザ入力を使用する箇所は?にしておく
$stmt = $mysqli->prepare("INSERT INTO datas (name, message) VALUES (?, ?)");    //-> アロー演算子
//$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
//?の位置に値を割り当てる
$stmt->bind_param('ss', $_POST["name"], $_POST["message"]);     //bind_paramの第1引数は割り当てる変数の型 ss 文字列2つ
//実行
$stmt->execute();

//実行　SERECTの例
//datasテーブルから日付の降順でデータを取得
$result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC");
if($result){
    //1行ずつ取り出し
    while($row = $result->fetch_object()){
        //エスケープして表示
        $name = htmlspecialchars($row->name);
        $message = htmlspecialchars($row->message);
        $created = htmlspecialchars($row->created);
        print("$name : $message ($created)<br>");
    }
}

//切断
$mysqli->close();
?>
