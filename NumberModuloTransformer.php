<?php

class NumberModuloTransformer {
    private array $parameters;

    public function __construct(array $parameters) {
        $this->checkParams($parameters);
        $this->parameters = $parameters;
    }

    public function transform(int $numberToTransform): array {
        $resultString = "";
        $multiplesFound = 0;
        foreach ($this->parameters as $paramsNumber => $paramsString) {
            if ($numberToTransform % $paramsNumber === 0) {
                $resultString .= $paramsString;
                $multiplesFound++;
            }
        }
        
        $resultArray = [];
        
        if (empty ($resultString)) {
            $resultArray["type"] = "number";
            $resultString = strval($numberToTransform);
        } elseif ($multiplesFound > 1) {
            $resultArray["type"] = "multiples";
        } else {
            $resultArray["type"] = "single-multiple";
        }

        $resultArray["string"] = $resultString;

        return $resultArray;
    }

    private function checkParams(array $parameters): void {
        foreach ($parameters as $number => $string) {
            if (!is_int($number) || !is_string($string)) {
                throw new InvalidArgumentException("
                    Parameters given to numberModuloTransformer must be an associate array where key is an integer and value is a string
                ");
            }
        }
    }
}