<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input)
    {
        $this->expectException(InvalidArgumentException::class);

        sayHelloArgumentWrapper($input);
    }

    public function positiveDataProvider()
    {
        return [
            [null],
            [[1 => '23', 2 => '44']]
        ];
    }
}