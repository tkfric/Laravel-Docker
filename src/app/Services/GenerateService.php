<?php
declare(strict_types=1);

namespace App\Services;

class GenerateService
{
    /**
     * @param array $request
     * @return string
     */
    public function execute(array $request): string
    {
        // リクエストからそれぞれのvalue取得　
        $getRequestTime = $request['time'];
        $getRequestPlace = $request['place'];
        $getRequestPerson = $request['person'];
        // jsonデータ取得
        $jsonData = $this->getAll();

        // jsonデータからそれぞれのvalue取得
        $getPlaceSentence = $jsonData['reason'],
        $getDoSentence = $jsonData['do'];

        $joinRequestAndData =
            'おはようございます。ミサワです。' . PHP_EOL
            {{ $getRequestPlace }} . 'で' . {{ $getDoSentence }} . '、' . PHP_EOL
            {{ $getRequestPerson }} . 'が' . PHP_EOL .
            {{ $getPlaceSentence }} . 'ため' . '、' .
            '本日は'{{ $getRequestTime }} . '遅れます。';

        return $joinRequestAndData;
    }
}