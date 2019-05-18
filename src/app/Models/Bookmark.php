<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Models\Bookmark;

class Bookmark extends Model
{
    //
    protected $table = 'bookmarks';

    public function getShopIdListByUserId($userId)
    {
        $shopIdList = $this->select('shop_id')->where('user_id', $userId)->get()->toArray();
        return $shopIdList;
    }


    public function setBookMark($userId, $shopId)
    {
        $isRecord = false;
        $recordCount = $this->where('user_id', $userId)->where('shop_id', $shopId)->count();

        if($recordCount > 0) {
            return true;
        }
        $this->insert(['user_id' => $userId,'shop_id' => $shopId,]);
        $isRecord = true;

        return $isRecord;
    }

    public function dropBookMark($userId, $shopId)
    {
        $isRecord = false;
        $recordCount = $this->where('user_id', $userId)->where('shop_id', $shopId)->count();

        if($recordCount <= 0) {
            return falase;
        }

        $this->where('user_id', $userId)->where('shop_id', $shopId)->delete();
        $isRecord = true;

        return $isRecord;

    }
}
