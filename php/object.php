<!doctype html>
<html lang="ja">

<head>
  <?php $title = "PHP編~オブジェクト指向プログラミング~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "オブジェクト指向プログラミング" ?>
    <?php require_once "../common/header.php"; ?>
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
  <footer><?php require_once "../common/footer.php"; ?></footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>