@extends('web.message.layout.app')
@section('title')
    意见反馈
@endsection
@section('keywords')
    意见反馈
@endsection
@section('description')
    意见反馈
@endsection

@section('content')
    <style>
        .zs {
            margin-left: 4%;
        }

        .input-group {
            width: 92%;
        }

        .custom-file-input:lang(en) ~ .custom-file-label::after {
            content: "浏览";
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--<a class="navbar-brand" href="#">意见反馈</a>-->
        <span class="navbar-brand">意见反馈</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">联系我们 <span class="sr-only">(current)</span></a>
                </li>
        </div>
    </nav>

    <br>
    <form>
        <div class="input-group mb-4 zs">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">您的姓名：</span>
            </div>
            <input type="text" class="form-control" placeholder="您的姓名" id="real_name" name="real_name"
                   aria-label="您的姓名" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4 zs">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">联系电话：</span>
            </div>
            <input type="text" class="form-control" placeholder="您的联系电话" id="mobile" name="mobile"
                   aria-label="您的联系电话" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4 zs">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">电子邮箱：</span>
            </div>
            <input type="text" class="form-control" placeholder="您的电子邮箱" id="email" name="email"
                   aria-label="您到电子邮箱" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-4 zs">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">标&nbsp;&nbsp;&nbsp;&nbsp;题&nbsp;&nbsp;&nbsp;：</span>
            </div>
            <input type="text" class="form-control" placeholder="标题内容" id="title" name="title" aria-label="标题内容"
                   aria-describedby="basic-addon1">
        </div>

        <div class="input-group  mb-4 zs">
            <div class="input-group-prepend">
                <span class="input-group-text">意见详情：</span>
            </div>
            <textarea class="form-control" aria-label="意见详情" id="content" placeholder="意见详情"
                      name="content"></textarea>
        </div>

        <div class="input-group mb-4 zs">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">图片上传：</span>
            </div>
            <div class="custom-file">
                <!--                    <input type="file" onchange="uploadFile(this.files)" class="custom-file-input" id="inputGroupFile01" name="pic" aria-describedby="inputGroupFileAddon01" multiple="multiple">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="pic" aria-describedby="inputGroupFileAddon01" multiple="multiple">
                            <label class="custom-file-label" for="inputGroupFile01">选择图片</label>-->
                <input id="uploadfile" name="uploadfile" type="file" class="form-control" multiple
                       data-show-upload="false" data-show-caption="true" data-show-preview="false">
            </div>

        </div>
        <br>
        <br>
        <div class="input-group mb-4 zs">
            <button type="button" class="btn btn-primary form-control" id="submit">提交</button>
        </div>
    </form>

    <script>
        var imageData = [];
        $(document).ready(function () {

            $("#uploadfile").fileinput({
                language: 'zh', //设置语言
                uploadUrl: "/messageUploadPic", //上传的地址
                allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'], //接收的文件后缀
                //uploadExtraData:{"id": 1, "fileName":'123.mp3'},
                uploadAsync: true, //默认异步上传
                showUpload: true, //是否显示上传按钮
                showRemove: false, //显示移除按钮
                showPreview: false, //是否显示预览
                showCaption: false, //是否显示标题
                browseClass: "btn btn-primary", //按钮样式
                dropZoneEnabled: false, //是否显示拖拽区域
                //minImageWidth: 50, //图片的最小宽度
                //minImageHeight: 50,//图片的最小高度
                //maxImageWidth: 1000,//图片的最大宽度
                //maxImageHeight: 1000,//图片的最大高度
                maxFileSize: 1024 * 5, //单位为kb，如果为0表示不限制文件大小
                //minFileCount: 0,
                maxFileCount: 10, //表示允许同时上传的最大文件个数
                enctype: 'multipart/form-data',
                validateInitialCount: true,
                previewFileIcon: "<iclass='glyphicon glyphicon-king'></i>",
                msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
                uploadExtraData: {
                    _token: '{{ csrf_token() }}' //参数
                },
            }).on("filebatchselected", function (event, files) {
                $(this).fileinput("upload");
            }).on("fileuploaded", function (event, data) {

                //把数据压入数组
                imageData.push(data.response.data.src);
                console.log(imageData);
            }).on('filebatchuploaderror', function (event, data, msg) {
                console.log(msg)
            }).on('fileerror', function (event, data, msg) {
                console.log(msg)
            });


            $("#submit").click(function () {
//            console.log(111111111111111)
                $.post({
                    url: "/message/feedback",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        pics: imageData,
                        real_name: $("#real_name").val(),
                        mobile: $("#mobile").val(),
                        email: $("#email").val(),
                        title: $("#title").val(),
                        content: $("#content").val()
                    },
                    success: function (result) {
                        console.log(result);
                        if (result.code == 200) {
                            layer.msg(result.msg, {
                                time: 2000
                            }, function () {
                                window.location.reload();
                            });
                        } else {
                            layer.msg(result.msg);
                        }

                    }
                });
            });
        });


    </script>

@endsection

