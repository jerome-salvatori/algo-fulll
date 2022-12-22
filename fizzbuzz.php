<?php

require 'NumberModuloTransformer.php';

function fizzbuzz(int $limit): array {
    if ($limit < 1) {
        throw new InvalidArgumentException("N must be an integer and superior or equal to 1");
    }

    $result = [];
    $transformer = new NumberModuloTransformer([
        3 => "Fizz",
        5 => "Buzz"
    ]);

    for ($i = 1; $i <= $limit; $i++) {
        $html = '<p class="[#class#]">[#string#]</p>';
        $transformedIntArray = $transformer->transform($i);
        $result[] = str_replace(["[#class#]", "[#string#]"], [$transformedIntArray["type"], $transformedIntArray["string"]], $html);
    }

    return $result;
}