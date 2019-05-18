<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
// use App\Service\GetShop;

class BookmarkController extends Controller
{
    //
    protected $bookmark;
    protected $hotPepper;

    public function __construct(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
//         $this->hotPepper = $hotPeppar;
    }

    /**
     * ブックマーク一覧
     * @param Request $request
     * @return boolean|unknown*/
    public function getBookMarkList(Request $request)
    {
        var_dump('getBookMarkList');
        /* userIdの存在確認 */
        $userId = $request->input('user_id');
        if(empty($userId)) {
            return false;
        }
        /* serIdを元にブックマーク店舗ID一覧を取得する */
        $shopIdList = $this->bookmark->getShopIdListByUserId($userId);

        dump($shopIdList);
        /* TODO:店舗IDListを元に店舗情報を取得する */
        $shopDataList = [];

        /* TODO:front要望によてはコンバート処理 */
        return json_encode($shopDataList);
    }

    /**
     * ブックマークの登録
     * @param Request $request
     * @return string[]|boolean[]|array[]*/

    public function setBookMark(Request $request)
    {
        $userId = $request->input('user_id');
        $shopId = $request->input('shop_id');

        $returnArray = [
            'message' => '',
            'user_id' => $userId,
            'shop_id' => $shopId,
            'result' => false
        ];

        if(empty($userId) || empty($shopId)) {
            $returnArray['message'] = 'No Required';
            return $returnArray;
        }

        try {
            $returnArray['result'] = $this->bookmark->setBookMark($userId, $shopId);
            $returnArray['message'] = 'completed';
        }
        catch (Exception $e) {
            $returnArray['result'] = false;
            $returnArray['message'] = $e->__toString();
        }

        return json_encode($returnArray);
    }

    /**
     * ブックマークの削除
     * @param Request $request
     * @return string[]|boolean[]|array[]*/

    public function dropBookMark(Request $request)
    {
        $userId = $request->input('user_id');
        $shopId = $request->input('shop_id');

        $returnArray = [
            'message' => '',
            'user_id' => $userId,
            'shop_id' => $shopId,
            'result' => false
        ];

        if(empty($userId) || empty($shopId)) {
            $returnArray['message'] = 'No Required';
            return $returnArray;
        }

        try {
            $returnArray['result'] = $this->bookmark->dropBookMark($userId, $shopId);

            if($returnArray['result']) {
                $returnArray['message'] = 'completed';
            }
            else {
                $returnArray['message'] = 'Unknown user_id or shop_id';
            }

        }
        catch (Exception $e) {
            $returnArray['result'] = false;
            $returnArray['message'] = $e->__toString();
        }


        return json_encode($returnArray);
    }
}
