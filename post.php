<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>POSTのサンプル</title>
    </head>
    <body>
        <?php
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
                    <form method="POST" action="post.php">      <!-- actionは送信先URL -->
                        ハンドルネーム：<input type="text" name="name" value=""><br><br>
                        <textarea name="comment" cols=40 rows=4 placeholder="コメントをどうぞ"></textarea>
                        <input type="submit" value="投稿" /><br>      <!-- <form>タグのactionが呼び出される 送信ボタン -->
                        <input type="reset" value="取消">
                    </form>
                </section>
        <?php
            }
        ?>
    </body>
</html>