<!doctype html>
<html lang="ja">

<head>
  <?php $title = "vue.js編~フォーム入力バインディング~" ?>
  <?php require_once "../common/head.php"; ?>
</head>

<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2ZWXCZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header>
    <?php $headerTitle = "フォーム入力バインディング" ?>
    <?php require_once "../common/header_vue.php"; ?>
  </header>
  <!-- パンくずリスト -->
  <div id="bread">
    <ol>
      <li><a href="../index.php">HOME</a></li>
      <li><a href="formbind.php">フォームバインド</a></li>
    </ol>
  </div>
  <!-- main-wrapper -->
  <div class="main-wrapper">
    <article>
      <section>
        <h2>データと入力を同期する</h2>
        <div class="frame3">
          <b>双方向のデータバインド</b><br>
          フォーム入力バインディングは、コンポーネントが持つデータとユーザーがフォームコントロールから入力する内容を双方にバインドする機能です。
        </div>
        <div class="frame2">
          &lt;要素名 v-model=&quot;プロパティ名&quot;&gt;<br><br>
          <b>v-modelを使ったフォームコントロールの初期値</b><br>
          ・value属性、checked属性、selected属性を指定しても無視される<br>
          ・初期値はコンポーネント側で設定しなければならない
        </div>
        <h5>テキストボックス(改行できない入力欄)</h5>
        <div class="frame2">
          &lt;input type=&quot;text&quot; v-model=&quot;プロパティ名&quot;&gt;<br>
          ※日本語入力をリアルタイムに反映するには、inputイベントハンドラを利用する。
        </div>
        <h5>テキストエリア(改行できる入力欄)</h5>
        <div class="frame2">
          &lt;textarea v-model=&quot;プロパティ名&quot;&gt;&lt;/textarea&gt;
        </div>
        <h5>チェックボックス</h5>
        <div class="frame2">
          &lt;input type=&quot;checkbox&quot; v-model=&quot;プロパティ名&quot;&gt;
        </div>
        <p>v-modelでバインドしたプロパティには真偽値が設定されます。<br>
          そこで、true-valueとfaise-valueを使うと、真偽値の代わりに任意の文字列をバインドできます。</p>
        <h5>複数のチェックボックス</h5>
        <div class="frame2">
          &lt;input type=&quot;checkbox&quot; v-model=&quot;プロパティ名&quot; value=&quot;値1&quot;&gt;<br>
          &lt;input type=&quot;checkbox&quot; v-model=&quot;プロパティ名&quot; value=&quot;値2&quot;&gt;<br>
          &lt;input type=&quot;checkbox&quot; v-model=&quot;プロパティ名&quot; value=&quot;値3&quot;&gt;
        </div>
        <p>複数のチェックボックスはグループ化する必要があり、グループに対して1つのプロパティをバインドします。<br><br>
          ・単体のチェックボックスは真偽値(trueまたはfalse)<br>
          ・複数のチェックボックスは文字列型の配列</p>
        <h3>グループ化したチェックボックスにバインドする</h3>
        <div id="app">
          <p>休日の過ごし方：{{selection}}</p>
          <label>
            <input type="checkbox" v-model="answer" value="読書">読書
          </label>
          <label>
            <input type="checkbox" v-model="answer" value="ボルダリング">ボルダリング
          </label>
          <label>
            <input type="checkbox" v-model="answer" value="キャンプ">キャンプ
          </label>
        </div>
        <h3>HTML</h3>
        <?php
        require_once("vueCode.php");
        echo $check;
        ?>
        <h3>JavaScript</h3>
        <?php echo $check_js; ?>
        <h5>セレクトボックス(プルダウン方式)</h5>
        <div class="frame2">
          単一選択の場合
          <hr>
          &lt;select v-model=&#039;プロパティ名&#039;&gt;<br>
          　&lt;option value=&quot;値1&quot;&gt;選択肢1&lt;/option&gt;<br>
          　&lt;option value=&quot;値2&quot;&gt;選択肢2&lt;/option&gt;<br>
          　&lt;option value=&quot;値3&quot;&gt;選択肢3&lt;/option&gt;<br>
          &lt;/select&gt;
        </div>
        <p>セレクトボックスにmultiple属性をつけると複数選択可能になるがあまり使われない。単一選択と複数選択でデータの扱いが少し異なる。</p>
        <h5>カレンダー(日付の選択)</h5>
        <h3>カレンダーにバインド(翌日以降の指定)</h3>
        <div id="app2">
          <p>ご希望日：{{request_date}}</p>
          <input type="date" v-model="request_date" v-bind:min="min_date">
        </div>
        <p>HTMLの使用上type="date"のinput要素に設定できる初期値はYYYY-MM-DD形式の文字列でないといけません。そのため、createdライフサイクルハックを使いコンポーネントがDOMに結びつく前にプロパティに初期値設定しています。min属性に最小値設定するとそれ以前の日付は選択できなくなります。</p>
        <h3>HTML</h3>
        <?php echo $date; ?>
        <h3>JavaScript</h3>
        <?php echo $date_js; ?>
        <h5>レンジ入力とカラー選択</h5>
        <h3>フォームコントロールの同期</h3>
        <div id="app3">
          <fieldset>
            <legend>色の選択</legend>
            <input type="color" v-model="color">{{color}}<br>
            赤：<input type="range" v-model.number="red" min="0" max="255">{{red}}<br>
            緑：<input type="range" v-model.number="green" min="0" max="255">{{green}}<br>
            青：<input type="range" v-model.number="blue" min="0" max="255">{{blue}}<br>
          </fieldset>
        </div>
        <h3>HTML</h3>
        <?php echo $color; ?>
        <h3>JavaScript</h3>
        <?php echo $color_js; ?>
        <div class="frame4">
          <b>point!</b><br>
          ・type="range"のスライダーでは0から255迄の範囲の数値を入力使用ですがHTMLの仕様上でinput要素からの入力値は文字列型のため、.number飾飾子をつけて数値型へ変換が必要。<br><br>
          ・カラーパレットとスライダーのどちらか変更したときにもう一方の値を更新するため、ウォッチャを使ってデータの監視を行う。<br><br>
          ・red,green,blueのプロパティに対して配列に詰め込んで返す算出プロパティをcolorElementという名前で定義しウォッチャで監視している。
        </div>
        <h4>制御をサポートする3つの修飾子</h4>
        <table border="3">
          <tr>
            <th>v-model.lazy</th>
            <td>入力値が変わるとすぐに同期する</td>
          </tr>
          <tr>
            <th>v-model.number</th>
            <td>入力値を自動で数値型に変換する</td>
          </tr>
          <tr>
            <th>v-model.trim</th>
            <td>余分なスペースを取り除く</td>
          </tr>
        </table>
      </section>
    </article>
  </div><!-- /.main-wrapper -->
  <footer>
    <?php require_once "../common/footer.php"; ?>
  </footer>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
  <script src="../scripts/move.js"></script>
  <script src="../scripts/vue2.6.14.js"></script>
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        answer: []
      },
      computed: {
        //チェック内容を連結した文字列を返す算出プロパティ
        selection: function() {
          return this.answer.join();
        }
      }
    });
  </script>
  <script>
    var app2 = new Vue({
      el: '#app2',
      data: {
        request_date: null,
        min_date: null
      },
      created: function() {
        //初期値設定を翌日へ
        var dt = new Date();
        dt.setDate(dt.getDate() + 1);
        this.request_date = this.formatDate(dt);
        //翌日の日付を最小値へ
        this.min_date = this.request_date;
      },
      methods: {
        //日付をYYYY-MM-DDに整形するメソッド
        formatDate: function(dt) {
          var y = dt.getFullYear();
          var m = ('00' + (dt.getMonth() + 1)).slice(-2);
          var d = ('00' + dt.getDate()).slice(-2);
          var result = y + '-' + m + '-' + d;
          return result;
        }
      }
    });
  </script>
  <script>
    var app3 = new Vue({
      el: '#app3',
      data: {
        color: '#000000',
        red: 0,
        blue: 0,
        green: 0
      },
      computed: {
        //赤・緑・青を配列で返す算出プロパティ
        colorElement: function() {
          return [this.red, this.green, this.blue];
        }
      },
      watch: {
        //赤・緑・青のいずれかの変更を監視する
        colorElement: function(newRGB, oldRGB) {
          //赤・緑・青を2桁の16進数表記に変換する
          var r = ('00' + newRGB[0].toString(16).toUpperCase()).slice(-2);
          var g = ('00' + newRGB[1].toString(16).toUpperCase()).slice(-2);
          var b = ('00' + newRGB[2].toString(16).toUpperCase()).slice(-2);
          //#RRGGBB形式の文字列で更新する
          this.color = '#' + r + g + b;
        },
        //カラーパレットの選択変更を監視する
        color: function(newColor, oldColor) {
          this.red = parseInt(newColor, substr(1, 2), 16);
          this.green = parseInt(newColor, substr(3, 2), 16);
          this.blue = parseInt(newColor, substr(5, 2), 16);
        }
      }
    });
  </script>
</body>

</html>