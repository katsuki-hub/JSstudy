<?php
$form1 = '<pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;nameCheck.php&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;名前：&lt;input type=&quot;text&quot; name=&quot;name&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$form2 = '<pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;warikan.php&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;合計金額：&lt;input type=&quot;number&quot; name=&quot;goukei&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;label&gt;　人数　：&lt;input type=&quot;number&quot; name=&quot;ninzu&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;割り勘する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$warikan = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);
if (!checkEn($_POST)) {
  $encoding = mb_internal_encoding();
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;?php
$errors = []; //エラーメッセージを入れる配列の初期化
?&gt;

&lt;?php
//合計金額チェック
if (isset($_POST[&#039;goukei&#039;])) {
  $goukei = $_POST[&#039;goukei&#039;];
  if (!ctype_digit($goukei)) { //関数の引数に指定された文字列に数字だけが含まれているかどうか
    $errors[] = &quot;整数で金額を入力してください！&quot;;
  }
} else { //未設定のエラー
  $errors[] = &quot;合計の金額を設定してください！\(-.-)/&quot;;
}

//人数チェック
if (isset($_POST[&#039;ninzu&#039;])) {
  $ninzu = $_POST[&#039;ninzu&#039;];
  if (!ctype_digit($ninzu)) {
    $errors[] = &quot;人数を入力してください！&quot;;
  } else if ($ninzu == 0) {
    $errors[] = &quot;0人では割り勘できません。&quot;;
  }
} else { //未設定のエラー
  $errors[] = &quot;人数が設定されていません！\(-.-)/&quot;;
}
?&gt;

&lt;?php
if (count($errors) &gt; 0) { //配列$errorsの値が1個でもある場合
  echo &#039;&lt;ol class = &quot;error&quot;&gt;&#039;;
  foreach ($errors as $value) { //エラー内容をリスト表示
    echo &quot;&lt;li&gt;&quot;, $value, &quot;&lt;/li&gt;&quot;;
  }
  echo &quot;&lt;/ol&gt;&quot;;
?&gt;

  &lt;!-- 戻るボタン --&gt;
  &lt;form method=&quot;POST&quot; action=&quot;formDetaCheck.php#warikan&quot;&gt;
    &lt;ul class=&quot;nolist&quot;&gt;
      &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;戻る&quot;&gt;&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/form&gt;

&lt;?php
} else { //エラーがなかった時の処理
  $amari = $goukei % $ninzu;
  $price = ($goukei - $amari) / $ninzu;

  $goukei_fm = number_format($goukei); //3桁区切り
  $price_fm = number_format($price);

  echo &quot;{$goukei_fm}円を{$ninzu}人で割り勘します。&quot;, &quot;&lt;br&gt;&quot;;
  echo &quot;1人当たり{$price_fm}円のお支払いで、不足分は{$amari}円です。&quot;;
}
?&gt;
</code></pre>
';

$form3 = '<!-- ソースコード -->
<pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;postCheck.php&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;郵便番号：&lt;input type=&quot;text&quot; name=&quot;postno&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$post = '<!-- ソースコード -->
<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);
if (!checkEn($_POST)) {
  $encoding = mb_internal_encoding();
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;?php
$errors = [];
if (isset($_POST[&#039;postno&#039;])) {
  $postno = trim($_POST[&#039;postno&#039;]);
  $pattern = &quot;/^[0-9]{3}-[0-9]{4}$/&quot;;
  if (!preg_match($pattern, $postno)) { //郵便番号の形式じゃない
    $errors[] = &quot;郵便番号を正しく入力してください。&quot;;
  }
} else { //未設定エラー
  $errors[] = &quot;郵便番号の入力をお願いします。&quot;;
}
?&gt;

&lt;?php
if (count($errors) &gt; 0) { //エラーがあったら
  echo &#039;&lt;ol class = &quot;error&quot;&gt;&#039;;
  foreach ($errors as $value) {
    echo &quot;&lt;li&gt;&quot;, $value, &quot;&lt;/li&gt;&quot;;
  }
  echo &quot;&lt;/ol&gt;&quot;;
} else { //エラーがないとき
  echo &quot;郵便番号は{$postno}です。&quot;;
}
?&gt;

&lt;!-- 戻るボタン --&gt;
&lt;form method=&quot;POST&quot; action=&quot;formDetaCheck.php#postNo&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;戻る&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';
