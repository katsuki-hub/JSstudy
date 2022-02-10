<?php
require_once("../common/es.php"); //PHPのフォーム~入力データのチェック~で参照してね
//接続パラメーター
$user = 'LAA1192529';
$passwoed = 'katsu0901';
$dbName = 'LAA1192529-boatrace';
$host = 'mysql201.phy.lolipop.lan';
$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
?>

<!doctype html>
<html lang="ja">

<head>
  <?php $title = "MySQL編~レコードの抽出・更新・挿入・削除~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "レコードの抽出・更新・挿入・削除" ?>
    <?php require_once "../common/header_mysql.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="selectAnd.php">抽出・更新・挿入・削除</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>データの抽出</h2>
        <h4>登録番号3800以降で愛知支部の選手</h4>
        <?php
        //MySQLデータベースに接続する
        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          //プリペアドステートメントのエミュレーションを無効にする
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          //例外がスローされる設定にする
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "データベース{$dbName}に接続しました。", "<br>";
          $sql = "SELECT * FROM classic2022 WHERE number >= 3800 AND branch = '愛知'"; //SQL文を作る
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
        ?>
        <?php
        require_once("sqlcode.php");
        echo $bra;
        ?>
        <div class="blank"></div>

        <h4>登録番号3000番～4000番の選手</h4>
        <?php
        //MySQLデータベースに接続する
        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          //プリペアドステートメントのエミュレーションを無効にする
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          //例外がスローされる設定にする
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "データベース{$dbName}に接続しました。", "<br>";
          $sql = "SELECT * FROM classic2022 WHERE number BETWEEN 3000 AND 4000 ORDER BY number"; //SQL文を作る
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
        ?>
        <?php echo $between ?>
        <div class="blank"></div>

        <h4>「田」の文字が含まれている人</h4>
        <?php
        //MySQLデータベースに接続する
        try {
          $pdo = new PDO($dsn, $user, $passwoed);
          //プリペアドステートメントのエミュレーションを無効にする
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          //例外がスローされる設定にする
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "データベース{$dbName}に接続しました。", "<br>";
          $sql = "SELECT * FROM classic2022 WHERE name LIKE '%田%'"; //SQL文を作る
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
        ?>
        <?php echo $like ?>
        <div class="blank"></div>

        <h2>データの更新</h2>
        <div class="frame2">
          <b>UPDATE命令</b><br>
          UPDATE テーブル SET カラム = 値 WHERE 条件
        </div>
        <h4>カラムの値を変更する</h4>
        <?php echo $up ?>
        <h4>全員の番号に1を加算</h4>
        <?php echo $purasu ?>
        <div class="blank"></div>

        <h2>データの挿入</h2>
        <div class="frame2">
          <b>INSERT命令</b><br>
          INSERT テーブル(カラム,カラム,...) VALUES(値,値,...),(値,値,...),...
        </div>
        <h4>メンバーを3人追加する</h4>
        <?php echo $insert ?>

        <div class="blank"></div>

        <h2>データの削除</h2>
        <div class="frame2">
          <b>DELETE命令</b><br>
          DELITE FROM テーブル WHERE 条件
        </div>
        <?php echo $del ?>



      </section>
    </article><br>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>