<!doctype html>
<html lang="ja" prefix="og:http://ogp.me/ns#">

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
  <title>プログラミング学習帳～簡単解説！WEBプログラミング基本コード～</title>
  <meta name="description" content="WEBプログラミング入門編の学習技術ブログです。初級編～中級編までアップします。どんなソースコードで作成されているのか？ソースコードと概要を分かりやすく説明しています">
  <meta name="keywords" content="JavaScript,プログラミング,技術ブログ,ソースコード,PHP,jQuery">
  <link href="css/style.css?Ver=20211126" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="android-touch-icon.png">
  <meta property="og:title" content="WEBプログラミング学習帳～簡単解説！基本コード～">
  <meta property="og:type" content="website">
  <meta property="og:description" content="WEBプログラミング超入門編の学習技術ブログです。どんなソースコードで作成されているのか？ソースコードと概要を分かりやすく説明しています">
  <meta property="og:url" content="https://katsu-study.work/">
  <meta property="og:site_name" content="JavaScript学習帳">
  <meta property="og:image" content="https://katsu-study.work/images/js.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="WEBプログラミング講座">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <link rel="manifest" href="manifest.json">
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('sw.js')
        .then((reg) => {
          console.log('Service worker registered.', reg);
        });
    }
  </script>
</head>

<body class="inbody">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src=" https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <header>
    <div class="header-contents">
      <h1>WEBプログラミング学習ファイル</h1>
      <h2>カテゴリーごとに作成</h2>
    </div><!-- /.header-contents -->

    <div class="btn" id="open_btn">
      <label class="menu-btn"><span></span></label>
    </div>

    <div id="boxmenu">
      <nav>
        <ul class="menu_1 btn">
          <li><a href="#javascript">JavaScript</a></li>
          <li><a href="#jquery">jQuery</a></li>
          <li><a href="#php">PHP</a></li>
        </ul>

        <div class="copyright">
          <small>&copy; 2021 かつまる学習帳</small>
        </div>
      </nav>
    </div><!-- /boxmenu -->
  </header>

  <div class="home-wrapper">
    <h2 class="heading" data-en="WEB">WEBプログラミング入門<br>☆学習技術ブログ☆</h2>
    <div style="font-size: 14px; padding: 15px; margin: 8px; background-color: rgba(197, 252, 176, 0.4);">
      <p>Webサイトを動かすプログラミングの基本構文をWEBノート化！！<br><br>どんなソースコードで作成されているのか？<br>ソースコードと概要を分かりやすく説明しています。</p><br>
      <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; font-size: 14px;">
        動作確認用に作成した学習帳ページ
      </div>
    </div>
    <div class="blank"></div>
    <h2>JavaScriptとは？</h2>
    <div style="font-size: 13px; padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: rgba(198, 207, 109, 0.356);">
      JavaScriptはWEBページにて複雑な機能をさせることが可能なプログラミング言語です。<br><br>HTMLとCSSで作られたWEBサイトでは、静的な表現しかできませんが、JavaScriptによって動的にコンテンツを表現させることが出来ます。<br>ユーザーのアクションに応じたコンテンツの表示だったり、地図やグラフィックアニメーションなども表示可能です。
    </div>
    <div class="blank"></div>
    <section id="javascript">
      <h2 class="heading" data-en="JavaScript">JavaScript学習帳</h2>
      <div id="box">
        <ul>
          <li><a href="javascript/if.html">if文～条件分岐で動作を変える～</a></li>
          <li><a href="javascript/var.html">変数～比較演算子を使ったダイアログボックス表示～</a></li>
          <li><a href="javascript/nunber.html">データ型比較演算子～数字の大小を比較条件～</a></li>
          <li><a href="javascript/time_msg.html">論理演算子～タイムメッセージ～</a></li>
          <li><a href="javascript/while.html">繰り返し処理～whileでモンスター退治～</a></li>
          <li><a href="javascript/function.html">functionの作成と利用方法</a></li>
          <li><a href="javascript/array.html">配列～項目リストの表示</a></li>
          <li><a href="javascript/object.html">オブジェクト～複数データを1つの変数で管理～</a></li>
          <li><a href="javascript/input.html">インプットとデータの加工</a></li>
          <li><a href="javascript/hour.html">最終アクセス日時～年月日と日時を表示～</a></li>
          <li><a href="javascript/digit.html">桁数合わせ～数値を文字列連結へ～</a></li>
          <li><a href="javascript/math.html">Mathオブジェクト～小数点の切り捨て～</a></li>
          <li><a href="javascript/current_time.html">現在時刻～リアルタイム表示～</a></li>
          <li><a href="javascript/countdown.html">残り時間の計算～カウントダウンタイマー～</a></li>
          <li><a href="javascript/location.html">プルダウンメニューでページ移動～プール属性の設定とid属性のないHTML要素取得方法～</a></li>
          <li><a href="javascript/cookie.html">クッキーを使ってフォームの送信を1度だけにする</a></li>
          <li><a href="javascript/calendar.html">簡単なカレンダーを実装する</a></li>
          <li><a href="javascript/image.html">サムネイル表示画像切り替え</a></li>
          <li><a href="javascript/slide.html">ボタンで画像スライド</a></li>
        </ul>
      </div>
    </section>
    <div class="blank"></div>
    <h2>jQueryとは？</h2>
    <div style="font-size: 13px; padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: rgba(198, 207, 109, 0.356);">
      jQueryとはJavaScriptのオープンソースのライブラリです。<br><br>HTMLから動かしたい要素を取得して、タグ、属性、コンテンツ、やCSSを操作し、ある程度まとまったプログラムを作ってくれているファイルです。<br>少ない記述で様々な表現を実行し、webページのUIの作成やAjaxを得意としています。
    </div>
    <div class="blank"></div>
    <section id="jquery">
      <h2 class="heading" data-en="jQuery">jQuery学習帳</h2>
      <div id="box">
        <ul>
          <li><a href="jquery/jquerymethod.html">よく使うjQueryメソッド</a></li>
          <li><a href="jquery/trigger.html">jQueryが動くきっかけの記述</a></li>
          <li><a href="jquery/menu.html">目次やサブメニューを開閉させる</a></li>
          <li><a href="jquery/box.html">ボックス開閉アニメーション</a></li>
          <li><a href="jquery/ajax.html">ajaxとJson</a></li>
        </ul>
    </section>
    <div class="blank"></div>
    <h2>PHPとは？</h2>
    <div style="font-size: 13px; padding: 10px; margin-bottom: 10px; border: 3px double #333333; background-color: rgba(198, 207, 109, 0.356);">
      PHPはサーバーで実行されるサーバーサイドスクリプトです。<br>MySQLなどのデータベースとの連携により、データの追加・値を検索して表示・値の更新といった処理が出来ます。<br>具体的にブログ、SNS、ショッピングサイト、スケジュール管理、会員管理といったデータベースを組み合わせたサイト構築で利用されています。
    </div>
    <div class="blank"></div>
    <section id="php">
      <h2 class="heading" data-en="PHP">PHP学習帳</h2>
      <div id="box">
        <ul>
          <li><a href="php/syntax.php">制御構造~条件分岐や繰り返し処理~</a></li>
          <li><a href="php/function.php">関数</a></li>
          <li><a href="php/string.php">文字列</a></li>
          <li><a href="php/convert.php">文字列の変換</a></li>
          <li><a href="php/comparison.php">文字列の比較</a></li>
          <li><a href="php/search.php">文字列の検索</a></li>
          <li><a href="php/regex.php">正規表現</a></li>
          <li><a href="php/array.php">配列</a></li>
          <li><a href="php/array02.php">配列の要素を削除・置換・連結・分割</a></li>
          <li><a href="php/arrayextract.php">配列の抽出</a></li>
          <li><a href="php/arraysort.php">配列をソート</a></li>
          <li><a href="php/arraysearch.php">配列を検索・比較する</a></li>
          <li><a href="php/arrayfunction.php">配列の各要素に関数を適用する</a></li>
          <li><a href="php/object.php">オブジェクト指向プログラミングの概要</a></li>
          <li><a href="php/object01.php">OOP~クラス定義~</a></li>
          <li><a href="php/extends.php">OOP~クラスの継承~</a></li>
          <li><a href="php/trait.php">OOP~トレイト~</a></li>
          <li><a href="php/interface.php">OOP~インターフェース~</a></li>
          <li><a href="php/abstract.php">OOP~抽象クラス~</a></li>
          <li><a href="php/formInput.php">フォーム~入力処理~</a></li>
          <li><a href="php/formDetaCheck.php">フォーム~入力データのチェック~</a></li>
          <li><a href="php/hidden.php">フォーム~隠しフィールド~</a></li>
          <li><a href="php/sale.php">フォーム~クーポンで割引率を出す~</a></li>
          <li><a href="php/mile.php">1つのファイルでフォーム処理</a></li>
        </ul>
    </section>
    <br><br>
  </div><!-- /.main-wrapper -->
  <footer>
    <small>&copy; 2021 かつまる学習帳</small>
    <p id="page-top"><a href="#">TOP</a></p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="scripts/move.js"></script>
</body>

</html>