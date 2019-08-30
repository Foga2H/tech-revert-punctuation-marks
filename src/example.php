<?php

include __DIR__ . '/RevertPunctuationMark.php';

$result = RevertPunctuationMark::revert('Привет! Как твои дела?');

// Will return: Привет? Как твои дела!
echo $result . PHP_EOL;