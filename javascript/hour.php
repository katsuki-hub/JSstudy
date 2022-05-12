<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~最終アクセス日時～年月日と日時を表示~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>最終アクセス日時を表示する</h1>
      <h2>12時間時計にしてみよう</h2>
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
      <li><a href="hour.php">アクセス日時</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <section>
      <h2>年月日と日時の表示</h2>
      <p>最終アクセス日時:<span id="time"></span></p>
      <br><br>

      <h3>HTMLのソースコード</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">&lt;p&gt;最終アクセス日時:&lt;span id=&quot;time&quot;&gt;&lt;/span&gt;&lt;/p&gt;</code></pre>
      <!-- /ソースコード -->

      <h3>JavaScriptのソースコードと概要</h3>
      <!-- ソースコード -->
      <pre><code class="prettyprint">var now = new Date();
var year = now.getFullYear();
var month = now.getMonth() + 1;
var date = now.getDate();
var hour = now.getHours();
var min = now.getMinutes();
var ampm = &quot;&quot;;
if (hour &lt; 12) {
  ampm = &quot;am&quot;;
} else {
  ampm = &quot;pm&quot;;
}

var output = year + &quot;/&quot; + month + &quot;/&quot; + date + &quot;　&quot; + (hour % 12) + &quot;:&quot; + min + ampm;
document.getElementById(&quot;time&quot;).textContent = output;</code></pre>
      <!-- /ソースコード -->

      <h4>Dateオブジェクトは初期化して使おう</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        var now = new Date();
      </div>
      Dateオブジェクトを使って、日時の設定や計算をする場合は最初に初期化してから使用します。
      <h4>月、日、時、分の順に取得</h4>
      それぞれをnowの後ろに続くメソッドで取得していきます。
      <div style="padding: 10px; margin-bottom: 10px; border: 3px double #333333;">
        月を取得するgetMonthメソッドは1月は「0」が取得されてしまうので、『実際の月+1』しなければなりません。
      </div>
      取得したら、あとはHTMLへ出力するだけです。
      <h4>12時間表記</h4>
      <div style="padding: 10px; margin-bottom: 10px; border: 1px dashed #333333; background-color: #fdfdbd;">
        (hour % 12)
      </div>
      24時間表記の時間を12で割った余りを計算すれば、12時間表記になります。
    </section>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script>
  var now = new Date();
  var year = now.getFullYear();
  var month = now.getMonth() + 1;
  var date = now.getDate();
  var hour = now.getHours();
  var min = now.getMinutes();
  var ampm = "";
  if (hour < 12) {
    ampm = "am";
  } else {
    ampm = "pm";
  }

  var output = year + "/" + month + "/" + date + "　" + (hour % 12) + ":" + min + ampm;
  document.getElementById("time").textContent = output;
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
</body>

</html>