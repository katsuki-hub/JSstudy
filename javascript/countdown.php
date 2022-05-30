<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~タイマー機能でカウントダウンを表示させる~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>カウントダウンタイマー</h1>
      <h2>残り時間の計算</h2>
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
      <li><a href="countdown.php">カウントダウン</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <!--<p>今日は残り<span id="timer"></span>で終わります！！</p>-->
      <h2>東京オリンピック開催まで</h2>
      <p class="timer">あと<span id="day"></span>日<span id="hour"></span>時間<span id="min"></span>分<span id="sec"></span>秒
      </p>
      <br>

      <h3>HTMLのソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;p class=&quot;timer&quot;&gt;あと&lt;span id=&quot;day&quot;&gt;&lt;/span&gt;日&lt;span id=&quot;hour&quot;&gt;&lt;/span&gt;時間&lt;span id=&quot;min&quot;&gt;&lt;/span&gt;分&lt;span id=&quot;sec&quot;&gt;&lt;/span&gt;秒
&lt;/p&gt;</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var countdown = function (due) {
  var now = new Date();

  var rest = due.getTime() - now.getTime();
  var sec = Math.floor(rest / 1000 % 60);
  var min = Math.floor(rest / 1000 / 60) % 60;
  var hours = Math.floor(rest / 1000 / 60 / 60) % 24;
  var days = Math.floor(rest / 1000 / 60 / 60 / 24);
  var count = [days, hours, min, sec];

  return count;
}

var goal = new Date(2021, 6, 23,20);

var recalc = function () {
  var counter = countdown(goal);

  document.getElementById(&quot;day&quot;).textContent = counter[0];
  document.getElementById(&quot;hour&quot;).textContent = counter[1];
  document.getElementById(&quot;min&quot;).textContent = counter[2];
  document.getElementById(&quot;sec&quot;).textContent = counter[3];
  refresh();
}

var refresh = function () {
  setTimeout(recalc, 1000);
}
recalc();</code></pre>
      <!-- /ソースコード -->

      <h4>countdownファンクションの処理</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var countdown = function (due)
      </div>
      countdownファンクションは呼び出さなければ実行されません。<br>
      パラメーターとして受け取るのは、東京オリンピック開催日を設定した、変数(goal)です。それからdueに代入します。
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        new Date()の()内にパラメーターを含めると日時を設定した状態で初期化できる<br>
        年と月は必須項目で以降は無くても可！<br>
        ※月は実際の<b>月-1</b>の数にしなければならない！
      </div>
      countdownファンクションが計算した残り時間の配列を変数counterに代入
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var counter = countdown(goal);
      </div>
      パラメーターのdueのミリ秒から、変数nowのミリ秒を引いて、変数restに代入しています
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var rest = due.getTime() - now.getTime();
      </div>

      <h4>getTimeメソッド</h4>
      カレンダーから現在の時刻を経過ミリ秒の値として取得できます。
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: #dff6fc;">
        <a class="red">var sec = Math.floor(rest / 1000 % 60);</a><br>
        元の数値がミリ秒なので、1000で割れば全体の秒が出る。さらに60で割れば『分』になり、あまりを計算すると"日時分を除いた"『秒』が出る。<br>
        <a class="red">var min = Math.floor(rest / 1000 / 60) % 60;</a><br>
        ミリ秒の数値を1000で割って秒、それを60で割って全体の分が出る。小数点以下の1分に満たない秒はfloorで切捨て、その数を60で割った余りが分になる。<br>
        <a class="red">var hours = Math.floor(rest / 1000 / 60 / 60) % 24;</a><br>
        ミリ秒の数値を1000で割って秒、それを60で割って、さらに60で割ると全体の時が出る。小数点以下の1時間に満たない秒はfloorで切捨て、その数を24で割った余りが時になる。<br>
        <a class="red">var days = Math.floor(rest / 1000 / 60 / 60 / 24);</a><br>
        ミリ秒の数値を1000で割って秒、60で割って分、60で割って時、24で割った答えが日。小数点以下は切捨て。
      </div>

      <h4>1秒ごとに再計算させる</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var recalc = function () {
      </div>
      recalcファンクションはcountdownファンクションを呼び出して残り時間を計算し、文字連結してTML出力し、最後の処理でrefreshファンクションを呼び出します。<br>
      refreshファンクションは1秒後にrecalcファンクションを実行するプログラムです。

      <h4>setTimeoutメソッド</h4>
      待ち時間後にファンクションを1度だけ実行するメソッド
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        setTimeout(ファンクション,待ち時間)
      </div>
      待ち時間にはミリ秒で指定します<br>
      ※実行しようとさせているファンクション名の後ろに()をつけてはいけない<br>
      ファンクションやメソッド名の後ろの()にはその場で実行するという意味がある。setTimeoutの処理が終わる前にrecalcファンクションが実行が何度も繰り返され、エラーになってしまいます。

    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var countdown = function(due) {
    var now = new Date();

    var rest = due.getTime() - now.getTime();
    var sec = Math.floor(rest / 1000 % 60);
    var min = Math.floor(rest / 1000 / 60) % 60;
    var hours = Math.floor(rest / 1000 / 60 / 60) % 24;
    var days = Math.floor(rest / 1000 / 60 / 60 / 24);
    var count = [days, hours, min, sec];

    return count;
  }

  var goal = new Date(2021, 6, 23, 20);
  /*goal.setHours(23);
  goal.setMinutes(59);
  goal.setSeconds(59);

  console.log(countdown(goal));*/

  var recalc = function() {
    var counter = countdown(goal);
    /*var time = counter[1] + "時間" + counter[2] + "分" + counter[3] + "秒";
    document.getElementById("timer").textContent = time;*/
    document.getElementById("day").textContent = counter[0];
    document.getElementById("hour").textContent = counter[1];
    document.getElementById("min").textContent = counter[2];
    document.getElementById("sec").textContent = counter[3];
    refresh();
  }

  var refresh = function() {
    setTimeout(recalc, 1000);
  }
  recalc();
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>