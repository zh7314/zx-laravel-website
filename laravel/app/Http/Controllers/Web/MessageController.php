<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\MessageService;
use App\Utils\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;


class MessageController extends Controller
{
    use ResponseTrait;

    //首页
    public function index(Request $request)
    {
        return view('web.message.index');
    }

    public function feedback(Request $request)
    {
        DB::beginTransaction();
        try {
            $where = [];
            $data = [];

            $data['real_name'] = parameterCheck($request->input('real_name'), 'string', '');
            $data['mobile'] = parameterCheck($request->input('mobile'), 'string', '');
            $data['email'] = parameterCheck($request->input('email'), 'string', '');
            $data['title'] = parameterCheck($request->input('title'), 'string', '');
            $data['content'] = parameterCheck($request->input('content'), 'string', '');
            $data['pics'] = parameterCheck($request->input('pics'), 'array', []);

            $data['ip'] = request()->ip();

            $res = MessageService::saveData($where, $data);

            DB::commit();
            return $this->success($res);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

}
