<?php


use PHPUnit\Framework\TestCase;

class CountArgumentsWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive(...$input)
    {
        $this->expectException(InvalidArgumentException::class);

        countArgumentsWrapper(...$input);
    }

    public function positiveDataProvider()
    {
        return [
            [1, 2, 3, 4],
            ['test', 44, 23],
            [true, '234'],
            ['test', 'test1', 'test2', 3]
        ];
    }
}