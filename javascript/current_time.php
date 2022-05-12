<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~現在時刻を表示させよう~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body onload="LoadProc();">
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>現在時刻を表示しよう</h1>
      <h2>JSで時間表示させるよ</h2>
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
      <li><a href="current_time.php">現在時刻</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>現在の時間は</h2>
      <div class="realday" id="Today"></div>
      <p class="realtime" id="Clock">※ここに時計が表示されます</p>
      <br><br>

      <h3>HTMLソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;div class=&quot;realday&quot; id=&quot;Today&quot;&gt;&lt;/div&gt;
&lt;p class=&quot;realtime&quot; id=&quot;Clock&quot;&gt;※ここに時計が表示されます&lt;/p&gt;</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScript日付ソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var now = new Date();
function LoadProc() {
  var Year = now.getFullYear();
  var Month = now.getMonth() + 1;
  var Date = now.getDate();

  var target = document.getElementById(&quot;Today&quot;);
  target.innerHTML = Year + &quot;年&quot; + Month + &quot;月&quot; + Date + &quot;日&quot;;
}</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScript現在時刻ソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">// 桁数が1桁だったら先頭に0を加えて2桁に調整する
function set(num) {
  var ret;
  if (num &lt; 10) {
    ret = &quot;0&quot; + num;
  } else {
    ret = num;
  }
  return ret;
}


function showClock() {
  var nowTime = new Date();
  var nowHour = set(nowTime.getHours());
  var nowMin = set(nowTime.getMinutes());
  var nowSec = set(nowTime.getSeconds());
  var msg = &quot;時刻は&quot; + nowHour + &quot;時&quot; + nowMin + &quot;分&quot; + nowSec + &quot; 秒です&quot;;
  document.getElementById(&quot;Clock&quot;).innerHTML = msg;
}
setInterval(&#039;showClock()&#039;, 1000);</code></pre>

      <!-- /ソースコード -->

    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var now = new Date();

  function LoadProc() {
    var Year = now.getFullYear();
    var Month = now.getMonth() + 1;
    var Date = now.getDate();

    var target = document.getElementById("Today");
    target.innerHTML = Year + "年" + Month + "月" + Date + "日";
  }

  // 桁数が1桁だったら先頭に0を加えて2桁に調整する
  function set(num) {
    var ret;
    if (num < 10) {
      ret = "0" + num;
    } else {
      ret = num;
    }
    return ret;
  }

  function showClock() {
    var nowTime = new Date();
    var nowHour = set(nowTime.getHours());
    var nowMin = set(nowTime.getMinutes());
    var nowSec = set(nowTime.getSeconds());
    var msg = "時刻は" + nowHour + "時" + nowMin + "分" + nowSec + " 秒です";
    document.getElementById("Clock").innerHTML = msg;
  }
  setInterval('showClock()', 1000);
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>