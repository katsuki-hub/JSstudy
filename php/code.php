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

$form4 = '<pre><code class="prettyprint">&lt;!-- 戻るボタンで初期値に個数を入れる --&gt;
&lt;?php
if (isset($_POST[&#039;kosu&#039;])) {
  $kosu = $_POST[&#039;kosu&#039;];
} else {
  $kosu = &quot;&quot;;
}
?&gt;

&lt;!-- 割引の初期値 --&gt;
&lt;?php
$discount = 0.8;
$off = (1 - $discount) * 100;
if ($discount &gt; 0) {
  echo &quot;&lt;b&gt;ECサイトからのご購入は{$off}% OFFになります！&lt;/b&gt;&quot;;
}
$tanka = 1250;
$tanka_fm = number_format($tanka);
?&gt;

&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;discount.php&quot;&gt;
  &lt;input type=&quot;hidden&quot; name=&quot;discount&quot; value=&quot;&lt;?php echo $discount; ?&gt;&quot;&gt;
  &lt;input type=&quot;hidden&quot; name=&quot;tanka&quot; value=&quot;&lt;?php echo $tanka; ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;単価：&lt;?php echo $tanka_fm; ?&gt;円&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;label&gt;個数：&lt;input type=&quot;number&quot; name=&quot;kosu&quot; value=&quot;&lt;?php echo $kosu ?&gt;&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;計算する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$hidden = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;); //フォーム~入力データのチェック~で参照してね
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;?php
$errors = [];
if (isset($_POST[&#039;discount&#039;])) {
  $discount = $_POST[&#039;discount&#039;];
  if (!is_numeric($discount)) {
    $errors[] = &quot;割引率の数値エラー&quot;;
  }
} else {
  $errors[] = &quot;割引率が未設定&quot;;
}

if (isset($_POST[&#039;tanka&#039;])) {
  $tanka = $_POST[&#039;tanka&#039;];
  if (!ctype_digit($tanka)) {
    $errors[] = &quot;単価の数値エラー&quot;;
  }
} else {
  $errors[] = &quot;単価が未設定&quot;;
}
?&gt;

&lt;?php
if (isset($_POST[&#039;kosu&#039;])) {
  $kosu = $_POST[&#039;kosu&#039;];
  if (!ctype_digit($kosu)) {
    $errors[] = &quot;個数は正の数で要入力&quot;;
  }
} else {
  $errors[] = &quot;個数が未設定&quot;;
}
?&gt;

&lt;?php
if (count($errors) &gt; 0) {
  echo &#039;&lt;ol class = &quot;error&quot;&gt;&#039;;
  foreach ($errors as $value) {
    echo &quot;&lt;li&gt;&quot;, $value, &quot;&lt;/li&gt;&quot;;
  }
  echo &quot;&lt;/ol&gt;&quot;;
} else {
  $price = $tanka * $kosu;
  $discount_price = floor($price * $discount);
  $off_price = $price - $discount_price;
  $off_per = (1 - $discount) * 100;
  $tanka_fm = number_format($tanka);
  $discount_price_fm = number_format($discount_price);
  $off_price_fm = number_format($off_price);

  echo &quot;単価：{$tanka_fm}円、&quot;, &quot;個数：{$kosu}個&quot;, &quot;&lt;br&gt;&quot;;
  echo &quot;金額：{$discount_price_fm}円&quot;, &quot;&lt;br&gt;&quot;;
  echo &quot;割引：{$off_price_fm}円、&quot;, &quot;{$off_per}％ OFF&quot;, &quot;&lt;br&gt;&quot;;
}
?&gt;

&lt;!-- 戻りボタン --&gt;
&lt;form method=&quot;POST&quot; action=&quot;hidden.php#shop&quot;&gt;
  &lt;!-- hiddenで個数を設定して戻った時にPOSTする --&gt;
  &lt;input type=&quot;hidden&quot; name=&quot;kosu&quot; value=&quot;&lt;?php echo $kosu; ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;戻る&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$saleCoupon = '<pre><code class="prettyprint">&lt;?php
//配列データは外部ファイルやデータベースからの読み込みにした方がいい
$couponList = [&quot;kkpp&quot; =&gt; 0.75, &quot;nnpp&quot; =&gt; 0.8, &quot;aapp&quot; =&gt; 0.85];
$priceList = [&quot;xp10&quot; =&gt; 12000, &quot;win11&quot; =&gt; 38000];

function getCouponRate($code) //コードで割引率を調べて返す
{
  global $couponList;
  $isCouponCode = array_key_exists($code, $couponList); //該当するコードがあるかチェック
  if ($isCouponCode) {
    return $couponList[$code]; //割引率を返す
  } else {
    return NULL; //見つからなかったらNULLを返す
  }
}

function getPrice($id) //商品IDで価格を調べて返す
{
  global $priceList;
  $isGoodsID = array_key_exists($id, $priceList);
  if ($isGoodsID) {
    return $priceList[$id]; //価格を返す
  } else {
    return Null; //見つからなかったらNULLを返す
  }
}
</code></pre>';

$form5 = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;); //フォーム~入力データのチェック~で参照してね
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;!-- 割引率と単価の値を直接書かずに式で求める --&gt;
&lt;?php
require_once(&quot;saleData.php&quot;);
$couponCode = &quot;nnpp&quot;;
$goodsID = &quot;win11&quot;;

//コードとIDから割引率と単価を調べる
$discount = getCouponRate($couponCode);
$tanka = getPrice($goodsID);

//割引率と単価に値があるかチェック
if (is_null($discount) || is_null($tanka)) {
  $err = &#039;&lt;div class = &quot;error&quot;&gt;不正な操作がありました。&lt;/div&gt;&#039;;
  exit($err);
}
?&gt;

&lt;?php
$off = (1 - $discount) * 100;
if ($discount &gt; 0) {
  echo &quot;&lt;b&gt;このページでご購入で{$off}％ OFFになります！&lt;/b&gt;&quot;;
}
$tanka_fm = number_format($tanka);
?&gt;

&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;discountCoupon.php&quot;&gt;
  &lt;!-- 隠しフィールドにコードとIDを設定してPOSTする --&gt;
  &lt;input type=&quot;hidden&quot; name=&quot;couponCode&quot; value=&quot;&lt;?php echo $couponCode; ?&gt;&quot;&gt;
  &lt;input type=&quot;hidden&quot; name=&quot;goodsID&quot; value=&quot;&lt;?php echo $goodsID; ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;label&gt;単価：&lt;?php echo $tanka_fm; ?&gt;円&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;label&gt;個数：&lt;input type=&quot;number&quot; name=&quot;kosu&quot; value=&quot;&lt;?php echo $kosu; ?&gt;&quot;&gt;&lt;/label&gt;&lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;購入する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$coupon = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;); //フォーム~入力データのチェック~で参照してね
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;?php
$errors = [];
if (isset($_POST[&#039;couponCode&#039;])) {
  $couponCode = $_POST[&#039;couponCode&#039;];
} else {
  $couponCode = &quot;&quot;; //未設定
}

if (isset($_POST[&#039;goodsID&#039;])) {
  $goodsID = $_POST[&#039;goodsID&#039;];
} else {
  $goodsID = &quot;&quot;; //未設定
}
?&gt;

&lt;?php
require_once(&quot;saleData.php&quot;);
$discount = getCouponRate($couponCode); //割引率
$tanka = getPrice($goodsID); //単価
if (is_null($discount) || is_null($tanka)) {
  $err = &#039;&lt;div class = &quot;error&quot;&gt;不正な操作がありました。&lt;/div&gt;&#039;;
  exit($err);
}
?&gt;

&lt;?php
if (isset($_POST[&#039;kosu&#039;])) {
  $kosu = $_POST[&#039;kosu&#039;];
  if (!ctype_digit($kosu)) {
    $errors[] = &quot;個数は整数で入力してください。&quot;;
  }
} else {
  $errors[] = &quot;個数が未設定&quot;;
}
?&gt;

&lt;?php
if (count($errors) &gt; 0) {
  echo &#039;&lt;ol class = &quot;error&quot;&gt;&#039;;
  foreach ($errors as $value) {
    echo &quot;&lt;li&gt;&quot;, $value, &quot;&lt;/li&gt;&quot;;
  }
  echo &quot;&lt;/ol&gt;&quot;;
} else {
  $price = $tanka * $kosu;
  $discount_price = floor($price * $discount);
  $off_price = $price - $discount_price;
  $off_per = (1 - $discount) * 100;
  $tanka_fm = number_format($tanka);
  $discount_price_fm = number_format($discount_price);
  $off_price_fm = number_format($off_price);

  echo &quot;単価：{$tanka_fm}円、&quot;, &quot;個数：{$kosu}個&quot;, &quot;&lt;br&gt;&lt;br&gt;&quot;;
  echo &quot;金額：{$discount_price_fm}円&quot;, &quot;&lt;br&gt;&quot;;
  echo &quot;(割引：-{$off_price_fm}円、&quot;, &quot;{$off_per}％ OFF)&quot;, &quot;&lt;br&gt;&quot;;
}
?&gt;

&lt;!-- 戻りボタン --&gt;
&lt;form method=&quot;POST&quot; action=&quot;sale.php&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;戻る&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;
</code></pre>';

$mileKm = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;); //フォーム~入力データのチェック~で参照してね
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;

&lt;?php
if (isset($_POST[&quot;mile&quot;])) {
  $isNum = is_numeric($_POST[&quot;mile&quot;]); //数値かどうか確認
  if ($isNum) {
    $mile = $_POST[&quot;mile&quot;];
    $error = &quot;&quot;;
  } else {
    $mile = &quot;&quot;;
    $error = &#039;&lt;span class = error&gt;数値を入力してください。&lt;/span&gt;&#039;;
  }
} else { //POSTされた値がないとき
  $isNum = false;
  $mile = &quot;&quot;;
  $error = &quot;&quot;;
}
?&gt;

&lt;!-- 入力フォーム（現在のページにPOST） --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;&lt;!-- es.phpのes()でxss対策--&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;
      &lt;label&gt;
        &lt;input type=&quot;text&quot; name=&quot;mile&quot; value=&quot;&lt;?php echo $mile; ?&gt;&quot;&gt;
      &lt;/label&gt;
      &lt;?php echo $error ?&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;計算する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
if ($isNum) { //$mileが数値であれば計算結果を表示する
  echo &quot;&lt;HR&gt;&quot;;
  $km = $mile * 1.609344;
  echo &quot;{$mile}マイルは{$km}kmです！！&quot;;
}
?&gt;
</code></pre>';

$xss = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;); //フォーム~入力データのチェック~で参照してね
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
$_POST = es($_POST); //HTMLエスケープ(xss対策)
?&gt;
</code></pre>';

$radio = '<pre><code class="prettyprint">&lt;?php
$error = []; //エラーを入れる配列
if (isset($_POST[&quot;sex&quot;])) {
  $sexValues = [&quot;男性&quot;, &quot;女性&quot;];
  $isSex = in_array($_POST[&quot;sex&quot;], $sexValues);
  if ($isSex) {
    $sex = $_POST[&quot;sex&quot;];
  } else {
    $sex = &quot;error&quot;;
    $error[] = &quot;「性別」に入力エラーがあります。&quot;;
  }
} else { //POSTされた値がないとき
  $isSex = false;
  $sex = &quot;男性&quot;;
}

if (isset($_POST[&quot;marriage&quot;])) {
  $marriageValue = [&quot;独身&quot;, &quot;既婚&quot;, &quot;同棲中&quot;];
  $isMarriage = in_array($_POST[&quot;marriage&quot;], $marriageValue);
  if ($isMarriage) {
    $marriage = $_POST[&quot;marriage&quot;];
  } else {
    $marriage = &quot;error&quot;;
    $error[] = &quot;「結婚」に入力エラー！！&quot;;
  }
} else { //POSTされた値がないとき
  $isMarriage = false;
  $marriage = &quot;独身&quot;;
}
?&gt;

&lt;!-- ラジオボタンを初期値でチェック(選択)するかどうか --&gt;
&lt;?php
function checked($value, $question)
{
  if (is_array($question)) { //配列のとき値が含まれていればtrue
    $isChecked = in_array($value, $question);
  } else { //配列でないとき値が一致すればtrue
    $isChecked = ($value === $question);
  }
  if ($isChecked) { //ラジオボタンのinputにchecked入れるかどうか
    echo &quot;checked&quot;;
  } else {
    echo &quot;&quot;;
  }
}
?&gt;

&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;span&gt;性別：　&lt;/span&gt;
      &lt;label&gt;&lt;input type=&quot;radio&quot; name=&quot;sex&quot; value=&quot;男性&quot; &lt;?php checked(&quot;男性&quot;, $sex); ?&gt;&gt;男性&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;radio&quot; name=&quot;sex&quot; value=&quot;女性&quot; &lt;?php checked(&quot;女性&quot;, $sex); ?&gt;&gt;女性&lt;/label&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;span&gt;結婚：　&lt;/span&gt;
      &lt;label&gt;&lt;input type=&quot;radio&quot; name=&quot;marriage&quot; value=&quot;独身&quot; &lt;?php checked(&quot;独身&quot;, $marriage); ?&gt;&gt;独身&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;radio&quot; name=&quot;marriage&quot; value=&quot;既婚&quot; &lt;?php checked(&quot;既婚&quot;, $marriage); ?&gt;&gt;既婚&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;radio&quot; name=&quot;marriage&quot; value=&quot;同棲中&quot; &lt;?php checked(&quot;同棲中&quot;, $marriage); ?&gt;&gt;同棲中&lt;/label&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
$isSubmited = $isSex &amp;&amp; $isMarriage;
if ($isSubmited) { //「性別」と「結婚」が受信されていれば結果を表示
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;あなたは{$sex}、{$marriage}です。&quot;;
}
?&gt;

&lt;?php
if (count($error) &gt; 0) { //エラー表示
  echo &quot;&lt;HR&gt;&quot;;
  //implode関数で配列の要素に&lt;br&gt;を付けて連結
  echo &#039;&lt;span class = &quot;error&quot;&gt;&#039;, implode(&quot;&lt;br&gt;&quot;, $error), &#039;&lt;/span&gt;&#039;;
}
?&gt;</code></pre>';


?>
