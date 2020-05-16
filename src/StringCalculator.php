<?php


namespace App;


use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected $delimiter = ",|\n";

    public function add(string $numbers)
    {

        if(!$numbers) {
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $numbers = $this->disallowNegatives($numbers)->ignoreGreaterThan1000($numbers);

        return array_sum($numbers);
    }

    /**
     * @param array $numbers
     * @return StringCalculator
     * @throws Exception
     */
    private function disallowNegatives(array $numbers): StringCalculator
    {
        foreach ($numbers as $number) {
            if ($number < 0)
                throw new Exception('Negative numbers are not allowed');
        }

        return $this;
    }

    protected function parseString(string $numbers)
    {
        $customDelimiter = "\/\/(.)\n";
        if (preg_match("/{$customDelimiter}/",$numbers,$matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0],'',$numbers);
        }

        return preg_split("/$this->delimiter/",$numbers);
    }

    /**
     * @param array $numbers
     * @return array|string
     */
    private function ignoreGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });
    }
}