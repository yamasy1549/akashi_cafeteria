<?php

/**
 * XSS対策用関数
 *
 * @param string $str XSSの恐れがある文字列
 * @return string
 */
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * バリデーションをまとめてチェックする関数
 *
 * @param boolean $params 検証したいバリデーション用関数（複数可能）
 */
function validate(...$params) {
  if (in_array(false, array_map('boolval', $params))) {
    echo "error";
  } else {
    return true;
  }
}

/**
 * 存在チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function ispresent($str) {
  return preg_match("/^[\S]+$/", $str);
}


/**
 * IDチェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isid($str) {
  return preg_match("/^[1-9][0-9]?$/", $str);
}


/**
 * 数字チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isnumber($str) {
  return preg_match("/^[0-9]+$/", $str);
}


/**
 * 評価値チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isnumber_data($str) {
  return preg_match("/^[1-5]+$/", $str);
}


/**
 * 年月日チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isdate($str) {
  return preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $str);
}


/**
 * 真偽値チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isbool($str) {
  return preg_match("/^[0-1]$/", $str);
}
