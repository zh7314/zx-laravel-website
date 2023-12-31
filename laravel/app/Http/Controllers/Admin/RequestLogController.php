<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Admin\RequestLogService;
use Throwable;
use App\Utils\ResponseTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RequestLogController extends Controller
{

    use ResponseTrait;

    public function getList(Request $request)
    {
        try {
            $where = [];
            $page = parameterCheck($request->input('page'), 'int', 0);
            $pageSize = parameterCheck($request->input('pageSize'), 'int', 0);

            $where['method'] = parameterCheck($request->input('method'), 'string', '');
            $where['ip'] = parameterCheck($request->input('ip'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['params'] = parameterCheck($request->input('params'), 'string', '');
            $where['header'] = parameterCheck($request->input('header'), 'string', '');
            $where['data'] = parameterCheck($request->input('data'), 'string', '');
            $where['return_at'] = parameterCheck($request->input('return_at'), 'string', '');
            $where['time'] = parameterCheck($request->input('time'), 'array', []);

            $data = RequestLogService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $where = [];

            $where['method'] = parameterCheck($request->input('method'), 'string', '');
            $where['ip'] = parameterCheck($request->input('ip'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['params'] = parameterCheck($request->input('params'), 'string', '');
            $where['header'] = parameterCheck($request->input('header'), 'string', '');
            $where['data'] = parameterCheck($request->input('data'), 'string', '');
            $where['return_at'] = parameterCheck($request->input('return_at'), 'string', '');


            $data = RequestLogService::getAll($where);

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

            $data = RequestLogService::getOne($where['id']);

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
            $where['method'] = parameterCheck($request->input('method'), 'string', '');
            $where['ip'] = parameterCheck($request->input('ip'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['params'] = parameterCheck($request->input('params'), 'string', '');
            $where['header'] = parameterCheck($request->input('header'), 'string', '');
            $where['data'] = parameterCheck($request->input('data'), 'string', '');
            $where['return_at'] = parameterCheck($request->input('return_at'), 'string', '');

            $data = RequestLogService::add($where);

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
            $where['method'] = parameterCheck($request->input('method'), 'string', '');
            $where['ip'] = parameterCheck($request->input('ip'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['params'] = parameterCheck($request->input('params'), 'string', '');
            $where['header'] = parameterCheck($request->input('header'), 'string', '');
            $where['data'] = parameterCheck($request->input('data'), 'string', '');
            $where['return_at'] = parameterCheck($request->input('return_at'), 'string', '');

            $data = RequestLogService::save($where);

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
            $data = RequestLogService::delete($where['id']);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

}
