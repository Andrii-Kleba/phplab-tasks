<?php
/**
 * The $input variable contains an array of digits
 * Return an array which will contain the same digits but repetitive by its value
 * without changing the order.
 * Example: [1,3,2] => [1,3,3,3,2,2]
 *
 * @param array $input
 * @return array
 */
function repeatArrayValues(array $input): array
{
    $arr = [];
    foreach ($input as $n) {
        $i = 0;
        while ($i < $n) {
            $arr[] += $n;
            $i++;
        }
    }

    return $arr;
}

/**
 * The $input variable contains an array of digits
 * Return the lowest unique value or 0 if there is no unique values or array is empty.
 * Example: [1, 2, 3, 2, 1, 5, 6] => 3
 *
 * @param array $input
 * @return int
 */
function getUniqueValue(array $input): int
{
    $arrayCopies = array_unique(array_diff_assoc($input, array_unique($input)));
    $arrayWithoutCopies = array_diff($input, $arrayCopies);
    if (empty($input) or empty($arrayWithoutCopies)) {
        $result = 0;
    } else {
        $result = min($arrayWithoutCopies);
    }
    return $result;
}

/**
 * The $input variable contains an array of arrays
 * Each sub array has keys: name (contains strings), tags (contains array of strings)
 * Return the list of names grouped by tags
 * !!! The 'names' in returned array must be sorted ascending.
 *
 * Example:
 * [
 *  ['name' => 'potato', 'tags' => ['vegetable', 'yellow']],
 *  ['name' => 'apple', 'tags' => ['fruit', 'green']],
 *  ['name' => 'orange', 'tags' => ['fruit', 'yellow']],
 * ]
 *
 * Should be transformed into:
 * [
 *  'fruit' => ['apple', 'orange'],
 *  'green' => ['apple'],
 *  'vegetable' => ['potato'],
 *  'yellow' => ['orange', 'potato'],
 * ]
 *
 * @param array $input
 * @return array
 */
function groupByTag(array $input)
{
    $arr = [];
    foreach ($input as $key) {
        $i = 0;
        while ($i < count($key['tags'])) {
            $arr[] .= $key['tags'][$i];
            $i++;
        }
    }
    $uniqArray = array_unique($arr);
    sort($uniqArray);
    print_r($uniqArray);

}