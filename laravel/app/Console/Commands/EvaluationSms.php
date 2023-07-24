<?php

namespace App\Console\Commands;

use App\Scripts\TijianFileScript;
use App\Services\CommonService;
use App\Services\Sms\AliyunSmsService;
use App\Utils\Http;
use App\Utils\RedisCode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class EvaluationSms extends Command
{

    protected $taskserver;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'EvaluationSms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'EvaluationSms';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static $dingTalkUrl = 'https://oapi.dingtalk.com/robot/send?access_token=b72558e79ae58cefe3e2445ba3ec568e01e11022b54703171e3ee8ede7b83159';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tallNum    = 0;
        $tallInNum  = 0;
        $tallSmsNum = 0;
        $telDouble  = 0;
        $telError   = 0;
        $sendPhone  = [];
        try {
            //指定时间
            $from = date("Y-m-d H:i:s", strtotime(date("Y-m-d")." 00:00:00") );
            $to   = date("Y-m-d H:i:s", strtotime(date("Y-m-d")." 23:59:59") );

            $fromTime = strtotime(date("Y-m-d")." 00:00:00");
            $toTime   = strtotime(date("Y-m-d")." 23:59:59");

            //门诊
            $data = DB::connection('sqlsrv_this4')->table('GH_MZ_MESSAGE')->whereBetween('timekey', [$from, $to])->get()->toArray();
            if(!is_array($data) || !count($data)){
                $message = "医大满意度调查\n门诊接口返回为空！";
                self::sendDingTalkText($message);
            } else {
                foreach ($data as $k=>$v){
                    $tallNum++;
                    $add  = [];
                    $add['timekey'] = $v->timekey;
                    $add['cardno']  = parameterCheck($v->cardno, 'string', '');
                    $add['hzxm']    = parameterCheck($v->hzxm, 'string', '');
                    $add['tel']     = parameterCheck($v->tel, 'string', '');
                    $add['zdmc']    = parameterCheck($v->zdmc, 'string', '');
                    $add['ksmc']    = parameterCheck($v->ksmc, 'string', '');
                    $add['islis']   = $v->islis == '是'?'1':'0';
                    $add['isris']   = $v->isris == '是'?'1':'0';
                    $add['issuccess']  = '0';
                    $add['createtime'] = date("Y-m-d H:i:s");
                    $inId = DB::table('evaluation')->insertGetId($add);
                    if($inId){
                        $tallInNum++;
                        $phone = $add['tel'];
                        if(in_array($phone, $sendPhone)){
                            $telDouble++;
                            continue;
                        }
                        //手机号验证
                        if(!preg_match("/^1[123456789]{1}\d{9}$/", $phone)){
                            $telError++;
                            continue;
                        }

                        //重复判断
                        $sendPhone[]  =  $phone;

                        //短信发送
                        $templateCode = 'SMS_256920350';
                        AliyunSmsService::sendMessageOutParam($phone, $templateCode, RedisCode::ALI_SIGN_INFO, 80);
                        $tallSmsNum++;

                        //更新状态
                        DB::table('evaluation')->where('id', $inId)->update(array('issuccess' => '1'));
                    }
                }
            }

            //住院
            $data = DB::connection('sqlsrv_this4')->table('CY_ZY_MESSAGE')->get()->toArray();
            if(!is_array($data) || !count($data)){
                $message = "医大满意度调查\n门诊接口返回为空！";
                self::sendDingTalkText($message);
            } else {
                foreach ($data as $k=>$v){
                    $tallNum++;
                    $add  = [];
                    $add['timekey'] = $v->timekey;
                    $add['zyh']     = parameterCheck($v->zyh, 'string', '');
                    $add['hzxm']    = parameterCheck($v->hzxm, 'string', '');
                    $add['lxdh']    = parameterCheck($v->lxdh, 'string', '');
                    $add['ksmc']    = parameterCheck($v->ksmc, 'string', '');
                    $add['bqmc']    = parameterCheck($v->bqmc, 'string', '');
                    $add['zdmc']    = parameterCheck($v->zdmc, 'string', '');
                    $add['issuccess']  = '0';
                    $add['createtime'] = date("Y-m-d H:i:s");
                    $inId = DB::table('evaluation_zy')->insertGetId($add);
                    if($inId){
                        $tallInNum++;
                        $phone = $add['lxdh'];
                        if(in_array($phone, $sendPhone)){
                            $telDouble++;
                            continue;
                        }
                        //时间验证
                        $inTime = strtotime($v->timekey);
                        if($inTime<$fromTime){
                            continue;
                        }

                        //手机号验证
                        if(!preg_match("/^1[123456789]{1}\d{9}$/", $phone)){
                            $telError++;
                            continue;
                        }

                        //重复判断
                        $sendPhone[]  =  $phone;

                        //短信发送
                        $templateCode = 'SMS_256920350';
                        if(date("Y-m-d") != '2022-11-16'){
                            AliyunSmsService::sendMessageOutParam($phone, $templateCode, RedisCode::ALI_SIGN_INFO, 80);
                        }
                        $tallSmsNum++;

                        //更新状态
                        DB::table('evaluation_zy')->where('id', $inId)->update(array('issuccess' => '1'));
                    }
                }
            }

            $message = "医大满意度调查".date("Y-m-d")."\n共拉取数据：".$tallNum."\n入库数量：".$tallInNum."\n发送数量：".$tallSmsNum."\n号码重复：".$telDouble."\n号码错误：".$telError;
            self::sendDingTalkText($message);

            //日志入库
            DB::table('evaluation_log')
                ->updateOrInsert(
                    ['today' => date("Y-m-d")],
                    ['tall_num' => $tallNum, 'tall_innum' => $tallInNum, 'tall_smsnum' => $tallSmsNum, 'tel_double' => $telDouble, 'tel_error' => $telError, 'create_time' => date("Y-m-d H:i:s"), 'update_time' => date("Y-m-d H:i:s")]
                );
        } catch (\Illuminate\Database\QueryException $e) {
            Log::info($e->getMessage());
            //数据异常钉钉通知
            $message = "医大满意度调查mysql error，请查看log。".date("Y-m-d H:i:s");
            self::sendDingTalkText($message);
        } catch (Exception $e) {
            Log::info($e->getTraceAsString());
            //数据异常钉钉通知
            $message = "医大满意度调查error，请查看log。".date("Y-m-d H:i:s");
            self::sendDingTalkText($message);
        }
    }

    public static function sendDingTalkText(string $msg, bool $isAtAll = false, array $atMobile = [])
    {
        $data = [];
        if ($isAtAll) {
            $data = [
                'msgtype' => 'text',
                'text' => ['content' => $msg],
                'at' => [
                    'atMobiles' => $atMobile, //被@人的手机号
                    'isAtAll' => $isAtAll, // 是否@所有人
                ]
            ];
        } else {
            $data = [
                'msgtype' => 'text',
                'text' => ['content' => $msg],
            ];
        }

        $result = Http::post(self::$dingTalkUrl, $data, true);
        return $result;
    }
}
