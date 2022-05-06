<!doctype html>
<html lang="ja">

<head>
  <?php $title = "jQueryで動くきっかけ"; ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <div class="header-contents">
      <h1>動かすきっかけの記述</h1>
      <h2>jQuery</h2>
    </div><!-- /.header-contents -->
    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <?php require_once("../common/header_jquery.php"); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="trigger.html">jQueryきっかけ</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>動くきっかけの指定記述</h2>
        <div class="frame3">
          サイト内でどの操作をしたときに、jQueryを発火させるのか！代表的な記述の仕方を学んでいく。
        </div>
        <h3>画面の読み込み</h3>
        <div class="frame1">
          $(function() {<br>
          　//画面の読み込み時に動かしたいソースコードを記述<br>
          });
        </div><br>

        <h3>画面が読み込まれた後</h3>
        <div class="frame1">
          $(window).on('load',function() {<br>
          　//画面が読み込まれた後に動かしたいソースコードを記述<br>
          });
        </div><br>

        <h3>画面のスクロール</h3>
        <div class="frame1">
          $(window).on('scroll', function () {<br>
          　//画面がスクロールされたら動かしたいソースコードを記述<br>
          });
        </div><br>

        <h3>画面のリサイズ</h3>
        <div class="frame1">
          $(window).on('resize', function () {<br>
          　//画面がリサイズされたら動かしたいソースコードを記述する<br>
          });
        </div><br>

        <h3>要素やクラス・ID名をクリック</h3>
        <div class="frame1">
          $('●●').on('click', function() {<br>
          　//クリックしたら動かしたいソースコードを記述する<br>
          })
        </div><br>

        <h3>要素やクラス・ID名にマウスが乗ったり外れたりした時</h3>
        <div class="frame1">
          $('●●').on('mouseenter', function () {<br>
          　//マウスが乗ったら動かしたいソースコードを記述 <br>
          })<br><br>

          $('●●').on('mouseleave', function () {<br>
          　//マウスが外れたら動かしたいソースコードを記述<br>
          })
        </div><br>

        <h3>要素やクラス・ID名がタッチされたり外れたりした時</h3>
        <div class="frame1">
          $('●●').on('touchstart', function () {<br>
          　//タッチされた時に動かしたいソースコードを記述する<br>
          });<br><br>
          $('●●').on('touchend', function () {<br>
          　//タッチして指が離れた時に動かしたいソースコードを記述する<br>
          });
        </div><br>

        <h3>マウスが移動</h3>
        <div class="frame1">
          $(window).on('mousemove', function () {<br>
          　//マウスが移動したら動かしたいソースコードを記述する<br>
          });
        </div><br>

        <h3>要素やクラス・ID名のCSSアニメーションが終わった後</h3>
        <div class="frame1">
          $('●●').on('animationend', function () {<br>
          　//CSSアニメーションが終わった後に動かしたいソースコードを記述する<br>
          })
        </div><br>

        <h3>〇秒遅れて動く</h3>
        <div class="frame1">
          setTimeout(function () {<br>
          　//時間を遅らせて動かしたいソースコードを記述する<br>
          }, 1000);//この場合1秒後
        </div><br>

        <h2>WordPressのjQueryを利用して自作のJSを読み込むときの書き方</h2>
        <div class="frame3">
          <div class="frame2">
            jQuery(function($){<br>
            　// この中に$マークからはじまる記述<br>
            });
          </div>
          自作のJavaScriptの中に$マークからはじまる記述があると動かない場合があります。その時はソースコード全体を、上記のコードでくくると解決する
        </div><br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php require_once("../common/footer.php"); ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>