<!doctype html>
<html lang="ja">

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P2ZWXCZ');
  </script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="IE=edge">
  <title>PHP編”正規表現の基本知識”</title>
  <meta name=”description” content=”PHP編の学習技術ブログです。”>
  <meta name="keywords" content="PHP,プログラミング,技術ブログ,PHP超入門編,ソースコード" />
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="android-touch-icon.png">
  <meta property="og:title" content="プログラミング学習帳～簡単解説！JavaScript初級コード～">
  <meta property="og:type" content="website">
  <meta property="og:description" content="JavaScript超入門編の学習技術ブログです。どんなソースコードで作成されているのか？ソースコードと概要を分かりやすく説明しています">
  <meta property="og:url" content="https://katsu-study.work/">
  <meta property="og:site_name" content="JavaScript学習帳">
  <meta property="og:image" content="https://katsu-study.work/images/js.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="JSプログラミング講座">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="manifest" href="../manifest.json">
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <div class="header-contents">
      <h1>正規表現の基本知識</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <div id="boxmenu">
      <nav>
        <ul class="menu_1">
          <li><a href="syntax.php">制御構造</a></li>
          <li><a href="function.php">関数</a></li>
          <li><a href="string.php">文字列</a></li>
          <li><a href="convert.php">文字列の変換</a></li>
          <li><a href="comparison.php">文字列の比較</a></li>
          <li><a href="search.php">文字列の検索</a></li>
          <li><a href="regex.php">正規表現</a></li>
          <li><a href="array.php">配列</a></li>
        </ul>

        <div class="copyright">
          <small>&copy; 2021 かつまる学習帳</small>
        </div>
      </nav>
    </div><!-- /boxmenu -->
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.html">HOME</a></li>
      <li><a href="regex.php">正規表現</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>正規表現の基本知識</h2>
        <h4>正規表現とは</h4>
        <div class="frame1">
          文字列をパターンで検索して、パターンにマッチするかどうかチェックする、置換する、分割するといった文字列処理を行う手法です。<br><br>
          パターンにマッチで利用する関数はpreg_match()です。<br>第1引数にパターンの文字列、第2引数に検索対象の文字列を指定する。
        </div>
        <div class="frame2">
          $result = preg_match($pattern,$subject)<br>
          マッチした時1、マッチしなかったら0が戻る解析できなかったり、エラーの場合はfalseになります。<br>パターンは//で囲む　※##でも可
        </div>

        <h3>「46-49」が含まれているかどうか調べる</h3>
        <?php
        $result1 = preg_match("/46-49/u", "確か49-46でした");
        $result2 = preg_match("/46-49/u", "たぶん46-49だった");
        var_dump($result1);
        var_dump($result2);
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$result1 = preg_match(&quot;/46-49/u&quot;, &quot;確か49-46でした&quot;);
$result2 = preg_match(&quot;/46-49/u&quot;, &quot;たぶん46-49だった&quot;);
var_dump($result1);
var_dump($result2);
?&gt;
</code></pre>
        <div class="frame2">
          <p>任意の1文字を含むパターン<br>
            /4.-49/<br><br>
            任意の1文字が6～9の数字のパターン<br>
            /4[6-9]-49/
          </p>
        </div>
        <div class="blank"></div>

        <h4>後置オプション（PCREパターン修飾子）</h4>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>後置オプション</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>i</td>
            <td>アルファベットの大文字小文字を区別しない</td>
          </tr>
          <tr>
            <td>m</td>
            <td>行単位でマッチングする</td>
          </tr>
          <tr>
            <td>s</td>
            <td>ドット(.)で改行文字もマッチングする</td>
          </tr>
          <tr>
            <td>u</td>
            <td>パターン文字をUTF-8エンコードで扱う</td>
          </tr>
          <tr>
            <td>x</td>
            <td>パターンの中の空白文字を無視する(文字パターン内の空白を除く)</td>
          </tr>
        </table><br><br>

        <h4>文字クラス定義[]の中で使うメタ文字</h4>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>メタ文字</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>\</td>
            <td>エスケープ文字</td>
          </tr>
          <tr>
            <td>^</td>
            <td>否定</td>
          </tr>
          <tr>
            <td>-</td>
            <td>文字の範囲の指定</td>
          </tr>
        </table>

        <h3>文字クラスを使ったパターン</h3>
        <?php
        $pattern = "/[赤青緑]の玉/u";
        $pattern2 = "/緑の[^玉]でした/u";
        var_dump(preg_match($pattern, "それは赤の玉です"));
        var_dump(preg_match($pattern, "青の玉が2個です"));
        var_dump(preg_match($pattern, "緑の玉でした"));
        var_dump(preg_match($pattern, "緑の箱でした"));
        var_dump(preg_match($pattern2, "緑の箱でした"));
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$pattern = &quot;/[赤青緑]の玉/u&quot;;
$pattern2 = &quot;/緑の[^玉]でした/u&quot;;
var_dump(preg_match($pattern,&quot;それは赤の玉です&quot;));
var_dump(preg_match($pattern,&quot;青の玉が2個です&quot;));
var_dump(preg_match($pattern,&quot;緑の玉でした&quot;));
var_dump(preg_match($pattern,&quot;緑の箱でした&quot;));
var_dump(preg_match($pattern2,&quot;緑の箱でした&quot;));
?&gt;
</code></pre>
        <div class="blank"></div>

        <h4>定義済みの文字クラス</h4>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>文字クラス</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>\d</td>
            <td>数値。[0-9]と同じ</td>
          </tr>
          <tr>
            <td>\D</td>
            <td>数値以外。[^0-9]と同じ</td>
          </tr>
          <tr>
            <td>\s</td>
            <td>空白文字。[\n\r\t\x0B]と同じ</td>
          </tr>
          <tr>
            <td>\S</td>
            <td>空白文字以外。[^\s]と同じ</td>
          </tr>
          <tr>
            <td>\w</td>
            <td>英数文字、アンダースコア。[a-zA-Z_0-9]と同じ</td>
          </tr>
          <tr>
            <td>\W</td>
            <td>文字以外。[^\w]と同じ</td>
          </tr>
        </table><br><br>


        <h4>文字クラス[]の外で使うメタ文字</h4>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>メタ文字</th>
            <th>説明</th>
          </tr>
          <tr>
            <td>\</td>
            <td>エスケープ文字</td>
          </tr>
          <tr>
            <td>^</td>
            <td>先頭一致(複数行の場合は業の先頭)</td>
          </tr>
          <tr>
            <td>$</td>
            <td>終端一致(複数行の場合は行末)</td>
          </tr>
          <tr>
            <td>.</td>
            <td>任意の1文字(改行を除く)</td>
          </tr>
          <tr>
            <td>[]</td>
            <td>文字クラスの定義</td>
          </tr>
          <tr>
            <td>|</td>
            <td>選択肢の区切り</td>
          </tr>
          <tr>
            <td>()</td>
            <td>サブパターンの囲み</td>
          </tr>
          <tr>
            <td>{n}</td>
            <td>n回の繰り返し</td>
          </tr>
          <tr>
            <td>{n,}</td>
            <td>n回以上の繰り返し</td>
          </tr>
          <tr>
            <td>{n,m}</td>
            <td>n~m回の繰り返し</td>
          </tr>
          <tr>
            <td>*</td>
            <td>{0,}の省略形(0回以上の繰り返し)/td>
          </tr>
          <tr>
            <td>+</td>
            <td>{1,}の省略形(1回以上の繰り返し)</td>
          </tr>
          <tr>
            <td>?</td>
            <td>{0,1}の省略形(0または1回の繰り返し)</td>
          </tr>
        </table><br><br>

        <h2>サブパターンの囲み</h2>
        <div class="frame1">
          パターンを()で囲み、パターンの中にサブパターンを入れる。<br>
        </div>
        <h3>携帯番号にマッチする</h3>
        <?php
        $pattern = "/(090|080|070)-{0,1}[0-9]{4}-{0,1}[0-9]{4}/u";
        var_dump(preg_match($pattern, "090-1234-5678"));
        var_dump(preg_match($pattern, "080-1234-5678"));
        var_dump(preg_match($pattern, "07012345678"));
        var_dump(preg_match($pattern, "123456789"));
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$pattern = &quot;/(090|080|070)-{0,1}[0-9]{4}-{0,1}[0-9]{4}/u&quot;;
var_dump(preg_match($pattern, &quot;090-1234-5678&quot;));
var_dump(preg_match($pattern, &quot;080-1234-5678&quot;));
var_dump(preg_match($pattern, &quot;07012345678&quot;));
var_dump(preg_match($pattern, &quot;123456789&quot;));
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>メタ文字をエスケープしたパターンを作る便利な関数</h2>
        <div class="frame1">
          文字列をpreg_quote()に通すと必要な個所にエスケープの\を埋め込んでくれます。<br>URL等のスラッシュとピリオドをエスケープする必要がある時に便利
        </div>
        <h3>URLに含まれるメタ文字をエスケープする</h3>
        <?php
        $escaped = preg_quote("https://sample.com/php/", "/");
        $pattern = "/{$escaped}/u";
        echo $pattern, "\n <br>";
        var_dump(preg_match($pattern, "https://sample.com/php/です"));
        var_dump(preg_match($pattern, "https://sample.com/javascript/です"));
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$escaped = preg_quote(&quot;https://sample.com/php/&quot;, &quot;/&quot;);
$pattern = &quot;/{$escaped}/u&quot;;
echo $pattern, &quot;\n &lt;br&gt;&quot;;
var_dump(preg_match($pattern, &quot;https://sample.com/php/です&quot;));
var_dump(preg_match($pattern, &quot;https://sample.com/javascript/です&quot;));
?&gt;
</code></pre>
        <div class="blank"></div>

        <h2>正規表現でマッチした値の取り出しと置換</h2>
        <div class="frame1">
          preg_match()の第3引数に変数を指定すると、その変数にマッチした値が配列で入ります。
          <div class="frame3">
            $result = preg_match($pattern,$subject,&$matches)
          </div>
          マッチした値は$resultに戻るのではなく、第3引数の$matchesに入ります。＄resultの値は、マッチした個数、またはエラーがあった場合のfalseです。第3引数の$matchesは配列ですが、preg_match()はマッチした文字列が見つかったならそこで走査を中止するので値は1個しか入りません。<br>見つかった値は$matches(0)で取り出せます。<br><br>
          <div class="frame3"><b>マッチしたすべての要素を取り出す</b><br>
            $result = preg_match_all($pattern,$subject,&$matches)
          </div>
          implode("、",$matches[0])のように実行すると、配列から値が全て取り出され、「、」で連結された文字になる。

        </div>

        <h3>マッチした名前を取り出す</h3>
        <?php
        $pattern = "/佐.+子/u";
        //ヒアドキュメント
        $subject = <<< "names"
        佐藤由紀
        佐藤順子
        坂田玲子
        冴島陽子
        佐々木裕子
        names;
        $result = preg_match_all($pattern, $subject, $matches);
        if ($result === false) {
          echo "エラー", preg_last_error();
        } else if ($result == 0) {
          echo "マッチした値はありません。";
        } else {
          echo "{$result}人マッチしました。\n <br>";
          echo implode("、", $matches[0]);
        }
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$pattern = &quot;/佐.+子/u&quot;;
//ヒアドキュメント
$subject = &lt;&lt;&lt; &quot;names&quot;
佐藤由紀
佐藤順子
坂田玲子
冴島陽子
佐々木裕子
names;
$result = preg_match_all($pattern, $subject, $matches);
if ($result === false) {
  echo &quot;エラー&quot;, preg_last_error();
} else if ($result == 0) {
  echo &quot;マッチした値はありません。&quot;;
} else {
  echo &quot;{$result}人マッチしました。\n &lt;br&gt;&quot;;
  echo implode(&quot;、&quot;, $matches[0]);
}
</code></pre>
        <div class="blank"></div>

        <h4>サブパターンの値を調べる</h4>
        <div class="frame3">
          preg_match_all()の第3引数にマッチした値が入るが、パターン()で囲まれたサブパターンがある場合は、$第3引数[1]、$第3引数[2]、...にサブパターンでマッチした値が入ります。
        </div>

        <h2>正規表現を使って検索置換を行う</h2>
        <div class="frame3">
          preg_replace()を使うことで複雑な検索置換を行うことが出来ます。<br>
          単純な文字列の検索や置換は str_replace()の方が高速に行えます。
          <div class="frame3">
            $result = preg_replace($pattern,$replacement,$subject)
          </div>
          第3引数の$subjectの文字列を$patternのパターンで検索し、マッチした値をすべて$replacementで置換した新しい文字を作ります。<br>
          置換後の文字は$resultに入ります。マッチした値がなかった場合は元の$subjectと同じ文字列が返り、エラーの場合はNULLが返ります。<br>
          NULLチェックはis_null()で行うことが出来ます。
        </div>

        <h3>クレジット番号を伏字にする</h3>
        <?php
        function numbermask($subject)
        {
          $pattern = "/^\d{4}\s?\d{4}\s?\d{4}\s?\d{2}(\d{2})$/";
          $replacement = "**** **** **** **$1";
          $result = preg_replace($pattern, $replacement, $subject);
          if (is_null($result)) {
            return "エラー：" . preg_last_error();
          } else if ($result == $subject) {
            return "番号エラー";
          } else {
            return $result;
          }
        }
        $number1 = "1234 5678 9123 4567";
        $number2 = "6566846328412597";
        $num1 = numbermask($number1);
        $num2 = numbermask($number2);
        echo "{$number1}は次のようになります。\n <br>";
        echo $num1, "\n <br>";
        echo "{$number2}は次のようになります。\n <br>";
        echo $num2, "\n <br>";
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
function numbermask($subject) {
  $pattern = &quot;/^\d{4}\s?\d{4}\s?\d{4}\s?\d{2}(\d{2})$/&quot;;
  $replacement = &quot;**** **** **** **$1&quot;;
  $result = preg_replace($pattern,$replacement,$subject);
  if (is_null($result)) {
    return &quot;エラー：&quot; .preg_last_error();
  } else if ($result == $subject) {
    return &quot;番号エラー&quot;;
  } else {
    return $result;
  }
}
$number1 = &quot;1234 5678 9123 4567&quot;;
$number2 = &quot;6566846328412597&quot;;
$num1 = numbermask($number1);
$num2 = numbermask($number2);
echo &quot;{$number1}は次のようになります。\n &lt;br&gt;&quot;;
echo $num1,&quot;\n &lt;br&gt;&quot;;
echo &quot;{$number2}は次のようになります。\n &lt;br&gt;&quot;;
echo $num2,&quot;\n &lt;br&gt;&quot;;
?&gt;
</code></pre>
        <div class="frame3">
          最後の2桁をサブパターンで分ける理由は、サブパターンでマッチした値は$
          1、$2、$3と順に取り出せる為です。「**** **** **$1」で置換すると最後の2桁だけが表示されて、他は伏字になる。
        </div>
        <div class="blank"></div>

        <h3>パターンと文字列を配列で指定する</h3>
        <?php
        $pattern = ["/開催日/u", "/開始時間/u"];
        $replacement = ["金曜日", "19：30"];
        $subject = "次回は開催日の開始時間からです。";
        $result = preg_replace($pattern, $replacement, $subject);
        echo $result;
        ?>

        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$pattern = [&quot;/開催日/u&quot;,&quot;/開始時間/u&quot;];
$replacement = [&quot;金曜日&quot;,&quot;19：30&quot;];
$subject = &quot;次回は開催日の開始時間からです。&quot;;
$result = preg_replace($pattern,$replacement,$subject);
echo $result;
?&gt;
</code></pre>
        <div class="frame3">
          preg_replace()及びpreg_filter()を使えば、配列の値を正規表現を使って検索置換できます。
        </div><br><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy;かつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>