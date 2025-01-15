<?php

namespace Pyz\Zed\RomanNumbers\Business\Converter;

class RomanNumbersConverter
{
    const array numbers = [
"I" => 1,
"V" => 5,
"X" => 10,
"L" => 50,
"C" => 100,
"D" => 500,
"M" => 1000,
];
    public function convert(string $romanNumbers): int
    {

        $romanNumbers = str_replace("IV","IIII",$romanNumbers);
        $romanNumbers = str_replace("IX","VIIII",$romanNumbers);
        $romanNumbers = str_replace("XL","XXXX",$romanNumbers);
        $romanNumbers = str_replace("XC","LXXXX",$romanNumbers);
        $romanNumbers = str_replace("CD","CCCC",$romanNumbers);
        $romanNumbers = str_replace("CM","DCCCC",$romanNumbers);
        $romanNumbers = str_replace("XD","CCCCLXXXX",$romanNumbers);

        $result = 0;
        $result += substr_count($romanNumbers, 'I');
        $result += substr_count($romanNumbers, 'V')*5;
        $result += substr_count($romanNumbers, 'X')*10;
        $result += substr_count($romanNumbers, 'L')*50;
        $result += substr_count($romanNumbers, 'C')*100;
        $result += substr_count($romanNumbers, 'D')*500;
        $result += substr_count($romanNumbers, 'M')*1000;
        return $result;
    }
}
