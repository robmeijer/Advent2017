<?php

namespace Advent2017\Tests\Day1;

use Advent2017\Day1\Captcha;
use PHPUnit\Framework\TestCase;

class CaptchaTest extends TestCase
{
    public function testSumNext()
    {
        $captcha = new Captcha();

        $this->assertEquals(3, $captcha->sumNext(1122));
        $this->assertEquals(4, $captcha->sumNext(1111));
        $this->assertEquals(9, $captcha->sumNext(91212129));
    }

    public function testSumHalf()
    {
        $captcha = new Captcha();

        $this->assertEquals(6, $captcha->sumHalf(1212));
        $this->assertEquals(0, $captcha->sumHalf(1221));
        $this->assertEquals(4, $captcha->sumHalf(123425));
        $this->assertEquals(12, $captcha->sumHalf(123123));
        $this->assertEquals(4, $captcha->sumHalf(12131415));
    }
}
