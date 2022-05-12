<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~トランジション~" ?>
  <?php require_once "../common/head.php"; ?>
  <link href="../css/transition.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php require_once("../common/tag_body.php"); ?>

  <header>
    <?php $headerTitle = "トランジション" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="../transition.php">トランジション</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>CSSトランジション</h2>
        <h4>CSSトランジションのデフォルトclass名</h4>
        <table border="5">
          <tr>
            <th>class名</th>
            <th>役割</th>
          </tr>
          <tr>
            <td>v-enter</td>
            <td>Enterフェーズ開始前のスタイルを定義するclass名</td>
          </tr>
          <tr>
            <td>v-enter-to</td>
            <td>Enterフェーズ終了時のスタイルを定義するclass名</td>
          </tr>
          <tr>
            <td>v-enter-active</td>
            <td>Enterフェーズ継続中のスタイルを定義するclass名</td>
          </tr>
          <tr>
            <td>v-leave</td>
            <td>v-leaveフェーズ開始前のスタイルを定義するclass名</td>
          </tr>
          <tr>
            <td>v-leave-to</td>
            <td>v-leaveフェーズ終了時のスタイルを定義するclass名</td>
          </tr>
          <tr>
            <td>v-leave-active</td>
            <td>v-leaveフェーズ継続中のスタイルを定義するclass名</td>
          </tr>
        </table>
        <h3>フェードイン・フェードアウト</h3>
        <h5>Googleが掲げる「10の事実」</h5>
        <div id="fade">
          <button v-on:click="show = !show">表示の切り替え</button>
          <transition>
            <p v-if="show">
              1. ユーザーに焦点を絞れば、他のものはみな後からついてくる<br>
              2. 1つのことをとことん極めてうまくやるのが一番<br>
              3. 遅いより速いほうがいい<br>
              4. ウェブ上の民主主義は機能する<br>
              5. 情報を探したくなるのはパソコンの前にいるときだけではない<br>
              6. 悪事を働かなくてもお金は稼げる<br>
              7. 世の中にはまだまだ情報があふれている<br>
              8. 情報のニーズはすべての国境を越える<br>
              9. スーツがなくても真剣に仕事はできる<br>
              10.「すばらしい」では足りない
            </p>
          </transition>
        </div>
        <h3>HTML</h3>
        <?php
        require_once("vueCode.php");
        echo $fade;
        ?>
        <h3>JavaScript</h3>
        <?php echo $fade_js; ?>
        <h3>CSS</h3>
        <?php echo $fade_css; ?>
        <p>※デフォルトでは表示されている要素にはopacity:1を指定しなくても良いため、v-enter-toとv-leaveは省略できます。</p>
        <div class="frame4">
          class名の先頭部分を自分で指定
          <hr>
          &lt;transition name=&quot;fade&quot;&gt;のようにname属性を指定すると先頭を「v-〇〇」ではなく「fade-〇〇」等のclass名が使えるようになります。
        </div>
        <h5>カスタムトランジション</h5>
        外部のライブラリを使うときや決まったclass名を指定したい時のクラスの定義
        <table border="5">
          <tr>
            <th>属性名</th>
            <th>役割</th>
          </tr>
          <tr>
            <td>enter-class</td>
            <td>Enterフェーズ開始前のスタイルを定義するclass</td>
          </tr>
          <tr>
            <td>enter-to-class</td>
            <td>Enterフェーズ終了時のスタイルを定義するclass</td>
          </tr>
          <tr>
            <td>enter-active-class</td>
            <td>Enterフェーズ継続中のスタイルを定義するclass</td>
          </tr>
          <tr>
            <td>leave-class</td>
            <td>v-leaveフェーズ開始前のスタイルを定義するclass</td>
          </tr>
          <tr>
            <td>leave-to-class</td>
            <td>v-leaveフェーズ終了時のスタイルを定義するclass</td>
          </tr>
          <tr>
            <td>leave-active-class</td>
            <td>v-leaveフェーズ継続中のスタイルを定義するclass</td>
          </tr>
        </table>
        <h3>カスタムトランジションクラスの使用例</h3>
        <?php echo $animated; ?>

      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
  <script src="../scripts/vue2.6.14.js"></script>
  <script>
  var fade = new Vue({
    el: '#fade',
    data: {
      show: false
    }
  });
  </script>
</body>

</html>