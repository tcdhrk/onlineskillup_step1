<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <title>掲示板</title>
        <link rel="stylesheet" href="bbs.css">  <!-- rel（レル）relation, href（エイチレフ）hyper reference, CSSを読み込む処理 -->
    </head>
    <body>
        <h1>クロスバイク初心者おたす掲示板</h1>
            <section>
                <h2 class="a">書き込む</h2>               
                <form method="POST" action="bbs.php">      <!-- actionは送信先URL -->
                    ハンドルネーム：<input type="text" name="name" value=""><br><br>
                    <textarea name="comment" cols=40 rows=4 placeholder="コメントをどうぞ"></textarea>
                    <input type="submit" value="投稿" />      <!-- <form>タグのactionが呼び出される 送信ボタン -->
                    <input type="reset" value="取消">
                </form>
            </section>

        <?php
            //接続　phpからデータベースへ
            //mysqliクラスのオブジェクトを作成
            $mysqli = new mysqli('localhost', 'root', '', 'sample');
            $mysqli->set_charset("utf8");       //日本語対策
            //エラーが発生したら
            if ($mysqli->connect_error){
                print("接続失敗：" . $mysqli->connect_error);
                exit();
            }



            //INSERT
            //プリペアドステートメントを作成　ユーザ入力を使用する箇所は?にしておく
            $stmt = $mysqli->prepare("INSERT INTO datas (name, message) VALUES (?, ?)");    //-> アロー演算子


            if(isset($_POST["name"])&&isset($_POST["comment"])){                       //commentがPOSTされているなら。 //POSTで送信されたデータは連想配列$_POSTに格納されている  //issetでNULLでないか確認
                $name = htmlspecialchars($_POST["name"]);   //エスケープ（特殊な意味があるために表示できない文字を他の文字列に変換）してから表示
                //print("あなたのハンドルネームは「 ${name} 」です。");
                //$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
                //?の位置に値を割り当てる
                $stmt->bind_param('ss', $_POST["name"], $_POST["message"]);     //bind_paramの第1引数は割り当てる変数の型 ss 文字列2つ
                //実行
                $stmt->execute();
            }
            else{
                print("(ハンドルネーム・コメントをご記入ください)");
            }
        ?>


            <section>
                <h2 class="a">投稿一覧</h2>
                <?php
                    //SERECT
                    //datasテーブルから日付の降順でデータを取得（新しい日付が上）
                    $result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC");
                    if($result){
                        //1行ずつ取り出し
                        while($row = $result->fetch_object()){
                            //エスケープして表示 //日本語表記
                            $name = htmlspecialchars($row->name);
                            $message = htmlspecialchars($row->message);
                            $created = htmlspecialchars($row->created);
                            print("$name : $message ($created)<br>");
                        }
                    }
                    else{
                ?>
                <p>まだ投稿はありません...</p>
            </section>
        <?php
                    }
            //切断
            $mysqli->close();
        ?>
    </body>
</html>