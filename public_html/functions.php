<?php

/**
 * XSS対策用関数
 *
 * @param string $str XSSの恐れがある文字列
 * @return string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function redirect_if($error_query, $redirect_url) {
  if(strlen($error_query) > 0) {
    header('Location: '.$redirect_url.$error_query);
    exit();
  }
}

function validate($params, $redirect_url, $validates) {
  $error_query = '';

  foreach($validates as $key => $message) {
    switch($message) {
    case '必須':
      if(!ispresent($params[$key])) {
        $error_query = $error_query.'&error['.$key.']='.$message;
      }
      break;
    case '無効な値':
      if(!isid($params[$key])) {
        $error_query = $error_query.'&error['.$key.']='.$message;
      }
      break;
    case '無効な数字':
      if(!isnumber($params[$key])) {
        $error_query = $error_query.'&error['.$key.']='.$message;
      }
      break;
    case '範囲は1~5':
      if(!isnumber_data($params[$key])) {
        $error_query = $error_query.'&error['.$key.']='.$message;
      }
      break;
    case '無効な年月日の形式':
      if(!isdate($params[$key])) {
        $error_query = $error_query.'&error['.$key.']='.$message;
      }
      break;
    case '無効な選択':
      if(!isbool($params[$key])) {
        $error_query = $error_query.'&error['.$key.']='.$message;
      }
      break;
    }
  }

  redirect_if($error_query, $redirect_url);
}

/**
 * 空文字でないこと（存在）チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function ispresent($str)
{
    return preg_match("/^[\S]+$/", $str);
}


/**
 * IDチェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isid($str)
{
    return preg_match("/^[1-9][0-9]?$/", $str);
}


/**
 * 数字チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isnumber($str)
{
    return preg_match("/^[0-9]+$/", $str);
}


/**
 * 評価値チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isnumber_data($str)
{
    return preg_match("/^[1-5]+$/", $str);
}


/**
 * 年月日チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isdate($str)
{
    return preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $str);
}


/**
 * 真偽値チェック
 *
 * @param string $str チェックしたい文字列
 * @return boolean
 */
function isbool($str)
{
    return preg_match("/^[0-1]$/", $str);
}
