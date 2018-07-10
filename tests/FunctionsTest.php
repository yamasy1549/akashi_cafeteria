<?php

require_once './public_html/functions.php';

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase {

  /**
   * ispresent
   */
  public function test_ispresent() {
    // 文字列を与えるとtrueを返すのを確認
    $this->assertEquals(true, ispresent("西住みほ"));
    // 空文字列を与えるとfalseを返すのを確認
    $this->assertEquals(false, ispresent(""));
  }

  /**
   * isid
   */
  public function test_isid() {
    //正常系
    $this->assertEquals(true, isid("36"));
    $this->assertEquals(true, isid("1"));
    //異常系
    $this->assertEquals(false, isid("02"));
  }

  public function test_isnumber_data() {
    //正常系
    $this->assertEquals(true, isnumber_data("12312"));
    //異常系
    $this->assertEquals(false, isnumber_data("あ"));
  }

  public function test_isdate() {
    //正常系
    $this->assertEquals(true, isdate("2018-07-10"));
    $this->assertEquals(true, isdate("9999-99-99"));
    //異常系
    $this->assertEquals(false, isdate("1231221212121-121213424143545345-4534534534"));
  }

  public function test_isbool() {
    //正常系
    $this->assertEquals(true, isbool("0"));
    $this->assertEquals(true, isbool("1"));
    //異常系
    $this->assertEquals(false, isbool("2"));
  }
}
