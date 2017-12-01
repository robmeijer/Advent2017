<?php

namespace Advent2017\Tests\Day1;

use Advent2017\Day1\Captcha;
use PHPUnit\Framework\TestCase;

class CaptchaTest extends TestCase
{
    public function testSum()
    {
        $captcha = new Captcha();

        $this->assertEquals(3, $captcha->sum(1122));
        $this->assertEquals(4, $captcha->sum(1111));
        $this->assertEquals(9, $captcha->sum(91212129));
    }
}
