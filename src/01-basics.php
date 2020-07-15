<?php
/**
 * The $minute variable contains a number from 0 to 59 (i.e. 10 or 25 or 60 etc).
 * Determine in which quarter of an hour the number falls.
 * Return one of the values: "first", "second", "third" and "fourth".
 * Throw InvalidArgumentException if $minute is negative of greater then 60.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param int $minute
 * @return string
 * @throws InvalidArgumentException
 */
function getMinuteQuarter(int $minute)
{
    if ($minute < 0 || $minute >= 61) {
        throw new InvalidArgumentException("This is not correctly $minute.\nWe expected number range from 0 to 60");
    }
    switch ($minute) {
        case $minute >= 0 && $minute <= 15;
            return 'first';
            break;
        case $minute >= 16 && $minute <= 30;
            return 'second';
            break;
        case $minute >= 31 && $minute <= 45;
            return 'third';
            break;
        case $minute >= 46 && $minute <= 60;
            return 'fourth';
            break;
    }
}

/**
 * The $year variable contains a year (i.e. 1995 or 2020 etc).
 * Return true if the year is Leap or false otherwise.
 * Throw InvalidArgumentException if $year is lower then 1900.
 * @see https://en.wikipedia.org/wiki/Leap_year
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param int $year
 * @return boolean
 * @throws InvalidArgumentException
 */
function isLeapYear(int $year)
{
    if ($year < 1900) {
        throw new InvalidArgumentException("This year is not valid.\nWe expected more year than $year");
    }

    if ($year % 400 == 0 || $year % 4 == 0) {
        return true;
    } else {
        return false;
    }
}

/**
 * The $input variable contains a string of six digits (like '123456' or '385934').
 * Return true if the sum of the first three digits is equal with the sum of last three ones
 * (i.e. in first case 1+2+3 not equal with 4+5+6 - need to return false).
 * Throw InvalidArgumentException if $input contains more then 6 digits.
 * @see https://www.php.net/manual/en/class.invalidargumentexception.php
 *
 * @param string $input
 * @return boolean
 * @throws InvalidArgumentException
 */
function isSumEqual(string $input)
{
    if (strlen($input) !== 6) {
        throw new InvalidArgumentException("String $input  length more than 6 chars.\nWe expected 6 chars but not less");
    }
    $numbers = str_split($input);
    $firstDigits = array_slice($numbers, 0, 3);
    $secondDigits = array_slice($numbers, -3);
    if (array_sum($firstDigits) === array_sum($secondDigits)) {
        return true;
    } else {
        return false;
    }
}