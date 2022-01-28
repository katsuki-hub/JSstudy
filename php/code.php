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

if (isset($_POST[&quot;blood&quot;])) {
  $bloodType = [&quot;A型&quot;, &quot;B型&quot;, &quot;O型&quot;, &quot;AB型&quot;];
  $isBlood = in_array($_POST[&quot;blood&quot;], $bloodType);
  if ($isBlood) {
    $blood = $_POST[&quot;blood&quot;];
  } else {
    $blood = &quot;error&quot;;
    $error[] = &quot;「血液型」に入力エラー！！&quot;;
  }
} else { //POSTされた値がないとき
  $isBlood = false;
  $blood = &quot;A型&quot;;
}
?&gt;


&lt;?php
//ラジオボタンを初期値でチェック(選択)するかどうか
function checked($value, $question)
{
  if (is_array($question)) { //配列のとき値が含まれていればtrue
    $isChecked = in_array($value, $question);
  } else { //配列でないとき値が一致すればtrue
    $isChecked = ($value === $question);
  }
  if ($isChecked) { //フォームのinputにchecked入れるかどうか
    echo &quot;checked&quot;;
  } else {
    echo &quot;&quot;;
  }
}

//プルダウンを初期値でチェック(選択)するかどうか
function selected($value, $question)
{
  if (is_array($question)) {
    $isSelected = in_array($value, $question);
  } else {
    $isSelected = ($value === $question);
  }
  if ($isSelected) { //フォームのinputにselected入れるかどうか
    echo &quot;selected&quot;;
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
    &lt;li&gt;&lt;span&gt;血液型：　&lt;/span&gt;
      &lt;select name=&quot;blood&quot;&gt;
        &lt;option value=&quot;A型&quot; &lt;?php selected(&quot;A型&quot;, $blood); ?&gt;&gt;A型&lt;/option&gt;
        &lt;option value=&quot;B型&quot; &lt;?php selected(&quot;B型&quot;, $blood); ?&gt;&gt;B型&lt;/option&gt;
        &lt;option value=&quot;O型&quot; &lt;?php selected(&quot;O型&quot;, $blood); ?&gt;&gt;O型&lt;/option&gt;
        &lt;option value=&quot;AB型&quot; &lt;?php selected(&quot;AB型&quot;, $blood); ?&gt;&gt;AB型&lt;/option&gt;
      &lt;/select&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
$isSubmited = $isSex &amp;&amp; $isMarriage;
if ($isSubmited) { //「性別」と「結婚」が受信されていれば結果を表示
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;あなたは{$sex}、{$marriage}です。&quot;, &quot;&lt;br&gt;&quot;;
  echo &quot;血液型は{$blood}です。&quot;;
}
?&gt;

&lt;?php
if (count($error) &gt; 0) { //エラー表示
  echo &quot;&lt;HR&gt;&quot;;
  //implode関数で配列の要素に&lt;br&gt;を付けて連結
  echo &#039;&lt;span class = &quot;error&quot;&gt;&#039;, implode(&quot;&lt;br&gt;&quot;, $error), &#039;&lt;/span&gt;&#039;;
}
?&gt;</code></pre>';

$checkBox = '<pre><code class="prettyprint">&lt;?php
$error2 = [];
if (isset($_POST[&quot;tour&quot;])) {
  $tours = [&quot;キャンプ&quot;, &quot;コテージ&quot;, &quot;ホテル&quot;];
  $diffValue = array_diff($_POST[&quot;tour&quot;], $tours); //配列同士を比較し、重複していない要素を取得
  if (count($diffValue) == 0) { //規格外の値が含まれてなければOK
    $tourChecked = $_POST[&quot;tour&quot;];
  } else {
    $tourChecked = [];
  }
} else {
  $tourChecked = [];
  $error2[] = &quot;「宿泊先」にエラーがあります。&quot;;
}

if (isset($_POST[&quot;meal&quot;])) {
  $meals = [&quot;朝食付き&quot;, &quot;昼食付き&quot;, &quot;ディナー付き&quot;];
  $diffValue = array_diff($_POST[&quot;meal&quot;], $meals); //配列同士を比較し、重複していない要素を取得
  if (count($diffValue) == 0) { //規格外の値が含まれてなければOK
    $mealChecked = $_POST[&quot;meal&quot;];
  } else {
    $mealChecked = [];
  }
} else {
  $mealChecked = [];
  $error2[] = &quot;「食事」にエラーがあります。&quot;;
}

if (isset($_POST[&quot;place&quot;])) {
  $placeArea = [&quot;河川&quot;, &quot;山&quot;, &quot;海&quot;];
  $diffValue = array_diff($_POST[&quot;place&quot;], $placeArea); //配列同士を比較し、重複していない要素を取得
  if (count($diffValue) == 0) { //規格外の値が含まれてなければOK
    $placeSelected = $_POST[&quot;place&quot;];
  } else {
    $placeSelected = [];
  }
} else {
  $placeSelected = [];
  $error2[] = &quot;「場所」にエラーがあります。&quot;;
}
?&gt;


&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;span&gt;宿泊先：　&lt;/span&gt;
      &lt;label&gt;&lt;input type=&quot;checkbox&quot; name=&quot;tour[]&quot; value=&quot;キャンプ&quot; &lt;?php checked(&quot;キャンプ&quot;, $tourChecked); ?&gt;&gt;キャンプ&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;checkbox&quot; name=&quot;tour[]&quot; value=&quot;コテージ&quot; &lt;?php checked(&quot;コテージ&quot;, $tourChecked); ?&gt;&gt;コテージ&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;checkbox&quot; name=&quot;tour[]&quot; value=&quot;ホテル&quot; &lt;?php checked(&quot;ホテル&quot;, $tourChecked); ?&gt;&gt;ホテル&lt;/label&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;span&gt;お食事：　&lt;/span&gt;
      &lt;label&gt;&lt;input type=&quot;checkbox&quot; name=&quot;meal[]&quot; value=&quot;朝食付き&quot; &lt;?php checked(&quot;朝食付き&quot;, $mealChecked); ?&gt;&gt;朝食付き&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;checkbox&quot; name=&quot;meal[]&quot; value=&quot;昼食付き&quot; &lt;?php checked(&quot;昼食付き&quot;, $mealChecked); ?&gt;&gt;昼食付き&lt;/label&gt;
      &lt;label&gt;&lt;input type=&quot;checkbox&quot; name=&quot;meal[]&quot; value=&quot;ディナー付き&quot; &lt;?php checked(&quot;ディナー付き&quot;, $mealChecked); ?&gt;&gt;ディナー付き&lt;/label&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;span&gt;場所：　&lt;/span&gt;
      &lt;select name=&quot;place[]&quot; size=&quot;3&quot; multiple&gt;
        &lt;option value=&quot;河川&quot; &lt;?php selected(&quot;河川&quot;, $placeSelected); ?&gt;&gt;河川&lt;/option&gt;
        &lt;option value=&quot;山&quot; &lt;?php selected(&quot;山&quot;, $placeSelected); ?&gt;&gt;山&lt;/option&gt;
        &lt;option value=&quot;海&quot; &lt;?php selected(&quot;海&quot;, $placeSelected); ?&gt;&gt;海&lt;/option&gt;
      &lt;/select&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;!-- 宿泊先か食事のどちらかがチェックされていれば結果表示 --&gt;
&lt;?php
$isSelected = count($mealChecked) &gt; 0 || count($tourChecked) &gt; 0;
if ($isSelected) {
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;宿泊先：&quot;, implode(&quot;と&quot;, $tourChecked), &quot;&lt;br&gt;&quot;;
  echo &quot;お食事：&quot;, implode(&quot;と&quot;, $mealChecked), &quot;&lt;br&gt;&quot;;
  echo &quot;場所：&quot;, implode(&quot;と&quot;, $placeSelected), &quot;&lt;br&gt;&quot;;
} else {
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;選択されていません。&quot;;
}
?&gt;

&lt;?php
if (count($error2) &gt; 0) { //エラー表示
  echo &quot;&lt;HR&gt;&quot;;
  //implode関数で配列の要素に&lt;br&gt;を付けて連結
  echo &#039;&lt;span class = &quot;error&quot;&gt;&#039;, implode(&quot;&lt;br&gt;&quot;, $error2), &#039;&lt;/span&gt;&#039;;
}
?&gt;
&lt;!-- 初期値でチェックchecked関数は上記のラジオボタンフォームを参照 --&gt;
</code></pre>';

$slider = '<pre><code class="prettyprint">&lt;?php
$error = [];
$min = 1;
$max = 5;
if (isset($_POST[&quot;roasting&quot;])) {
  $roasting = $_POST[&quot;roasting&quot;];
  $isRoasting = ctype_digit($roasting) &amp;&amp; ($roasting &gt;= $min) &amp;&amp; ($roasting &lt;= $max);
  if (!$isRoasting) {
    $error[] = &quot;焙煎殿値にエラーがあります。&quot;;
    $roasting = $min;
  }
} else {
  $roasting = round(($min + $max) / 2);
  $isRoasting = true;
}
?&gt;

&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;span&gt;焙煎土：　&lt;/span&gt;
      &lt;input type=&quot;range&quot; name=&quot;roasting&quot; min=&quot;1&quot; max=&quot;5&quot; step=&quot;1&quot; value=&quot;&lt;?php echo $roasting; ?&gt;&quot;&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;決定&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
if ($isRoasting) {
  $rostList = [&quot;ライトロースト&quot;, &quot;ミディアムロースト&quot;, &quot;ハイロースト&quot;, &quot;シティロースト&quot;, &quot;フレンチロースト&quot;];
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;お好みの焙煎度は「{$roasting}、{$rostList[$roasting - 1]}」です。&quot;;
}
?&gt;

&lt;?php
if (count($error) &gt; 0) {
  echo &quot;&lt;HR&gt;&quot;;
  echo &#039;&lt;span class = &quot;error&quot;&gt;&#039;, implode(&quot;&lt;br&gt;&quot;, $error), &#039;&lt;/span&gt;&#039;;
}
?&gt;
</code></pre>
';

$text = '<pre><code class="prettyprint">&lt;?php
if (isset($_POST[&quot;note&quot;])) {
  $note = $_POST[&quot;note&quot;];
  $note = strip_tags($note); //HTML,PHPタグを削除する
  $note = mb_substr($note, 0, 150); //最大150文字だけ取り出し
  $note = es($note); //HTMLエスケープ
} else {
  $note = &quot;&quot;; //POSTされた値が無いとき
}
?&gt;

&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;span&gt;お問い合わせ：　&lt;/span&gt;
      &lt;textarea name=&quot;note&quot; cols=&quot;30&quot; rows=&quot;5&quot; maxlength=&quot;150&quot; placeholder=&quot;コメント入力&quot;&gt;&lt;/textarea&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
$length = mb_strlen($note); //テキストが入力されていれば表示
if ($length &gt; 0) {
  echo &quot;&lt;HR&gt;&quot;;
  $note_br = nl2br($note, false); //改行コード前に&lt;br&gt;を挿入
  echo $note_br;
}
?&gt;
</code></pre>';

$datefield = '<pre><code class="prettyprint">&lt;?php
$error = [];
if (!empty($_POST[&quot;theDate&quot;])) { //POSTされた日付取り出し
  $postDate = trim($_POST[&quot;theDate&quot;]); //日付文字列を取り出す
  $postDate = mb_convert_kana($postDate, &quot;as&quot;); //全角を半角にする

  $pattern1 = preg_match(&quot;/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/&quot;, $postDate);
  $pattern2 = preg_match(&quot;#^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}$#&quot;, $postDate);
  if ($pattern1) {
    $dataArray = explode(&quot;-&quot;, $postDate); //指定文字&quot;-&quot;で分割
  }
  if ($pattern2) {
    $dataArray = explode(&quot;/&quot;, $postDate); //指定文字&quot;/&quot;で分割
  }
  if ($pattern1 || $pattern2) { //正しい日付形式だったとき
    $theYear = $dataArray[0];
    $theMonth = $dataArray[1];
    $theDay = $dataArray[2];
    $isDate = checkdate($theMonth, $theDay, $theYear);
    if ($isDate) { //日付のオブジェクトを作る
      $dateObj = new DateTime($postDate);
    } else {
      $error[] = &quot;日付として正しくありません。&quot;;
    }
  } else { //正しい日付形式でないときの表示例
    $today = new DateTime();
    $today1 = $today-&gt;format(&quot;Y-n-j&quot;);
    $today2 = $today-&gt;format(&quot;Y/n/j&quot;);
    $error[] = &quot;日付は次のどちらかの形式で入力してください。&lt;br&gt;{$today1}または{$today2}&quot;;
    $isDate = false;
  }
} else {
  $isDate = false;
  $postDate = &quot;&quot;;
}
?&gt;

&lt;!-- 入力フォーム --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;&lt;span&gt;日付を選ぶ：&lt;/span&gt;
      &lt;input type=&quot;date&quot; name=&quot;theDate&quot; value=&lt;?php echo &quot;{$postDate}&quot; ?&gt;&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
if ($isDate) { //正しい日付であれば表示する
  $date = $dateObj-&gt;format(&quot;Y年m月d日&quot;);
  $w = (int)$dateObj-&gt;format(&quot;w&quot;);
  $week = [&quot;日&quot;, &quot;月&quot;, &quot;火&quot;, &quot;水&quot;, &quot;木&quot;, &quot;金&quot;, &quot;土&quot;];
  $youbi = $week[$w];
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;{$date}は、{$youbi}曜日です。&quot;;
}
?&gt;

&lt;?php
if (count($error) &gt; 0) {
  echo &quot;&lt;HR&gt;&quot;;
  echo &#039;&lt;span class = &quot;error&quot;&gt;&#039;, implode(&quot;&lt;br&gt;&quot;, $error), &#039;&lt;/span&gt;&#039;;
}
?&gt;
</code></pre>
';

$pullDate = '<pre><code class="prettyprint">&lt;?php
//日付の初期値
$theYear2 = date(&#039;Y&#039;);
$theMonth2 = date(&#039;n&#039;);
$theDay2 = date(&#039;j&#039;);
$error = [];
if (isset($_POST[&quot;year&quot;]) &amp;&amp; isset($_POST[&quot;month&quot;]) &amp;&amp; isset($_POST[&quot;day&quot;])) {
  $theYear2 = $_POST[&quot;year&quot;]; //POSTされた年月日で書き換える
  $theMonth2 = $_POST[&quot;month&quot;];
  $theDay2 = $_POST[&quot;day&quot;];
  //値が日付として正しいかチェック
  $isDate2 = checkdate($theMonth2, $theDay2, $theYear2);
  if (!$isDate2) {
    $error[] = &quot;日付として正しくありません&quot;;
  } else { //日付オブジェクト作成
    $dateString = $theYear2 . &quot;-&quot; . $theMonth2 . &quot;-&quot; . $theDay2;
    $dateObj2 = new DateTime($dateString);
  }
} else {
  $isDate2 = false;
}
?&gt;

&lt;?php
//今年前後15年のプルダウンメニュー
function yearOption()
{
  global $theYear2;
  $thisYear = date(&#039;Y&#039;);
  $startYear = $thisYear - 15;
  $endYear = $thisYear + 15;
  echo &#039;&lt;select name = &quot;year&quot;&gt;&#039;, &#039;\n&#039;;
  for ($i = $startYear; $i &lt;= $endYear; $i++) {
    if ($i == $theYear2) {
      echo &quot;&lt;option value = {$i} selected&gt;{$i}&lt;/option&gt;&quot;, &quot;\n&quot;;
    } else {
      echo &quot;&lt;option value = {$i}&gt;{$i}&lt;/option&gt;&quot;, &quot;\n&quot;;
    }
  }
  echo &#039;&lt;/select&gt;&#039;;
}

//1~12月のプルダウンメニュー
function monthOption()
{
  global $theMonth2;
  echo &#039;&lt;select name = &quot;month&quot;&gt;&#039;;
  for ($i = 1; $i &lt;= 12; $i++) { //POSTされた月を選択する
    if ($i == $theMonth2) {
      echo &quot;&lt;option value = {$i} selected&gt;{$i}&lt;/option&gt;&quot;, &quot;\n&quot;;
    } else {
      echo &quot;&lt;option value = {$i}&gt;{$i}&lt;/option&gt;&quot;, &quot;\n&quot;;
    }
  }
  echo &#039;&lt;/select&gt;&#039;;
}

//1~31日のプルダウンメニュー
function dayOption()
{
  global $theDay2;
  echo &#039;&lt;select name = &quot;day&quot;&gt;&#039;;
  for ($i = 1; $i &lt;= 31; $i++) {
    if ($i == $theDay2) { //POSTされた日を選択
      echo &quot;&lt;option value = {$i} selected&gt;{$i}&lt;/option&gt;&quot;, &quot;\n&quot;;
    } else {
      echo &quot;&lt;option value = {$i}&gt;{$i}&lt;/option&gt;&quot;, &quot;\n&quot;;
    }
  }
  echo &#039;&lt;/select&gt;&#039;;
}
?&gt;

&lt;!-- 年月日のプルダウンメニュー --&gt;
&lt;form method=&quot;POST&quot; action=&quot;&lt;?php echo es($_SERVER[&#039;PHP_SELF&#039;]); ?&gt;&quot;&gt;
  &lt;ul class=&quot;nolist&quot;&gt;
    &lt;li&gt;
      &lt;?php yearOption(); ?&gt;年
      &lt;?php monthOption(); ?&gt;月
      &lt;?php dayOption(); ?&gt;日
    &lt;/li&gt;
    &lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;送信する&quot;&gt;&lt;/li&gt;
  &lt;/ul&gt;
&lt;/form&gt;

&lt;?php
if ($isDate2) {
  $date2 = $dateObj2-&gt;format(&quot;Y年m月d日&quot;);
  $w = (int)$dateObj2-&gt;format(&quot;w&quot;);
  $week = [&quot;日&quot;, &quot;月&quot;, &quot;火&quot;, &quot;水&quot;, &quot;木&quot;, &quot;金&quot;, &quot;土&quot;];
  $youbi = $week[$w];
  echo &quot;&lt;HR&gt;&quot;;
  echo &quot;{$date2}は、{$youbi}曜日です。&quot;;
}
?&gt;

&lt;?php
if (count($error) &gt; 0) {
  echo &quot;&lt;HR&gt;&quot;;
  echo &#039;&lt;span class = &quot;error&quot;&gt;&#039;, implode(&quot;&lt;br&gt;&quot;, $error), &#039;&lt;/span&gt;&#039;;
}
?&gt;
</code></pre>';

$seForm1 = '<pre><code class="prettyprint">&lt;form method=&quot;POST&quot; action=&quot;confirm.php&quot;&gt;
&lt;li&gt;&lt;label&gt;　　　　名前：
    &lt;input type=&quot;text&quot; name=&quot;name&quot; placeholder=&quot;ニックネーム可&quot; ;&gt;
  &lt;/label&gt;&lt;/li&gt;
&lt;li&gt;&lt;label&gt;好きな食べ物：
    &lt;input type=&quot;text&quot; name=&quot;food&quot; ;&gt;
  &lt;/label&gt;&lt;/li&gt;
&lt;li&gt;&lt;input type=&quot;submit&quot; value=&quot;確認する&quot;&gt;&lt;/li&gt;
&lt;/form&gt;</code></pre>';


$confirm = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);
session_start();
?&gt;

&lt;?php
if (!checkEn($_POST)) { //文字エンコードの検証
  $encoding = mb_internal_encoding(); //PHPが使うエンコードを調べる
  $err = &quot;Encoding Error! The espected encoding is&quot; . $encoding;
  exit($err); //エラーメッセージを出してコードのキャンセルする
}
?&gt;

&lt;?php
//POSTされた値をセッション変数に受け渡す
if (isset($_POST[&#039;name&#039;])) {
  $_SESSION[&#039;name&#039;] = $_POST[&#039;name&#039;];
}
if (isset($_POST[&#039;food&#039;])) {
  $_SESSION[&#039;food&#039;] = $_POST[&#039;food&#039;];
}
$error = [];
if (empty($_SESSION[&#039;name&#039;])) { //未設定の時エラー
  $error[] = &quot;名前を入力してください&quot;;
} else {
  $name = trim($_SESSION[&#039;name&#039;]); //名前を取り出す
}
if (empty($_SESSION[&#039;food&#039;])) { //未設定の時エラー
  $error[] = &quot;好きな食べ物を入力してください&quot;;
} else {
  $food = trim($_SESSION[&#039;food&#039;]); //名前を取り出す
}
?&gt;

&lt;!doctype html&gt;
&lt;html lang=&quot;ja&quot;&gt;

&lt;head&gt;&lt;/head&gt;

&lt;body&gt;
  &lt;header&gt;&lt;/header&gt;
  &lt;div class=&quot;main-wrapper&quot;&gt;
    &lt;h2&gt;セッション確認ページ&lt;/h2&gt;
    &lt;form&gt;
      &lt;?php if (count($error) &gt; 0) { ?&gt;
        &lt;!-- エラーがあったとき --&gt;
        &lt;span class=&quot;error&quot;&gt;&lt;?php echo implode(&#039;&lt;br&gt;&#039;, $error); ?&gt;&lt;/span&gt;&lt;br&gt;
        &lt;span&gt;
          &lt;input type=&quot;button&quot; value=&quot;戻る&quot; onclick=&quot;location.href=&#039;sessionForm1.php&#039;&quot;&gt;
        &lt;/span&gt;
      &lt;?php } else { ?&gt;
        &lt;!-- エラーがなかったとき --&gt;
        &lt;span&gt;
          　　　　名前：&lt;?php echo es($name); ?&gt;&lt;br&gt;
          好きな食べ物：&lt;?php echo es($food); ?&gt;&lt;br&gt;
          &lt;input type=&quot;button&quot; value=&quot;戻る&quot; onclick=&quot;location.href=&#039;sessionForm1.php&#039;&quot;&gt;
          &lt;input type=&quot;button&quot; value=&quot;送信する&quot; onclick=&quot;location.href=&#039;thanks.php&#039;&quot;&gt;
        &lt;/span&gt;
      &lt;?php } ?&gt;
    &lt;/form&gt;
  &lt;/div&gt;&lt;!-- /.main-wrapper --&gt;
&lt;/body&gt;

&lt;/html&gt;</code></pre>';

$thanks = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);
session_start();
$error = [];
//セッションのチェック
if (!empty($_SESSION[&#039;name&#039;]) &amp;&amp; !empty($_SESSION[&#039;food&#039;])) {
  $name = $_SESSION[&#039;name&#039;];
  $food = $_SESSION[&#039;food&#039;];
} else {
  $error[] = &quot;セッションエラーです&quot;;
}

killSession();
?&gt;

&lt;?php
function killSession()
{
  $_SESSION = []; //セッション変数の値を空にする
  //セッションクッキーを破棄
  if (isset($_COOKIE[session_name()])) {
    $params = session_get_cookie_params();
    setcookie(session_name(), &quot;&quot;, time() - 36000, $params[&#039;path&#039;]);
  }
  session_destroy(); //セッションを破棄
}
?&gt;

&lt;!doctype html&gt;
&lt;html lang=&quot;ja&quot;&gt;

&lt;head&gt;&lt;/head&gt;

&lt;body&gt;
  &lt;header&gt;&lt;/header&gt;
  &lt;div class=&quot;main-wrapper&quot;&gt;
    &lt;h2&gt;セッション完了ページ&lt;/h2&gt;
    &lt;?php if (count($error) &gt; 0) { ?&gt;
      &lt;!-- エラーがあったとき --&gt;
      &lt;span class=&quot;error&quot;&gt;&lt;?php echo implode(&#039;&lt;br&gt;&#039;, $error); ?&gt;&lt;/span&gt;&lt;br&gt;
      &lt;a href=&quot;sessionForm1.php&quot;&gt;最初のページに戻る&lt;/a&gt;
    &lt;?php } else { ?&gt;
      &lt;!-- エラーがなかったとき --&gt;
      &lt;span&gt;
        次のように受付しました。ありがとうございました。
        &lt;HR&gt;
        &lt;span&gt;
          　　　　名前：&lt;?php echo es($name); ?&gt;&lt;br&gt;
          好きな食べ物：&lt;?php echo es($food); ?&gt;&lt;br&gt;
          &lt;a href=&quot;sessionForm1.php&quot;&gt;最初のページに戻る&lt;/a&gt;
        &lt;/span&gt;
      &lt;/span&gt;
    &lt;?php } ?&gt;

  &lt;/div&gt;&lt;!-- /.main-wrapper --&gt;
  &lt;footer&gt;&lt;/footer&gt;
&lt;/body&gt;

&lt;/html&gt;</code></pre>';

$visit = '<pre><code class="prettyprint">&lt;?php
require_once(&quot;es.php&quot;);
//クッキーの値を取り出す
date_default_timezone_set(&#039;Asia/Tokyo&#039;);
if (isset($_COOKIE[&quot;visitedLog&quot;])) {
  $logdata = $_COOKIE[&quot;visitedLog&quot;];
  $counter = $logdata[&quot;counter&quot;];
  $time = $logdata[&quot;time&quot;];
  $lasttime = date(&quot;Y年n月j日Ag時i分&quot;, $time);
} else {
  $counter = 0;
  $lasttime = &quot;直近で初めての訪問&quot;;
}
//訪問ログをクッキーに保存(30日有効)
$result1 = setcookie(&#039;visitedLog[counter]&#039;, ++$counter, time() + 60 * 60 * 24 * 30);
$result2 = setcookie(&#039;visitedLog[time]&#039;, time(), time() + 60 * 60 * 24 * 30);
$result = ($result1 &amp;&amp; $result2);
?&gt;

&lt;!doctype html&gt;
&lt;html&gt;
・・・・・・・↓
・・・・・・・↓
&lt;?php
if ($result) {
  echo &quot;ページ訪問は&quot;, es($counter), &quot;回目です&quot;, &quot;&lt;br&gt;&quot;;
  echo &quot;前回の訪問：&quot;, es($lasttime), &quot;&lt;HR&gt;&quot;;
  echo &#039;(&lt;a href=&quot;resetLog.php&quot;&gt;リセットする&lt;/a&gt;)&#039;;
} else {
  echo &#039;&lt;span class=&quot;error&quot;&gt;クッキーが利用できませんでした&lt;/span&gt;&#039;;
}
?&gt;</code></pre>';

$reset = '<pre><code class="prettyprint">&lt;?php
$result1 = setcookie(&#039;visitedLog[counter]&#039;, &quot;&quot;, time()-3600);//有効期限を過去へ
$result2 = setcookie(&#039;visitedLog[time]&#039;, &quot;&quot;, time()-3600);
$result = ($result1 &amp;&amp; $result2);
?&gt;

&lt;!doctype html&gt;
&lt;html&gt;
・・・・・・・↓
・・・・・・・↓
&lt;?php
  if($result){
    echo &quot;訪問ログのクッキーを破棄しました&quot;,&quot;&lt;hr&gt;&quot;;
    echo &#039;&lt;a href=&quot;visitedLog.php&quot;&gt;訪問カウンターページに戻る&lt;/a&gt;&#039;;
  } else {
    echo &#039;&lt;span class=&quot;error&quot;&gt;クッキーの破棄でエラー&lt;/span&gt;&#039;;
  }
?&gt;
</code></pre>';
?>

