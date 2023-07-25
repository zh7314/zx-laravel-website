<?php

namespace App\Services\Web;

use App\Models\Message;
use App\Utils\GlobalMsg;
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

        isset($data['real_name']) && $message->real_name = $data['real_name'];
        isset($data['email']) && $message->email = $data['real_name'];
        isset($data['title']) && $message->title = $data['real_name'];
        isset($data['content']) && $message->content = $data['real_name'];
        isset($data['pics']) && $message->pics = implode(',', $data['pics']);
        isset($data['ip']) && $message->ip = $data['ip'];

        $res = $message->save();

        if ($res == false) {
            throw new Exception(GlobalMsg::SAVE_FAIL);
        }
        return $res;
    }

    public static function processed($where = [])
    {
        if (empty($where['id'])) {
            throw new Exception('消息ID不存在');
        }
        $message = Message::where('status', 10)->where('id', $where['id'])->first();
        if (empty($message)) {
            throw new Exception('此消息不存在');
        }
        $message->status = 20;
        $message->save();
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
