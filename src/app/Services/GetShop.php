<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Api\HotPepperApi;

class GetShop
{
    private $client;

    private $url;

    private $key;

    public function __construct() {
        $this->client = new HotPepperApi;
        $this->url = env('HOTPEPPER_REQUEST_URI');
        $this->key = env('HOTPEPPER_API_KEY');
    }

    /**
     * 現在位置の緯度と経度から指定した距離内にある店舗情報を取得します
     * @param integer $lat 緯度
     * @param integer $lng 軽度
     * @return object 店舗情報
     */
    public function searchDistance(int $lat, int $lng){
        // リクエストURIとAPIのキーを環境変数から取得

        // クエリパラメータにするために連想配列化
        $param = [
            'body' => [
                'key' => $this->key,
                'lat' => $lat,
                'lng' => $lng
               ]
           ];

        $this->client->requestGet($this->url, $param);
        $response = $client->getResponseBody();
        $object = simplexml_load_string($response);

        return $object;
    }


    /**
     * ブックマーク登録した店舗一覧を取得する
     * @param array $shopList ブックマーク店舗一覧
     */
    public function getBookmarks(string $shopid) {

        $param = [
            'body' => [
                'key' => $this->key,
                'id'  => $shopid
            ]
        ];

        $this->client->requestGet($this->url, $param);
        $response = $this->client->getResponseBody();
        $object = simplexml_load_string($response);

        return $object;
    }



}
