<?php

namespace Advent2017\Tests\Day4;

use Advent2017\Day4\PassPhrase;
use PHPUnit\Framework\TestCase;

class PassPhraseTest extends TestCase
{
    /**
     * @var PassPhrase
     */
    private $passPhrase;

    protected function setUp()
    {
        $this->passPhrase = new PassPhrase();
    }

    public function testValidPhraseIsValid()
    {
        $this->assertTrue($this->passPhrase->isValid('aa bb cc dd ee'));
        $this->assertTrue($this->passPhrase->isValid('aa bb cc dd aaa'));
    }

    public function testInvalidPhraseIsInvalid()
    {
        $this->assertFalse($this->passPhrase->isValid('aa bb cc dd aa'));
    }

    public function testStrictValidPhraseIsStrictValid()
    {
        $this->assertTrue($this->passPhrase->isStrictValid('abcde fghij'));
        $this->assertTrue($this->passPhrase->isStrictValid('a ab abc abd abf abj'));
        $this->assertTrue($this->passPhrase->isStrictValid('iiii oiii ooii oooi oooo'));
    }

    public function testStrictInvalidPhraseIsStrictInvalid()
    {
        $this->assertFalse($this->passPhrase->isStrictValid('abcde xyz ecdab'));
        $this->assertFalse($this->passPhrase->isStrictValid('oiii ioii iioi iiio'));
    }
}
