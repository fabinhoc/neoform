<?php

namespace App\Helpers;

class CodeGenerator
{
    public static function generateEformCode($requestManagerName, $totalForm): string
    {
        $intialsLetters = self::getInitials($requestManagerName);
        $preffix = 'FRM0';
        $codeNumber = self::addLeadingZero($totalForm + 1);

        return $intialsLetters . $preffix . $codeNumber;
    }

    private static function getInitials(string $text): string
    {
        return strtoupper(preg_replace('/\b(\w)\w*/u', '$1', $text));
    }

    private static function addLeadingZero(int $number): string
    {
        return sprintf('%02d', $number);
    }


}
