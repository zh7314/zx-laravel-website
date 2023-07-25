<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>

    <script type="text/javascript">
        window.Laravel = '<?php echo json_encode(['csrfToken' => csrf_token()]); ?>'
    </script>

    <!-- bootstrap 基础组件 注意顺序 -->
    <link type="text/css" rel="stylesheet" href="{{URL::asset('/static/board/css/bootstrap.min.css')}}"/>
    <script type="text/javascript" src="{{URL::asset('/static/board/js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/static/board/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/static/board/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('/static/board/js/bootstrap.bundle.js')}}"></script>
    <!--<script type="text/javascript" src="{{URL::asset('/static/board/js/jquery.ajaxfileupload.js')}}"></script>-->
    <script type="text/javascript" src="{{URL::asset('/static/board/js/ajaxfileupload.js')}}"></script>

    <!--bootstrap-fileinput 组件-->
    <link href="{{URL::asset('/static/board/bootstrap-fileinput/css/fileinput.css')}}" media="all" rel="stylesheet"
          type="text/css"/>
    <link href="{{URL::asset('/static/board/bootstrap-fileinput/css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('/static/board/bootstrap-fileinput/themes/explorer-fas/theme.css')}}" media="all"
          rel="stylesheet" type="text/css"/>

    <script src="{{URL::asset('/static/board/bootstrap-fileinput/js/plugins/piexif.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('/static/board/bootstrap-fileinput/js/plugins/sortable.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('/static/board/bootstrap-fileinput/js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('/static/board/bootstrap-fileinput/js/locales/zh.js')}}" type="text/javascript"></script>
    <!--<script src="{{URL::asset('/static/board/bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>-->
    <script src="{{URL::asset('/static/board/bootstrap-fileinput/themes/fas/theme.js')}}"
            type="text/javascript"></script>
    <script src="{{URL::asset('/static/board/bootstrap-fileinput/themes/explorer-fas/theme.js')}}"
            type="text/javascript"></script>

    <script src="{{URL::asset('/static/board/layer/layer.js')}}" type="text/javascript"></script>

</head>

<body>

