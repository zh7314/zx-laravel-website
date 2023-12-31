<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Admin\BannerCateService;
use Throwable;
use App\Utils\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BannerCateController extends Controller
{

    use ResponseTrait;

    public function getList(Request $request)
    {
        try {
            $where = [];
            $page = parameterCheck($request->input('page'), 'int', 0);
            $pageSize = parameterCheck($request->input('pageSize'), 'int', 0);

            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);

            $data = BannerCateService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $where = [];

            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);


            $data = BannerCateService::getAll($where);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getOne(Request $request)
    {
        try {
            $where = [];

            $where['id'] = parameterCheck($request->input('id'), 'int', 0);

            $data = BannerCateService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add(Request $request)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);

            $data = BannerCateService::add($where);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

    public function save(Request $request)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->input('id'), 'int', 0);
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);

            $data = BannerCateService::save($where);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

    public function delete(Request $request)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->input('id'), 'int', 0);
            $data = BannerCateService::delete($where['id']);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

}
