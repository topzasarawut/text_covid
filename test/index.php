<?php

$array1 = [1, 2, 4, 5, 6, 7];
$array2 = [1, 2, 3, 5, 8, 9];

$intersect = array_intersect($array1, $array2);
echo "Intersect:\n";
display_array($intersect);

$merge = array_merge($array1, $array2);
echo "Merge:\n";
display_array($merge);

$union = array_unique($merge);
echo "Union:\n";
display_array($union);

$difference = array_diff($array1, $array2);
echo "Difference:\n";
display_array($difference);

function display_array($array) {
    foreach ($array as $el) {
        echo "$el<br>, ";
    }
    echo "\n";
}

?>