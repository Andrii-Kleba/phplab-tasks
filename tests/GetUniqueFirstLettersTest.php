<?php

use PHPUnit\Framework\TestCase;


class GetUniqueFirstLettersTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, getUniqueFirstLetters($input));
    }

    public function positiveDataProvider()
    {
        return [
            [[
                [
                    "name" => "Albuquerque Sunport International Airport",
                ],
                [
                    "name" => "Baltimore Washington Airport",
                ],
                [
                    "name" => "Charlotte Douglas International Airport",
                ],
                [
                    "name" => "Dallas Love Field",
                ],
                [
                    "name" => "Washington Ronald Reagan National Airport",
                ],
                [
                    "name" => "Newark Liberty International Airport",
                ],
            ]
                , ['A', 'B', 'C', 'D', 'N', 'W']
            ]
        ];
    }
}