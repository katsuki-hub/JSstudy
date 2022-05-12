<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~配列のソート~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "配列をソート" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="arraysort.php">配列をソート</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>配列をソートする</h2>
        <div class="frame1">
          sort()はインデックス配列の値を昇順に並び替える関数です。インデックス番号もリセットされ、引数で渡した配列の値が並び替わります。
        </div>
        <h3>配列の値を昇順と降順にソートする</h3>
        <?php
        $data = [55, 3, 89, 21, 36, 10, 100, 66];
        sort($data); //昇順
        print_r($data);
        echo "\n <br><br>";
        rsort($data); //降順
        print_r($data);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [55,3,89,21,36,10,100,66];
sort($data); //昇順
print_r($data);
echo &quot;\n &lt;br&gt;&lt;br&gt;&quot;;
rsort($data); //降順
print_r($data);
?&gt;
</code></pre>
        <div class="blank"></div>
        <h4>複製した配列をソート</h4>
        <div class="frame3">
          元になっている配列を直接ソートせずに、配列を複製してソートしたい場合に使用する。
        </div>
        <h3>複製してソート</h3>
        <?php
        $data = [55, 3, 89, 21, 36, 10, 100, 66];
        $clone = $data;
        sort($clone);
        print_r($clone);
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
$data = [55,3,89,21,36,10,100,66];
$clone = $data;
sort($clone);
print_r($clone);
?&gt;
</code></pre>
        <div class="blank"></div>

        <h4>ソートの型のフラグ</h4>
        <div class="frame3">
          値を数値としてソートするか文字列としてソートするかといったオプションを第2引数で指定できます。
        </div>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>ソート型のフラグ</th>
            <th>動作</th>
          </tr>
          <tr>
            <td>SORT_REGULAR</td>
            <td>型変更をしない(初期値)</td>
          </tr>
          <tr>
            <td>SORT_NUMERIC</td>
            <td>数値として比較</td>
          </tr>
          <tr>
            <td>SORT_STRING</td>
            <td>文字列として比較</td>
          </tr>
          <tr>
            <td>SORT_LOCALE_STRING</td>
            <td>現在のロケールに基づく</td>
          </tr>
          <tr>
            <td>SORT_NATURAL</td>
            <td>文字列として自然順で比較</td>
          </tr>
          <tr>
            <td>SORT_FLAG_CASE</td>
            <td>大文字小文字を比較しない</td>
          </tr>
        </table>
        <div class="blank"></div>

        <h4>配列をソートする関数</h4>
        <div class="frame3">
          配列をソートする関数には値とキーどちらでソートするか、キーと値の関係性が維持されるか、昇順か降順かといった違いがあります。
        </div>
        <table border="1" class="function">
          <tr bgcolor="pink">
            <th>関数名</th>
            <th>概要</th>
            <th>ソート</th>
            <th>キーと値の関係</th>
            <th>ソート順</th>
          </tr>
          <tr>
            <td>asort()</td>
            <td>連想配列を値で昇順にソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>昇順</td>
          </tr>
          <tr>
            <td>arsort()</td>
            <td>連想配列を値で降順にソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>降順</td>
          </tr>
          <tr>
            <td>ksort()</td>
            <td>連想配列をキーで昇順にソートする</td>
            <td>キー</td>
            <td>維持する</td>
            <td>昇順</td>
          </tr>
          <tr>
            <td>krsort</td>
            <td>連想配列をキーで降順にソートする</td>
            <td>キー</td>
            <td>維持する</td>
            <td>降順</td>
          </tr>
          <tr>
            <td>natcasesort()</td>
            <td>大文字小文字を区別せず自然順でソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>自然順</td>
          </tr>
          <tr>
            <td>natsort()</td>
            <td>自然順でソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>自然順</td>
          </tr>
          <tr>
            <td>sort()</td>
            <td>値で昇順にソートする</td>
            <td>値</td>
            <td>維持しない</td>
            <td>昇順</td>
          </tr>
          <tr>
            <td>rsort()</td>
            <td>値で降順にソートする</td>
            <td>値</td>
            <td>維持しない</td>
            <td>降順</td>
          </tr>
          <tr>
            <td>shuffle()</td>
            <td>ランダムに並べる</td>
            <td>値</td>
            <td>維持しない</td>
            <td>ランダム</td>
          </tr>
          <tr>
            <td>uasort()</td>
            <td>値でユーザー定義順にソートする</td>
            <td>値</td>
            <td>維持する</td>
            <td>ユーザー定義</td>
          </tr>
          <tr>
            <td>uksort()</td>
            <td>キーでユーザー定義順にソートする</td>
            <td>キー</td>
            <td>維持する</td>
            <td>ユーザー定義</td>
          </tr>
          <tr>
            <td>usort()</td>
            <td>値でユーザー定義順にソートする</td>
            <td>値</td>
            <td>維持しない</td>
            <td>ユーザー定義</td>
          </tr>
        </table><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>