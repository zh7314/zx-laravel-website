<?php

namespace App\Services\Web;

use App\Models\Message;
use Exception;
use App\Utils\GlobalCode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageService
{
    public static function saveData($where = [], $data = [])
    {

//            if (empty($data['mobile'])) {
//                throw new \Exception('手机号码不难为空');
//            }
        if (empty($data['title'])) {
            throw new Exception('反馈标题不能为空');
        }
        if (empty($data['content'])) {
            throw new Exception('反馈内容不能为空');
        }

//            if (!CommonService::isPhone($data['mobile'])) {
//                throw new \Exception('请输入合法手机号');
//            }
//            if (!empty($data['email']) && !CommonService::isEmail($data['email'])) {
//                throw new \Exception('请输入有效电子邮件');
//            }

        $message = new Message();

        $message->real_name = isset($data['real_name']) ? $data['real_name'] : '';
        $message->mobile = isset($data['mobile']) ? $data['mobile'] : '';
        $message->email = isset($data['email']) ? $data['email'] : '';
        $message->title = isset($data['title']) ? htmlspecialchars($data['title']) : '';
        $message->content = isset($data['content']) ? htmlspecialchars($data['content']) : '';
        $message->pics = isset($data['pics']) ? json_encode($data['pics']) : '';
        $message->ip = $data['ip'];
        $res = $message->save();


    }

    public static function getList($where = [], $data = [], $page = 1, $pageSize = 15)
    {
        try {

            $query = Message::where('is_delete', 10);

            if (!empty($where['email'])) {
                $query->where('email', $where['email']);
            }
            if (!empty($where['real_name'])) {
                $query->where('real_name', 'like', '%' . $where['real_name'] . '%');
            }
            if (!empty($where['mobile'])) {
                $query->where('mobile', $where['mobile']);
            }
            $count = $query->count();
            $list = $query->forPage($page, $pageSize)->orderBy('id', 'desc')->get()->toArray();
            foreach ($list as $k => &$v) {
                $v['content'] = htmlspecialchars_decode($v['content']);
                $v['title'] = htmlspecialchars_decode($v['title']);
            }

            return ['count' => $count, 'list' => $list];
        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public static function getLatestMessage($where = [], $data = [])
    {
        try {
            $time = Carbon::parse('-5 days')->toDateTimeString();
//            $count = Message::where('is_delete', 10)->where('create_time', '>=', $time)->where('status', 10)->count();
            $count = Message::where('is_delete', 10)->where('status', 10)->count();
            return $count;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function processed($where = [], $data = [])
    {
        try {

            $message = Message::where('is_delete', 10)->where('status', 10)->where('id', $where['id'])->first();
            if (empty($message)) {
                throw new Exception('此消息不存在');
            }
            $message->status = 20;
            $message->save();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function sendEmail()
    {
        $message = Message::where('is_delete', 10)->where('is_sent', 10)->get();
        if (!$message->isEmpty()) {

            foreach ($message as $k => $v) {

//                self::pp($v);
                $to = 'hxmt2020@126.com';
                $real_name = $v->real_name;
                $mobile = $v->mobile;
                $email = $v->email;
                $title = htmlspecialchars_decode($v->title);
                $content = htmlspecialchars_decode($v->content);
                $create_time = $v->create_time;
                $pics = json_decode($v->pics, true);

                foreach ($pics as $k1 => &$v1) {
                    $v1 = self::getDomain() . $v1;
                }

                Mail::send(
                    'emails.feedback',
                    ['real_name' => $real_name, 'mobile' => $mobile, 'email' => $email, 'title' => $title, 'content' => $content, 'create_time' => $create_time, 'pics' => $pics],
                    function ($content) use ($to, $title) {
                        $content->to($to)->subject($title);
                    }
                );
                $v->is_sent = 100;
                $v->save();
            }
        }
    }

}
