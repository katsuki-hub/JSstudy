<?php
function es($data)
//xss 対策のための HTML エスケープ
{
  if (is_array($data)) { //$dataが配列の時
    return array_map(__METHOD__, $data); //値を1つずつ引数にして、再帰呼び出し
  } else {
    return htmlspecialchars($data, ENT_QUOTES, "UTF-8");
  }
}

//配列の文字エンコードのチェック
function checkEn(array $data)
{
  $result = true;
  foreach ($data as $key => $value) {
    if (is_array($value)) { //含まれている値が配列のとき文字列に連結
      $value = implode("", $value);
    }
    if (!mb_check_encoding($value)) { //文字コードが一致しないときfalce代入し繰り返しをブレイク
      $result = false;
      break;
    }
  }
  return $result;
}
