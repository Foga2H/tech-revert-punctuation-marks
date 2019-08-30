<?php

use PHPUnit\Framework\TestCase;

/**
 * Class OutputTest
 */
class OutputTest extends TestCase
{
    public function testOutputForSimpleString()
    {
        $text = 'Привет! Как твои дела?';

        $text = RevertPunctuationMark::revert($text);

        $this->assertEquals('Привет? Как твои дела!', $text);
    }

    public function testOutputForLargeString()
    {
        $text = 'Что же можно понимать под открытостью текста?
        Очевидно, все названные оттенки значений в совокупности создают образ открытого текста.
        Открытость как неизменный признак любой живой системы представляет собой возможность взаимодействия
        с другими живыми системами (текстами) и формирование вследствие этого новых литературных традиций.
        Язык как некий отвлеченный, абстрактный конгломерат, не нуждается в том, чтобы быть построенным в некую систему.
        Он существует независимо от нашего желания и реализуется в тексте (речи).';

        $text = RevertPunctuationMark::revert($text);

        $this->assertEquals('Что же можно понимать под открытостью текста.
        Очевидно. все названные оттенки значений в совокупности создают образ открытого текста,
        Открытость как неизменный признак любой живой системы представляет собой возможность взаимодействия
        с другими живыми системами (текстами) и формирование вследствие этого новых литературных традиций,
        Язык как некий отвлеченный, абстрактный конгломерат. не нуждается в том. чтобы быть построенным в некую систему,
        Он существует независимо от нашего желания и реализуется в тексте (речи)?', $text);
    }
}