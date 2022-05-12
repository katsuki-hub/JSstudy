<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~繰り返し処理のwhile文を使ってみよう~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>while構文のお勉強！！</h1>
      <h2>繰り返し処理でモンスターの体力を減らす</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <?php require_once("../common/header_js.php"); ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="while.php">while文</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>モンスターの体力はHP:100だ！<br>何ターンで倒せるかな？</h2>
      <script>
      var enemy = 100;
      var attack;
      var count = 0;

      window.alert("戦闘スタート!!");
      while (enemy > 0) {
        attack = Math.floor(Math.random() * 30) + 1
        document.write("モンスターに" + attack + "のダメージ！" + "<br>");
        enemy -= attack;
        count++;
      }
      document.write(count + "回でモンスターを倒した！");
      </script>

      <h3>ソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var enemy = 100;
var attack;
var count = 0;

window.alert(&quot;戦闘スタート!!&quot;);
while (enemy &gt; 0) {
  attack = Math.floor(Math.random() * 30) + 1
  document.write(&quot;モンスターに&quot; + attack + &quot;のダメージ！&quot; + &quot;&lt;br&gt;&quot;);
  enemy -= attack;
  count++;
}
document.write(count + &quot;回でモンスターを倒した！&quot;);</code></pre>
      <!-- /ソースコード -->

      モンスターの体力を保存しておく定義<b>var enemy = 100;</b>に対して、、攻撃力30以下のダメージをモンスターの体力が0以下になるまでの繰り返す処理を書きます。
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        while(条件式) {<br>
        繰り返し処理を行う処理文<br>
        }
      </div>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        while (enemy > 0)
      </div>
      変数enemyが0より大きいとtrueなので、体力がなくなるまで実行され続けます。
      <h4>for文とwhile文</h4>
      どちらも繰り返し処理を行うということに関しては同じになりますが、違いとしては繰り返しの回数が決まっているのかどうか？になります。<br><br>
      for文　⇒　繰り返し回数を確定させてます。<br>
      何回繰り返すか条件式を決めている。<br><br>

      while文　⇒　繰り返し回数未確定です。<br>
      条件式がfalseになるまで実行

    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>