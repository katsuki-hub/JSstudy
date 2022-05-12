<!doctype html>
<html lang="ja">

<head>
  <?php $title = "JavaScript編~カレンダーを作成~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>
  <header>
    <div class="header-contents">
      <h1>カレンダーを表示させよう！</h1>
      <h2>簡単なスケジュール表</h2>
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
      <li><a href="calendar.php">カレンダー</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>カレンダーを表示</h2>
        <!-- xxxx年xx月を表示 -->
        <div class="wrapper">
          <h1 id="header"></h1>

          <!-- ボタンクリックで月移動 -->
          <div id="next-prev-button">
            <button id="prev" onclick="prev()">‹</button>
            <button id="next" onclick="next()">›</button>
          </div>

          <!-- カレンダー -->
          <div id="calendar"></div>
        </div>


        <h3>HTMLのソースコード</h3>
        <pre><code class="prettyprint">&lt;h1 id=&quot;header&quot;&gt;&lt;/h1&gt;

&lt;div id=&quot;next-prev-button&quot;&gt;
  &lt;button id=&quot;prev&quot; onclick=&quot;prev()&quot;&gt;‹&lt;/button&gt;
  &lt;button id=&quot;next&quot; onclick=&quot;next()&quot;&gt;›&lt;/button&gt;
&lt;/div&gt;

&lt;div id=&quot;calendar&quot;&gt;&lt;/div&gt;
&lt;/div&gt;</code></pre>

        <h3>JavaScriptのソースコード解説</h3>
        <pre><code class="prettyprint">const week = [&quot;日&quot;, &quot;月&quot;, &quot;火&quot;, &quot;水&quot;, &quot;木&quot;, &quot;金&quot;, &quot;土&quot;];
const today = new Date();

var showDate = new Date(today.getFullYear(), today.getMonth(), 1);

window.onload = function () {
  showProcess(today, calendar);
};

function prev() {
  showDate.setMonth(showDate.getMonth() - 1);
  showProcess(showDate);
}

unction next() {
  showDate.setMonth(showDate.getMonth() + 1);
  showProcess(showDate);
}

function showProcess(date) {
  var year = date.getFullYear();
  var month = date.getMonth();
  document.querySelector(&#039;#header&#039;).innerHTML = year + &quot;年 &quot; + (month + 1) + &quot;月&quot;;

  var calendar = createProcess(year, month);
  document.querySelector(&#039;#calendar&#039;).innerHTML = calendar;
}

function createProcess(year, month) {
  var calendar = &quot;&lt;table&gt;&lt;tr class=&#039;dayOfWeek&#039;&gt;&quot;;
  for (var i = 0; i &lt; week.length; i++) {
    calendar += &quot;&lt;th&gt;&quot; + week[i] + &quot;&lt;/th&gt;&quot;;
  }
  calendar += &quot;&lt;/tr&gt;&quot;;

  var count = 0;
  var startDayOfWeek = new Date(year, month, 1).getDay();
  var endDate = new Date(year, month + 1, 0).getDate();
  var lastMonthEndDate = new Date(year, month, 0).getDate();
  var row = Math.ceil((startDayOfWeek + endDate) / week.length);

  for (var i = 0; i &lt; row; i++) {
    calendar += &quot;&lt;tr&gt;&quot;;
    for (var j = 0; j &lt; week.length; j++) {
      if (i == 0 &amp;&amp; j &lt; startDayOfWeek) {
        calendar += &quot;&lt;td class=&#039;disabled&#039;&gt;&quot; + (lastMonthEndDate - startDayOfWeek + j + 1) + &quot;&lt;/td&gt;&quot;;
      } else if (count &gt;= endDate) {

        count++;
        calendar += &quot;&lt;td class=&#039;disabled&#039;&gt;&quot; + (count - endDate) + &quot;&lt;/td&gt;&quot;;
      } else {

        count++;
        if (year == today.getFullYear()
          &amp;&amp; month == (today.getMonth())
          &amp;&amp; count == today.getDate()) {
          calendar += &quot;&lt;td class=&#039;today&#039;&gt;&quot; + count + &quot;&lt;/td&gt;&quot;;
        } else {
          calendar += &quot;&lt;td&gt;&quot; + count + &quot;&lt;/td&gt;&quot;;
        }
      }
    }
    calendar += &quot;&lt;/tr&gt;&quot;;
  }
  return calendar;
}</code></pre>
      </section>
    </article>
  </div>
  </div><!-- /.main-wrapper -->
  <footer><small>&copy; JavaScriptかつまる学習帳</small></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="../scripts/move.js"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/calendar.js"></script>
</body>

</html>