<?php
namespace App\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\RequestOptions;

class HotPepperApi
{
    /**
     * GuzzleによるHTTPリクエストのタイムアウト(秒)
     */
    const CLIENT_REQUEST_TIMEOUT = 10;
    /**
     * Connectionのタイムアウト(秒)
     */
    const CONNECT_TIMEOUT = 30;
    /**
     * GuzzleのClientクラスのインスタンス
     */
    private $httpClient;
    /**
     * GuzzleClientでAPI実行した際のレスポンスヘッダ
     */
    private $responseHeader;
    /**
     * GuzzleClientでAPI実行した際のレスポンスボディ
     */
    private $responseBody;
    /**
     * GuzzleClientでAPI実行した際のステータスコード
     */
    private $statusCode;
    /**
     * CallApi constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client([
            RequestOptions::CONNECT_TIMEOUT => self::CONNECT_TIMEOUT,
            RequestOptions::TIMEOUT         => self::CLIENT_REQUEST_TIMEOUT,
            RequestOptions::VERIFY          => false,
        ]);
    }
    /**
     * @param string $url
     * @param array  $params
     */
    public function requestGet(string $url, array $params = [])
    {
        $uri = http_build_query($this->getParameters($params)['body']);

        try {
            $response = $this->httpClient->get($url.'?'.$uri);
        } catch (ClientException | ServerException $e) {
            $response = $e->getResponse();
        }
        $this->setResponse($response);
    }
    /**
     * @param string $url
     * @param array  $params
     */
    public function requestPost(string $url, array $params = [])
    {
        try {
            $response = $this->httpClient->post($url, $this->getParameters($params));
        } catch (ClientException | ServerException $e) {
            $response = $e->getResponse();
        }
        $this->setResponse($response);
    }  
  
    /**
     * @param array $params
     * @return array
     */
    private function getParameters(array $params): array
    {
        // パラメータを取得
        $options = [];
        if (isset($params['header'])) {
            $options['headers'] = $params['header'];
        }
        if (isset($params['body'])) {
            $options['body'] = $params['body'];
        }
        return $options;
    }
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    private function setResponse(\Psr\Http\Message\ResponseInterface $response)
    {
        $this->statusCode     = $response->getStatusCode();
        $this->responseBody   = $response->getBody()->getContents();
        $this->responseHeader = $response->getHeaders();
    }
    /**
     * @return mixed
     */
    public function getResponseHeader()
    {
        return $this->responseHeader;
    }
    /**
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
}
