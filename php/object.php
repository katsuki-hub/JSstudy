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
  <title>PHP編”オブジェクト指向プログラミング”</title>
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
      <h1>オブジェクト指向プログラミング</h1>
      <h2>PHPのシンタックス</h2>
    </div><!-- /.header-contents -->
    <?php include(dirname(__FILE__) . '/../commom/phpBoxMenu.php'); ?>
  </header>

  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="object.php">OOP</a></li>
    </ol>
  </div>
  <div class="main-wrapper">
    <article>
      <section>
        <h2>オブジェクト指向プログラミングの概要</h2>
        <h4>クラス定義</h4>
        <div class="frame3">
          オブジェクトにどんなプロパティがあり、メソッドがあるかを定義したものがクラスです。
          <div class="frame1">
            <b>プロパティとメソッドを定義するクラス</b><br>
            class クラス名 {<br>
            　プロパティの定義<br>
            　メソッドの定義<br>
            }
          </div>
        </div>
        <h4>クラスの継承</h4>
        <div class="frame3">
          OOPはプログラムコードの機能を改変、拡張したいとき「継承」を使います。<br>PHPでは継承をextendsキーワードを使って記述。子クラスが親クラスを指定する
          <div class="frame1">
            class 子クラス extends 親クラス {<br>
            }
          </div>
        </div>
        <h4>トレイト</h4>
        <div class="frame3">
          PHPにはトレイトというコードのインクルード（読み込み）に似た仕組みがある。トレイトでプロパティやメソッドを定義しておくと、useキーワードでトレイトを指定するだけで、自分のクラスで定義してあるかのように利用できます。
          <div class="frame1">
            <b>トレイトの定義</b><br>
            trait トレイト名 {<br>
            //トレイトのプロパティ<br>
            //トレイトのメソッド<br>
            }<br><br>

            <b>トレイトを利用するクラス</b><br>
            class クラス名 {<br>
            　use トレイト名;<br>
            　//クラスのコード<br>
            }
          </div>
        </div>
        <h4>インターフェース</h4>
        <div class="frame3">
          インターフェースは規格のようなものです。クラスが採用しているインターフェースを見れば、そのクラスで確実に実行できるメソッドと呼び出し方がわかる。interfaceキーワードをつけて宣言して定義し、採用するクラスではimplementsキーワードで指定する。
          <div class="frame1">
            <b>インターフェースの定義</b><br>
            interface インターフェース名 {<br>
            　function 関数名();<br>
            }<br><br>
            <b>インターフェースを採用するクラス</b><br>
            class クラス名 implements インターフェース名 {<br>
            　//クラスのコード<br>
            }
          </div>
        </div>
        <h4>抽象クラスト抽象メソッド</h4>
        <div class="frame3">
          メソッド宣言のみを行って処理を実行しない特殊なメソッド定義があります。abstractキーワードをつけてメソッド宣言を行うことから抽象メソッドと呼びます。<br>そして、抽象メソッドが1つでもあるクラスにはabstractキーワードを付ける必要があり、抽象クラスと呼びます。<br>抽象クラスのインスタンスを作ることは出来ず、必ず継承して利用する。<br>抽象メソッドの機能を子クラスで上書きして実装します。<br>他の言語と違いPHPの抽象メソッドは初期機能を実装できません。
          <div class="frame1">
            <b>抽象クラス</b><br>
            abstract class 抽象クラス名 {<br>
            　abstract function 抽象メソッド名();<br>
            }<br><br>
            <b>抽象メソッドを実装する</b><br>
            class クラス名 extends 抽象クラス名 {<br>
            　function 抽象メソッド名() {<br>
            　　//メソッドをオーバーライドして機能を定義する<br>
            　}<br>
            }
          </div>
        </div>
        <p>※以降の章から個々に解説</p>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer><?php include(dirname(__FILE__) . '/../commom/footer.php'); ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>