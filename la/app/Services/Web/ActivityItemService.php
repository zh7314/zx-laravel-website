<?php

namespace App\Services\Web;

use App\Models\ActivityItem;
use Exception;
use App\Utils\GlobalCode;

class ActivityItemService
{

    public static function getList(array $where = [], int $page = 0, int $pageSize = 0)
    {
        $activityItem = ActivityItem::where('is_delete', GlobalCode::NORMAL);

        if (!empty($where['activity_name'])) {
            $activityItem = $activityItem->where('activity_name', 'like', '%' . $where['activity_name'] . '%');
        }
        if (!empty($where['item_name'])) {
            $activityItem = $activityItem->where('item_name', 'like', '%' . $where['item_name'] . '%');
        }
        if (!empty($where['status'])) {
            $activityItem = $activityItem->where('status', $where['status']);
        }

        $count = $activityItem->count();

        if ($page > 0 && $pageSize > 0) {
            $activityItem = $activityItem->forPage($page, $pageSize);
        }

        $list = $activityItem->orderBy('id', 'desc')->get()->toArray();

        return ['count' => $count, 'list' => $list];
    }

    public static function getAll(array $where = [])
    {
        $activityItem = new ActivityItem;

        if (!empty($where['activity_name'])) {
            $activityItem = $activityItem->where('activity_name', 'like', '%' . $where['activity_name'] . '%');
        }
        if (!empty($where['item_name'])) {
            $activityItem = $activityItem->where('item_name', 'like', '%' . $where['item_name'] . '%');
        }
        if (!empty($where['status'])) {
            $activityItem = $activityItem->where('status', $where['status']);
        }

        return $activityItem->orderBy('id', 'desc')->get()->toArray();
    }

    public static function getOne(int $id = 0)
    {
        $activityItem = ActivityItem::where('id', $id)->first();
        if ($activityItem == null) {
            throw new Exception('数据已经被删除');
        }
        return $activityItem;
    }

    public static function add(array $where = [])
    {

        try {
            $activityItem = new ActivityItem;
            if (!empty($where['id'])) {
                throw new Exception('添加数据不建议直接传主键id');
            }
            isset($where['discounted_price']) && $activityItem->discounted_price = $where['discounted_price'];
            isset($where['item_id']) && $activityItem->item_id = $where['item_id'];
            isset($where['item_name']) && $activityItem->item_name = $where['item_name'];
            isset($where['activity_id']) && $activityItem->activity_id = $where['activity_id'];
            isset($where['activity_name']) && $activityItem->activity_name = $where['activity_name'];
            isset($where['status']) && $activityItem->status = $where['status'];
            isset($where['remark']) && $activityItem->remark = $where['remark'];


            $activityItem->save();

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function save(array $where = [])
    {
        try {
            if (empty($where['id'])) {
                throw new Exception('缺少编辑数据的主键');
            }
            $activityItem = ActivityItem::where('id', $where['id'])->first();
            if ($activityItem == null) {
                throw new Exception('待编辑数据为空或者被删除');
            }

            isset($where['discounted_price']) && $activityItem->discounted_price = $where['discounted_price'];
            isset($where['item_id']) && $activityItem->item_id = $where['item_id'];
            isset($where['item_name']) && $activityItem->item_name = $where['item_name'];
            isset($where['activity_id']) && $activityItem->activity_id = $where['activity_id'];
            isset($where['activity_name']) && $activityItem->activity_name = $where['activity_name'];
            isset($where['status']) && $activityItem->status = $where['status'];
            isset($where['remark']) && $activityItem->remark = $where['remark'];


            $activityItem->save();
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function delete(int $id = 0)
    {
        $activityItem = ActivityItem::where('is_delete', GlobalCode::NORMAL)->where('id', $id)->first();
        if ($activityItem == null) {
            throw new Exception('数据已经被删除');
        }
        $activityItem->is_delete = GlobalCode::DELETE;
        return $activityItem->save();
    }
}
