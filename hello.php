<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>PHPのサンプル</title>
    </head>
    <body>
        <?php       //date
            date_default_timezone_set('Asia/Tokyo');
            $date = date("Y/m/d H:i:s");    // $変数
            $w = date("w");
            $week_name = array("日", "月", "火", "水", "木", "金", "土");
            print($date);
            print("($week_name[$w])");
        ?><br>
        <?php       //if文
            $a = 5;
            if($a == 3) {
                print("$a is 3");
            } 
            else {
                print("$a is not 3");
            }
        ?><br>
        <?php       //for文
            //$iが0から10未満の間、1ずつ加算しながら繰り返し
            for($i = 0; $i < 10; $i++){
                print("$i ");
            }
        ?><br>
        <?php       //関数
            //引数の文字列を2回表示する関数
            function double_print($text){
                print($text . $text);   //文字列の結合は.(ドット)演算子で行なう
            }
            double_print("a");
            print("\n");
            double_print("bc");
        ?><br>
        <?php       //配列
            //"one", "two", "three"を要素とする配列を作成
            $a1 = array("one", "two", "three");
            //配列$a1の末尾に"four"という要素を追加
            $a1[] = "four";
            //配列$a1の0番目の要素を変更
            $a1[0] = "one?";
            //表示
            print_r($a1);       //変数の構造と内容を全て書き出す関数
        ?><br>
        <?php       //連想配列
            //$hash["one"]が"いち", $hash["two"]が"に", $hash["three"]が"さん"となる連想配列を作成
            $hash = array("one" => "いち", "two" => "に", "three" => "さん");        //配列の添え字に文字列を使うことができる
            $hash["four"] = "よん";
            print_r($hash);
            //$hashの各要素を取り出して処理
            foreach($hash as $key => $val)
                print("$key is $val. ");
            var_dump($hash);        //指定した式に関する型や値などの情報を返す
        ?><br>
        <?php       //正規表現
            if(preg_match('/(-?)[0-9]+(\.[0-9]+)?/', 'q-6.83p', $m)){
                print("match: $m[0] ");
                if($m[1] == "-")
                    print("minus! ");
                if(isset($m[2]))
                    print("decimal!");
            } 
            else {
                print("not match");
            }
        ?>
    </body>
</html>