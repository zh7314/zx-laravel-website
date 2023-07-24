<?php

namespace App\Http\Middleware;

use App\Services\Admin\CommonService;
use Closure;
use App\Models\Admin;
use Exception;
use App\Utils\ResponseTrait;
use App\Utils\GlobalCode;
use Throwable;

class AdminCheck
{
    use ResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        p(AdminCheck::class);

        try {
            $token = $request->header(GlobalCode::API_TOKEN, '');
            if (empty($token)) {
                //兼容文件下载文件验证 token
                $token = $request->input(GlobalCode::API_TOKEN, '');
                if (empty($token)) {
                    throw new Exception('token为空，请重新登录');
                }
            }
            $admin = Admin::where('token', $token)->first();
            if ($admin == null) {
                throw new Exception('token不存在');
            }
            if ((int)time() > ((int)strtotime($admin->token_time) + (int)GlobalCode::TOKEN_TIME)) {
                throw new Exception('token过期，请重新登录');
            }

            $request['admin_id'] = $admin->id;
            $request['token'] = $token;

            $request_url = $request->getPathInfo();
            try {
                //权限验证
                CommonService::permissionCheck($admin->id, $request_url);
            } catch (Exception $e) {
                return $this->fail($e);
            }

        } catch (Throwable $e) {
            return $this->grant($e);
        }

        return $next($request);
    }

}
