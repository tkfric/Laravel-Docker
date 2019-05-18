<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Bookmark;

class Bookmark extends Model
{
    //
    protected $table = 'bookmarks';

    /**
     * ユーザのブックマークリストを返す
     * @param int $userId
     * @return array $shopIdList
     * */
    public function getShopIdListByUserId($userId)
    {
        $shopIdList = $this->select('shop_id')->where('user_id', $userId)->get()->toArray();
        $shopIdArray = [];
        foreach($shopIdList as $value) {
            $shopIdArray[] = $value['shop_id'];
        }
        return $shopIdArray;
    }


    /**
     * ブックマーク登録
     * @param int $userId
     * @param int $shopId
     * @return boolean
     * */
    public function setBookMark($userId, $shopId)
    {
        $isRecord = false;
        $recordCount = $this->where('user_id', $userId)->where('shop_id', $shopId)->count();

        if ($recordCount > 0) {
            return true;
        }
        $this->insert(['user_id' => $userId,'shop_id' => $shopId,]);
        $isRecord = true;

        return $isRecord;
    }

    /**
     * ブックマーク解除
     * @param int $userId
     * @param int $shopId
     * @return string|boolean
     * */
    public function dropBookMark($userId, $shopId)
    {
        $isRecord = false;
        $recordCount = $this->where('user_id', $userId)->where('shop_id', $shopId)->count();

        if ($recordCount <= 0) {
            return false;
        }

        $this->where('user_id', $userId)->where('shop_id', $shopId)->delete();
        $isRecord = true;

        return $isRecord;

    }
}
