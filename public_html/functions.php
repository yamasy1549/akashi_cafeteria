<?php
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function validate(...$params) {
  if (in_array(false, array_map('boolval', $params))) {
    echo "error";
  } else {
    return true;
  }
}

function ispresent($str) {
  return preg_match("/^[\S]+$/", $str);
}

function isid($str) {
  return preg_match("/^[1-9][0-9]?$/", $str);
}

function isnumber($str) {
  return preg_match("/^[0-9]+$/", $str);
}

function isnumber_data($str) {
  return preg_match("/^[1-5]+$/", $str);
}

function isdate($str) {
  return preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $str);
}

function isbool($str) {
  return preg_match("/^[0-1]$/", $str);
}
