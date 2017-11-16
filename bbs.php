<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8" />
        <title>掲示板</title>
        <link rel="stylesheet" href="bbs.css">  <!-- rel（レル）relation, href（エイチレフ）hyper reference, CSSを読み込む処理 -->
    </head>
    <body>
        <?php
            //接続　phpからデータベースへ
            //mysqliクラスのオブジェクトを作成
            $mysqli = new mysqli('localhost', 'root', '', 'sample');
            //エラーが発生したら
            if ($mysqli->connect_error){
                print("接続失敗：" . $mysqli->connect_error);
                exit();
            }

            if(isset($_POST["name"])){                       //commentがPOSTされているなら。 //POSTで送信されたデータは連想配列$_POSTに格納されている  //issetでNULLでないか確認
                $name = htmlspecialchars($_POST["name"]);   //エスケープ（特殊な意味があるために表示できない文字を他の文字列に変換）してから表示
                print("あなたのハンドルネームは「 ${name} 」です。");
            }
            if(isset($_POST["comment"])){
                $comment = htmlspecialchars($_POST["comment"]);
                print("あなたのコメントは「 ${comment} 」です。");        //print($_POST["comment"]); //print_r($_POST);
                
                
            }
            else{
        ?>
                <!-- 送信部 -->
                <h1>クロスバイク初心者おたす掲示板</h1>
                    <section>
                        <h2 class="a">投稿一覧</h2>
                        <p>nothing...</p>
                    </section>
                    <section>
                        <h2 class="a">書き込む</h2>               
                        <form method="POST" action="bbs.php">      <!-- actionは送信先URL -->
                            ハンドルネーム：<input type="text" name="name" value=""><br><br>
                            <textarea name="comment" cols=40 rows=4 placeholder="コメントをどうぞ"></textarea>
                            <input type="submit" value="投稿" /><br>      <!-- <form>タグのactionが呼び出される 送信ボタン -->
                            <input type="reset" value="取消">
                        </form>
                    </section>
        <?php
            }
            //INSERT
            //プリペアドステートメントを作成　ユーザ入力を使用する箇所は?にしておく
            $stmt = $mysqli->prepare("INSERT INTO datas (name, message) VALUES (?, ?)");    //-> アロー演算子
            //$_POST["name"]に名前が、$_POST["message"]に本文が格納されているとする。
            //?の位置に値を割り当てる
            $stmt->bind_param('ss', $_POST["name"], $_POST["message"]);     //bind_paramの第1引数は割り当てる変数の型 ss 文字列2つ
            //実行
            $stmt->execute();


            //追加してみた！

            //切断
            $mysqli->close();
        ?>
    </body>
</html>