<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
    </head>
    <body>
        <table border="1">
            <tr>
                <td>姓名</td>
                <td>{{$real_name}}</td>
            </tr>
            <tr>
                <td>联系电话</td>
                <td>{{$mobile}}</td>
            </tr>
            <tr>
                <td>电子邮件</td>
                <td>{{$email}}</td>
            </tr>
            <tr>
                <td>标题</td>
                <td>{{$title}}</td>
            </tr>
            <tr>
                <td>意见详情</td>
                <td>{{$content}}</td>
            </tr>
            <tr>
                <td>反馈时间</td>
                <td>{{$create_time}}</td>
            </tr>
            @foreach($pic as $k => $v)
            <tr>
                <td>图片{{$k}}</td>
                <td>
                    <img style="max-width:40%; height:auto;" src="{{$v}}" />
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
