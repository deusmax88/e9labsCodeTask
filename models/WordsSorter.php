<?php

namespace app\models;


class WordsSorter
{
    private $words = [];

    public function __construct()
    {
    }

    public function addWord($word)
    {
        isset($this->words[$word]) ? $this->words[$word]++ : $this->words[$word] = 1;
    }

    public function sortByFrequency()
    {
        arsort($this->words, SORT_NUMERIC);
    }

    public function getWords()
    {
        return $this->words;
    }
}