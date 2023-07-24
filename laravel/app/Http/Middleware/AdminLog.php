<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin;
use App\Models\AdminLog as Log;
use App\Models\AdminPermission;
use Illuminate\Http\Request;

class AdminLog
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        p(AdminLog::class);
        $log = new Log();
        $log->method = $request->method();
        $log->url = $request->path();
        $log->route_name = $request->route()->getName();
//        $adminLog->route_path = $request->getRequestUri();
        $log->path = $request->url();
        $log->request_ip = $request->ip();
        $log->data = json_encode($request->input(), JSON_UNESCAPED_UNICODE);

        if (!empty($request->admin_id)) {
            $admin = Admin::where('id', $request->admin_id)->first();

            if ($admin == null) {
                $log->remark = '非admin_id权限';
            } else {
                $log->admin_id = $admin->id;
                $log->admin_name = $admin->real_name;
            }
        }
        $adminPermission = AdminPermission::where('path', $request->getRequestUri())->first();
        if ($adminPermission !== null) {
            $log->route_desc = $adminPermission->name;
        }
        $log->save();

        return $next($request);
    }

}
