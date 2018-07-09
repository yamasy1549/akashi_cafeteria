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
  }
}
