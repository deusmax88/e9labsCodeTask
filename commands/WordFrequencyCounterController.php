<?php

namespace app\commands;

use app\models\WordsSorter;
use yii\console\Controller;

class WordFrequencyCounterController extends Controller
{

    public function actionIndex($inputFilePath, $outputFilePath)
    {
        $wordsSorter = new WordsSorter();

        $inputFileHandler = fopen($inputFilePath, 'r');
        while(!feof($inputFileHandler)) {
            $lineOfFile = fgets($inputFileHandler);
            $lineOfFile = rtrim($lineOfFile, "\r\n");
            $wordsArray = explode(" ", $lineOfFile);
            foreach($wordsArray as $word) {
                $wordsSorter->addWord($word);
            }

        }
        fclose($inputFileHandler);

        $wordsSorter->sortByFrequency();

        $outputFileHandler = fopen($outputFilePath, 'w');
        foreach($wordsSorter->getWords() as $word => $frequency) {
            $outFileLine = $word." - ".$frequency."\n";
            fputs($outputFileHandler, $outFileLine);
        }
        fclose($outputFileHandler);
    }
}