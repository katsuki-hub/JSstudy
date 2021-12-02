<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHPフォーム~入力データのチェック~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $hederTitle = "フォーム~入力データのチェック~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="formDetaCheck.php">フォーム~データチェック~</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>値が入っているかどうかチェック</h2>
        <form method="POST" action="nameCheck.php">
          <ul class="nolist">
            <li><label>名前：<input type="text" name="name"></label></li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form><br>

        <h3>入力フォーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$form1}";
        ?>

        <h3>入力フォームに値が入っているかどうかで分岐する</h3>
        <!-- ソースコード -->
        <button type="button">es.php</button>
        <?php
        require_once("es.php");
        echo "{$esCheck}"
        ?>
        <br>

        <!-- ソースコード -->
        <button type="button">nameCkeck.php</button>
        <pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;?php
$isError = false; //エラーフラグ
if (isset($_POST[&#039;name&#039;])) { //名前を取り出す
  $name = trim($_POST[&#039;name&#039;]);
  if ($name === &quot;&quot;) { //空白のときエラー
    $isError = true;
  }
} else { //未設定のときエラー
  $isError = true;
}
?&gt;

&lt;?php if ($isError) : ?&gt;
  &lt;!-- エラーがあったとき --&gt;
  &lt;span class=&quot;error&quot;&gt;名前を入力してください。&lt;/span&gt;
  &lt;form method=&quot;POST&quot; action=&quot;formDetaCheck.php&quot;&gt;
    &lt;input type=&quot;submit&quot; value=&quot;戻る&quot;&gt;
  &lt;/form&gt;
&lt;?php else : ?&gt;
  &lt;!-- エラーがなかったとき --&gt;
  &lt;span&gt;こんにちは、&lt;?php echo $name; ?&gt;さん。&lt;/span&gt;
&lt;?php endif; ?&gt;
</code></pre><br>

        <button type="button">MEMO</button>
        <div class="frame1">
          <li>exit()とdie()は同じ機能です。どちらも引数を与えたメッセージを出力した後に、続くコードの実行を全てキャンセルします。コードの実行を突然終えるexit()は多用すべきではない。</li>
          <li>isset()で$_POST['name']に値が設定されているかどうかをチェック。空白が入っている場合があるので、trim()を使って値の前後の空白を取り除いた後でチェックする</li>
          <div class="frame2">
            <b>制御構造の別の構文</b><br>
            if:else:endif;だけでなく、switch:case:endswitch;、foreach:endforeach;、for:endfor;、while:endwhile;のように同様の構文がある
          </div>
        </div>
        <div class="blank"></div>

        <h2 id="warikan">入力された値が数値かどうか、0ではないかチェック</h2>
        <form method="POST" action="warikan.php">
          <ul class="nolist">
            <li><label>合計金額：<input type="number" name="goukei"></label></li>
            <li><label>　人数　：<input type="number" name="ninzu"></label></li>
            <li><input type="submit" value="割り勘する"></li>
          </ul>
        </form>

        <h3>入力ホーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$form2}";
        ?>

        <h3>入力フォームに値が計算できる数値かどうかで分岐</h3>
        <button type="button">warikan.php</button>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$warikan}";
        ?>
        <h4>数値かどうかのチェック</h4>
        <div class="frame3">
          フォームからの入力は文字列になるので、ctype_digit()〖0以上の整数〗または is_numeric()〖+-の符号を含んだ数字〗を使って判定します。<br>※is_float()やis_int()はそのままでは使えません。
        </div>
        <div class="blank"></div>
        <h2 id="postNo">正規表現を使って郵便番号のチェック</h2>
        <form method="POST" action="postCheck.php">
          <ul class="nolist">
            <li><label>郵便番号：<input type="text" name="postno"></label></li>
            <li><input type="submit" value="送信する"></li>
          </ul>
        </form>

        <h3>入力フォーム</h3>
        <!-- ソースコード -->
        <?php
        require_once("code.php");
        echo "{$form3}";
        ?>
        <h3>郵便番号のフォーム</h3>
        <!-- ソースコード -->
        <button type="button">postCheck.php</button>
        <?php
        require_once("code.php");
        echo "{$post}";
        ?><br>
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