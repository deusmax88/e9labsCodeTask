<?php

namespace tests\models;


use app\models\WordsSorter;

class WordsSorterTest extends \Codeception\Test\Unit
{
    public function testSortByFrequency()
    {
        $words = ['test', 'test1', 'test2', 'test3', 'test2', 'test'];
        $wordsSorter = new WordsSorter();
        foreach($words as $word) {
            $wordsSorter->addWord($word);
        }

        $wordsSorter->sortByFrequency();

        $sortedWords = $wordsSorter->getWords();

        $this->assertEquals(2, $sortedWords['test']);
        $this->assertEquals( 1, $sortedWords['test1']);
        $this->assertEquals(2, $sortedWords['test2']);
        $this->assertEquals(1, $sortedWords['test3']);
    }
}