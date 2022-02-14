<?php
require_once("../common/es.php"); //PHPのフォーム~入力データのチェック~で参照してね
//接続パラメーター
$user = 'katsuki';
$passwoed = 'katsu4426';
$dbName = 'kyotei';
$host = 'localhost:3306';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "MySQL編~データベース接続~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "レコードを取り出す" ?>
    <?php require_once "../common/header_mysql.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="pdo.php">レコード</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>PDOでデータベースに接続しレコードを取り出す</h2>

        <?php
        //MySQLデータベースに接続する
        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          //プリペアドステートメントのエミュレーションを無効にする
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          //例外がスローされる設定にする
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "データベース{$dbName}に接続しました。", "<br>";
          $sql = "SELECT * FROM classic2022"; //SQL文を作る
          $stm = $pdo->prepare($sql); //プリペアドステートメントを作る
          $stm->execute(); //SQL文を実行
          $result = $stm->fetchAll(PDO::FETCH_ASSOC); //結果の取得(連想配列で受け取る)

          echo "<b>2022年ボートレースクラシック出場選手</b>";
          echo "<table border=1>";
          echo "<tr>";
          echo "<th>", "登録番号", "</th>";
          echo "<th>", "選手名", "</th>";
          echo "<th>", "登録期", "</th>";
          echo "<th>", "支部", "</th>";
          echo "</tr>";

          foreach ($result as $row) {
            echo "<tr>";
            echo "<td>", es($row['number']), "</td>";
            echo "<td>", es($row['name']), "</td>";
            echo "<td>", es($row['reg']), "</td>";
            echo "<td>", es($row['branch']), "</td>";
            echo "</tr>";
          }
          echo "</table>";
        } catch (Exception $e) { //接続失敗で例外処理実行
          echo '<span class="error">エラーがありました</span><br>';
          echo $e->getMessage();
          exit();
        }
        ?><div class="br50"></div>

        <div class="frame1">
          <b>DDL DML DCL</b><br>
          SQL文は次の3種類に大きく分けられます。<br>
          <ul>
            <li>データベース定義分(DDL：Data Definition Language)</li>
            <li>データ操作文(DML：Data Manipulation Language)</li>
            <li>データ制御文(DCL：Data Control Language)</li>
          </ul>
        </div>
        <div class="frame2">
          <b>SELECT命令</b>
          <hr>
          SELECT カラム FROM テーブル WHERE 条件 LIMIT 開始位置,行数
        </div>
        <p>カラムにワイルドカードの * を指定すると全てのカラムを取得します。WHERE以下を省略すると条件なしですべてのレコードが取り出す対象になる。<br><br>
          SQL文をプリペアドステートメントにしておくと、同じSQL文を繰り返し実行する場合に最初の一回だけで処理が完了します。プレースホルダーが使える利点もある。</p><br>

          <div class="frame3">
            <b>結果を受け取って表示</b><br>
            SQL文実行した結果を受け取るにはfetch()またはfetchAll()を改めて実行する。引数のPDO::FETCH_ASSOCがレコードを連想配列で取り出す指定です。
          </div>


        <div class="br50"></div>
        <h3>ユーザーパラメーター</h3>
        <?php
        require_once("sqlCode.php");
        echo $para;
        ?>

        <h3>classic2022レコードのテーブル取り出し</h3>
        <?php echo $classic ?>
        <br>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>