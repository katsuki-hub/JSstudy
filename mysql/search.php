<?php
require_once("../common/es.php"); //PHPのフォーム~入力データのチェック~で参照してね
$backURL = "searchForm.php";

if (!checkEn($_POST)) { //エンコードチェック
  header("Location:{$backURL}");
  exit();
}

if (empty($_POST)) { //空の時エラー
  header("Location:{$backURL}");
  exit();
} else if (!isset($_POST["branch"]) || ($_POST["branch"] === "")) {
  header("Location:{$backURL}");
  exit();
}

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
  <?php $title = "MySQL編~検索結果~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "検索結果" ?>
    <?php require_once "../common/header_mysql.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="searchForm.php">検索</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <?php
    $branch = $_POST["branch"];
    try {
      $pdo = new PDO($dsn, $user, $passwoed);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT*FROM classic2022 WHERE branch LIKE(:branch)"; //SQL文
      $stm = $pdo->prepare($sql); //プリペアドステートメント作成
      $stm->bindValue(':branch', "%{$branch}%", PDO::PARAM_STR);
      $stm->execute(); //SQL文の実行
      $result = $stm->fetchAll(PDO::FETCH_ASSOC);
      if (count($result) > 0) {
        echo "{$branch}支部の出場選手";
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
      } else {
        echo "{$branch}支部の選手は見つかりませんでした。";
      }
    } catch (Exception $e) {
      echo '<span class="error">エラーがありました</span><br>';
      echo $e->getMessage();
    }
    ?>
    <HR>
    <p><a href="<?php echo $backURL ?>">戻る</a></p>

  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
</body>

</html>