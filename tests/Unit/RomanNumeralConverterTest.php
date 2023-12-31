<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RomanNumeralConverterTest extends TestCase
{
    private YourConverterImplementation $converter;

    protected function setUp(): void
    {
        parent::setUp();

        // TODO: update with your converter implementation
        $this->converter = new YourConverterImplementation();
    }

    public function test_converts_integers_to_roman_numerals(): void
    {
        // Test the basic conversions
        $toTest = [
            'I' => 1,
            'IV' => 4,
            'V' => 5,
            'IX' => 9,
            'X' => 10,
            'C' => 100,
            'XL' => 40,
            'L' => 50,
            'XC' => 90,
            'CD' => 400,
            'D' => 500,
            'CM' => 900,
            'M' => 1000,
        ];

        foreach ($toTest as $returnValue => $integer) {
            $this->assertEquals($returnValue, $this->converter->convertInteger($integer));
        }

        // Test more unique integers
        $this->assertEquals('MMMCMXCIX', $this->converter->convertInteger(3999));
        $this->assertEquals('MMXVI', $this->converter->convertInteger(2016));
        $this->assertEquals('MMXVIII', $this->converter->convertInteger(2018));
    }
}
