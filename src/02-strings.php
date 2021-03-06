<?php
/**
 * The $input variable contains text in snake case (i.e. hello_world or this_is_home_task)
 * Transform it into camel cased string and return (i.e. helloWorld or thisIsHomeTask)
 * @see http://xahlee.info/comp/camelCase_vs_snake_case.html
 *
 * @param string $input
 * @return string
 */
function snakeCaseToCamelCase(string $input): string
{
    $arraysString = explode("_", $input);
    $camelCaseStr = $arraysString[0];
    $i = 1;
    while ($i < count($arraysString)) {
        $camelCaseStr .= ucwords($arraysString[$i]);
        $i++;
    }
    return $camelCaseStr;
}

/**
 * The $input variable contains multibyte text like 'ФЫВА олдж'
 * Mirror each word individually and return transformed text (i.e. 'АВЫФ ждло')
 * !!! do not change words order
 *
 * @param string $input
 * @return string
 */
function mirrorMultibyteString(string $input): string
{
    $charRev = "";
    $wordRev = "";
    for ($i = mb_strlen($input); $i >= 0; $i--) {
        $charRev .= mb_substr($input, $i, 1);
    }

    $arrStr = explode(" ", $charRev);
    for ($j = count($arrStr) - 1; $j >= 0; $j--) {
        $wordRev .= $arrStr[$j] . " ";
    }

    return rtrim($wordRev);
}

/**
 * My friend wants a new band name for her band.
 * She likes bands that use the formula: 'The' + a noun with first letter capitalized.
 * However, when a noun STARTS and ENDS with the same letter,
 * she likes to repeat the noun twice and connect them together with the first and last letter,
 * combined into one word like so (WITHOUT a 'The' in front):
 * dolphin -> The Dolphin
 * alaska -> Alaskalaska
 * europe -> Europeurope
 * Implement this logic.
 *
 * @param string $noun
 * @return string
 */

function getBrandName(string $noun)
{
    $charArrBrandName = str_split($noun);
    $resultBrandName = "The ";
    if (strtolower($charArrBrandName[0]) != strtolower(end($charArrBrandName))) {
        $res = implode($charArrBrandName);
        $resultBrandName .= ucfirst($res);
    } else {
        $res = implode($charArrBrandName);
        $firstCharUpper = ucfirst($res);
        $splitStr = strstr($res, $charArrBrandName[1]);
        $resultBrandName = $firstCharUpper . $splitStr;
    }

    return $resultBrandName;
}
