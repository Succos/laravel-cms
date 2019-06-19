<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>我的商城</title>
    <title></title>
    <link href="//at.alicdn.com/t/font_353057_prsw3pcf1in.css" rel="stylesheet">
    <link href="/statics/mch/css/bootstrap.min.css" rel="stylesheet">
    <link href="/statics/mch/css/jquery.datetimepicker.min.css" rel="stylesheet">
    <link href="/statics/css/flex.css?version=2.9.21" rel="stylesheet">
    <link href="/statics/css/common.css?version=2.9.21" rel="stylesheet">
    <link href="/statics/mch/css/common.v2.css?version=2.9.21"
          rel="stylesheet">
    <script>var _csrf = "GJye_jTv8F5BCr7P-mZUPE2slbsHtDe3FcOBFBfDoPikpjQcCDRXYJdLYsVPCtsxVZiyfguUzKJgeQ7dVsq9ug==";</script>
    <script>var _upload_url = "/web/index.php?r=upload%2Ffile";</script>
    <script>var _upload_file_list_url = "/web/index.php?r=mch%2Fstore%2Fupload-file-list";</script>
    <script>var _district_data_url = "/web/index.php?r=api%2Fdefault%2Fdistrict&store_id=1";</script>
    <script>var CLODOP_URL = "/statics/mch/js/Lodop.js"</script>
    <script src="/statics/mch/js/jquery.min.js"></script>
    <script src="/statics/mch/js/jquery.nicescroll.min.js"></script>
    <script src="/statics/mch/js/vue.js"></script>
    <script src="/statics/mch/js/tether.min.js"></script>
    <script src="/statics/mch/js/bootstrap.min.js"></script>
    <script src="/statics/mch/js/plupload.full.min.js"></script>
    <script src="/statics/mch/js/jquery.datetimepicker.full.min.js"></script>
    <script src="/statics/mch/js/datetime.js"></script>
    <script src="/statics/js/common.js?version=2.9.21"></script>
    <script src="/statics/mch/js/common.v2.js?version=2.9.21"></script>
    <script src="/statics/mch/js/clipboard.js"></script>
    <script src="/statics/mch/vendor/layer/layer.js"></script>
    <script src="/statics/mch/vendor/laydate/laydate.js"></script>
</head>
<style>
    html {
        /*隐藏滚动条，当IE下溢出，仍然可以滚动*/
        -ms-overflow-style:none;
    }
</style>
<body>
<style>
    .label-help {
        display: inline-block;
        font-size: .65rem;
        background: #555;
        color: #fff;
        border-radius: 999px;
        width: 1rem;
        height: 1rem;
        line-height: 1rem;
        text-align: center;
        text-decoration: none;
        margin-left: .25rem;
    }

    .label-help:hover,
    .label-help:visited {
        color: #fff;
        text-decoration: none;
    }
</style>
<style>
    .panel-body .left {
        max-width: 153px;
        width: 300px;
        border: 1px solid #eee;
        background-color: #f4f5f9;
    }

    .left .item {
        width: 100%;
        padding: 0 10px;
        line-height: 40px;
        cursor: pointer;
    }

    .text-more {
        display: inline-block;
        width: 70%;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        word-break: break-all;
    }

    .left .item:first-child {
        background-color: #fff;
    }

    .left .item.active {
        background-color: #fff;
    }

    .left .item:hover {
        background-color: #fff;
    }

    .item-icon {
        width: 1rem;
        height: 1rem;
        line-height: 1;
        font-size: 1.3rem;
    }

    .file-item .mask {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 5;
        background-color: rgba(0, 0, 0, .5);
        text-align: center;
        background-image: url('/statics/images/icon-file-gou.png');
        background-size: 40px 40px;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
@include('admin.layouts._menu')
<div class="main">
    @include('admin.layouts.main_header')
    @yield('main_herader')
@yield('content')
</div>
</body>
</html>
