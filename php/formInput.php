<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHPフォーム~入力処理~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "フォーム~入力処理~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="formInput.php">フォーム~入力処理~</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>HTTPの基礎知識</h2>
        <h4>スーパーグローバル変数</h4>
        <p>PHPではWEBサーバーへのリクエスト情報を参照したり、操作したりするためのスーパーグローバル変数をもっています。どこからでも参照できる配列です。</p>

        <table border="5" class="function">
          <tr bgcolor="yellow">
            <th>変数名</th>
            <th>内容</th>
          </tr>
          <tr>
            <td>$_GET</td>
            <td>GETリクエストのパラメーター。パラメーター名が配列のキーになる。</td>
          </tr>
          <tr>
            <td>$_POST</td>
            <td>POSTリクエストのパラメーター。パラメーター名が配列のキーになる。</td>
          </tr>
          <tr>
            <td>$_COOKIE</td>
            <td>クッキーの値。クッキーの名前が配列のキーになる。</td>
          </tr>
          <tr>
            <td>$_SESSION</td>
            <td>セッション変数</td>
          </tr>
          <tr>
            <td>$_FILES</td>
            <td>アップロードされたファイルの情報</td>
          </tr>
          <tr>
            <td>$_SERVER</td>
            <td>Webサーバーに関する情報</td>
          </tr>
          <tr>
            <td>$_ENV</td>
            <td>サーバー側の環境変数。環境変数名が配列のキーになる。</td>
          </tr>
        </table><br>
        <button type="button">MEMO</button>
        <div class="frame3">
          <ul>
            <li>GETはリクエストをURLのアドレスの後に?を付けて送信する。キーと値のペア部分がクエリ文字で複数のパラメーターがある場合は&でつなぐ。</li>
            <li>POSTはリクエストを本文に含めて送信します。リクエスト内容を簡単に見られない。</li>
            <li>GETのレスポンスはキャッシュされるが、POSTはキャッシュされない。</li>
          </ul>
        </div>
        <div class="blank"></div>
        <h2>送信フォームの作成</h2>
        <form method="POST" action="calc.php">
          <ul class="nolist">
            <li><label>単価：<input type="number" name="tanka"></label></li>
            <li><label>個数：<input type="number" name="kosu"></label></li><br>
            <li><input type="submit" value="計算する"></li>
          </ul>
        </form>

        <h3>リクエストフォーム</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;calc.php&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;単価：&lt;input type=&quot;number&quot; name=&quot;tanka&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;label&gt;個数：&lt;input type=&quot;number&quot; name=&quot;kosu&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;計算する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre><br>

        <h3>POSTメソッドのフォーム</h3>
        <!-- ソースコード -->
        <button type="button">calc.php</button>
        <pre><code class="prettyprint">&lt;?php
//フォーム入力の値を取り出す
$tanka = $_POST[&quot;tanka&quot;];
$kosu = $_POST[&quot;kosu&quot;];
//計算
$price = $tanka * $kosu;
//3桁位取り表示
$tanka = number_format($tanka);
$kosu = number_format($kosu);
$price = number_format($price);
echo &quot;単価{$tanka}円　×　{$kosu}個は{$price}円です。&quot;;
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>GETメソッドで送信する場合</h2>
        <form method="GET" action="check.php">
          <ul class="nolist">
            <li><label>番号：<input type="number" name="no"></label></li><br>
            <li><input type="submit" value="調べる"></li>
          </ul>
        </form>
        <h3>リクエストフォーム</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;form method=&quot;GET&quot; action=&quot;check.php&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;番号：&lt;input type=&quot;number&quot; name=&quot;no&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;調べる&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre><br>

        <h3>GETメソッドのフォーム</h3>
        <!-- ソースコード -->
        <button type="button">check.php</button>
        <pre><code class="prettyprint">&lt;?php
$no = $_GET[&quot;no&quot;];
$nolist = [2,4,6,8,10,12,14,16,18,20];

if(in_array($no,$nolist)) {
  echo &quot;{$no}はあります。&quot;;
} else {
  echo &quot;{$no}は見つかりませんでした。&quot;;
}
</code></pre><br>

        <button type="button">MEMO</button>
        <div class="frame3">
          <b>マルチバイト文字をURLエンコードする</b><br>
          GETリクエストのクエリ文字にマルチバイトが含まれている場合は、パラメーターをURLエンコードしてから添付します。<br>URLエンコードはrawurlencode()で行い、逆のデコードはrawurldecode()で行います。<br><br>※POSTメソッドを使う場合はPHPがエンコードとデコードを自動で行います。
        </div><br>

        <button type="button">セキュリティ対策</button>
        <div class="frame3">
          <div class="frame2">
            <b>クロスサイトスクリプティング(XSS 対策)</b><br>
            htmlspecialchars(値, ENT_QUOTES, 'UTF-8')
          </div>
          不正な文字をHTMLエスケープする
        </div><br>

        <h2>htmlspecialchars()を便利に使うためのユーザー定義関数es()</h2>
        <h3>引数に対してhtmlspecialchars()を実行するes()</h3>
        <!-- ソースコード -->
        <button type="button">es.php</button>
        <pre><code class="prettyprint"><?php
                                        require_once("es.php");
                                        $es = htmlspecialchars($es, ENT_QUOTES, 'UTF-8');
                                        echo "{$es}";
                                        ?>
        </code></pre><br>

        <button type="button">MEMO</button>
        <div class="frame3">
          <b>__METHOD__を利用した再帰呼び出し</b><br>
          array_map()でコールしている__METHOD__は、現在実行中のメソッド自信を指す特殊な定数(マジック定数)です。ここではes()を指すので、es()の中でes()を使っていることになります。<br>この手法を再帰呼び出しと言います。
        </div><br>

        <h3>es.phpのes()をテストする</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);

$myCode = &quot;&lt;h2&gt;esのテスト中です&lt;/h2&gt;&quot;;
$myArray = [&quot;a&quot; =&gt; &quot;&lt;p&gt;配列のテスト&lt;/p&gt;&quot;, &quot;b&quot; =&gt; &quot;&lt;script&gt;alert(&#039;hello&#039;)&lt;/script&gt;&quot;];

echo &#039;$myCodeの値：&#039;, es($myCode);
echo &quot;\n\n&quot;;
echo &#039;$myArrayの値：&#039;;
print_r(es($myArray));
?&gt;
</code></pre>

        <pre class="re"><?php
                        require_once("es.php");

                        $myCode = "<h2>esのテスト中です</h2>";
                        $myArray = ["a" => "<p>配列のテスト</p>", "b" => "<script>alert('hello')</script>"];

                        echo '$myCodeの値：', es($myCode);
                        echo "\n\n";
                        echo '$myArrayの値：';
                        print_r(es($myArray));
                        ?></pre>
        <p>※プログラム実行するとブラウザには変数と配列がそのまま表示されていますが、実際に出力された結果を確認すると値に含まれている特殊文字がエンティティ変換されている。</p>
        <div class="blank"></div>

        <h2>文字エンコードを行うユーザー定義関数 ckeckEn()</h2>
        <div class="frame3">
          mb_check_encode()を使って文字エンコードのチェックを効率よく行うckeckEn()を、先のen()と同様に定義！この関数では$_GET、$_POST、$_SESSIONなどの配列に含まれている値のエンコードをチェックする前提で組む<br>
          $resultが初期値のtrueのままであれば文字コードは正しく、途中でfalceが代入されていれば、文字コードは一致していないことになります。
        </div><br>

        <h3>配列の文字エンコードのチェック</h3>
        <button type="button">es.php</button>
        <!-- ソースコード -->
        <pre><code class="prettyprint"><?php
                                        require_once("es.php");
                                        htmlspecialchars($checkEn, ENT_QUOTES, 'UTF-8');
                                        echo $checkEn;
                                        ?>
        </code></pre>

        <h3>checkEn()をテスト</h3>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);

$utf8_string = &quot;こんにちは&quot;;
$sjis_string = mb_convert_encoding($utf8_string, &#039;Shift-JIS&#039;);
$encoding = mb_internal_encoding();
if(checkEn([$sjis_string])) {
  echo &quot;配列の値は、&quot;, $encoding, &quot;です。&quot;;
} else {
  echo &quot;配列の値は、&quot;, $encoding, &quot;ではありません。&quot;;
}
?&gt;
</code></pre>

        <pre class="re"><?php
                        require_once("es.php");

                        $utf8_string = "こんにちは";
                        $sjis_string = mb_convert_encoding($utf8_string, 'Shift-JIS');
                        $encoding = mb_internal_encoding();
                        if (checkEn([$sjis_string])) {
                          echo "配列の値は、", $encoding, "です。";
                        } else {
                          echo "配列の値は、", $encoding, "ではありません。";
                        }
                        ?></pre><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>