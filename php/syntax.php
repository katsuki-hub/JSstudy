<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~制御構造~条件分岐や繰り返し処理" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "制御構造~条件分岐や繰り返し処理~" ?>
    <?php require_once "../common/header.php"; ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="syntax.php">PHPシンタックス</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>条件が満たされている間は繰り返すwhile文</h2>
        <h3>合計が21になる3個の変数が決まるまで繰り返す</h3>
        <?php
        do {
          //変数に1～13の乱数を入れる
          $a = mt_rand(1, 13);
          $b = mt_rand(1, 13);
          $c = mt_rand(1, 13);
          $abc = $a + $b + $c;
          //合計が21になったらループを抜ける
          if ($abc == 21) {
            break;
          }
        } while (TRUE);
        echo "合計が21になる3個の数字　{$a}、{$b}、{$c}";
        ?>
        <!-- ソースコード -->
        <pre><code class="prettyprint">&lt;?php
do {
  //変数に1～13の乱数を入れる
  $a = mt_rand(1, 13);
  $b = mt_rand(1, 13);
  $c = mt_rand(1, 13);
  $abc = $a + $b + $c;
  //合計が21になったらループを抜ける
  if ($abc == 21) {
    break;
  }
} while (TRUE);
echo &quot;合計が21になる3個の数字　{$a}、{$b}、{$c}&quot;;
?&gt;
</code></pre>

        <div class="blank"></div>
        <h2>カウンタを使った繰り返し for文</h2>
        <h3>for文で処理を10回繰り返す</h3>
        <?php
        for ($i = 0; $i < 10; $i++) {
          echo "{$i}回。";
        }
        ?>
        <pre><code class="prettyprint">&lt;?php
for ($i = 0; $i &lt; 10; $i++) {
  echo &quot;{$i}回。&quot;;
}
?&gt;</code></pre>

        <div class="blank"></div>
        <h2>カウンタの値に意味をもたせた処理</h2>
        <h3>人数が3人までなら1人1,000円、4人目からは半額の500円として6人までの料金計算</h3>
        <?php
        $price = 0;
        for ($people = 1; $people <= 6; $people++) {
          if ($people <= 3) {
            $price += 1000;
          } else {
            $price += 500;
          }
          echo "{$people}人なら{$price}円です。";
        }
        ?>
        <pre><code class="prettyprint">&lt;?php
$price = 0;
for ($people=1; $people&lt;=6; $people++) {
  if ($people&lt;=3) {
    $price += 1000;
  } else {
    $price += 500;
  }
  echo &quot;{$people}人なら{$price}円です。&quot;;
}
?&gt;
</code></pre>

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