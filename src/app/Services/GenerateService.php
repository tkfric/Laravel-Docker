<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\JsonModel;

class GenerateService
{
    protected $model;

    public function __construct(JsonModel $model)
    {
        $this->model = $model;
    }
    /**
     * @param array $request
     * @return string
     */
    public function execute(array $request): string
    {
        // リクエストからそれぞれのvalue取得　
        $time = $request['time'];
        $place = $request['place'];
        $person = $request['person'];
        // jsonデータ取得
        $jsonData = $this->model->getAll();

        $string =
            'おはようございます。ミサワです。' . PHP_EOL .
            $place . 'で' . $jsonData['do'] . '、' . PHP_EOL .
            $person . 'が' . PHP_EOL .
            $jsonData['reason'] . 'ため' . '、' .
            '本日は' . $time . '遅れます。';

        return $string;
    }
}
