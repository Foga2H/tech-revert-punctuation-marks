<?php

/**
 * Class RevertPunctuationMark
 */
class RevertPunctuationMark
{
    /**
     * @var array
     */
    private static $marks = ['!', '?', '.', ','];

    /**
     * @param string $text
     * @return string
     */
    public static function revert(string $text): string
    {
        $newString = '';
        $length = mb_strlen($text, 'UTF-8');
        $marks = [];

        for ($i = 0; $i < $length; $i++) {
            $char = mb_substr($text, $i, 1, 'UTF-8');

            if (in_array($char, self::$marks, true)) {
                $marks[] = $char;
                $char = '%s';
            }

            $newString .= $char;
        }

        $text = vsprintf($newString, array_reverse($marks));

        return $text;
    }
}