<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\Api\HotPepperApi;

class GetShop
{
    /**
     * HTTPクライアントのインスタンスを格納
     */
    private $client;

    /**
     * HOTPEPPER APIのURL
     */
    private $url;
    
    /**
     * HOTPEPPER APIの認証キー
     */
    private $key;

    public function __construct(HotPepperApi $client) {
        $this->client = $client;
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
    public function getBookmarks(array $shopid) {
        // 配列として取得した店舗IDを,で結合 
        $shopIdList = implode(',',$shopid);

        // クエリパラメータにするために連想配列化
        $param = [
            'body' => [
                'key' => $this->key,
                'id'  => $shopIdList
            ]
        ];

        $this->client->requestGet($this->url, $param);
        $response = $this->client->getResponseBody();
        $object = simplexml_load_string($response);
        return $object;
    }
}
