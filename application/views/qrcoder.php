<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="container">
    <!-- Page Content -->
    <div class="row-fluid">
        <div class="center-block">
            <div class="col-lg-12 text-center ostrich_sansblack">
                <div class="center-block clearfix main-handler">
                    <div class="col-lg-12 col-md-12 col-xs-12">

                        <style type="text/css">
                        .main-block {
                            margin: 150px auto 150px auto;
                        }
                        #qrfile{
                            width:320px;
                            height:240px;
                        }
                        #v{
                            width:320px;
                            height:240px;
                        }
                        #qr-canvas{
                            display:none;
                        }
                        #iembedflash{
                            margin:0;
                            padding:0;
                        }
                        #mp1{
                            text-align:center;
                            font-size:25px;
                        }
                        #mp2{
                            text-align:center;
                            font-size:25px;
                            color:red;
                        }
                        .selector{
                            border: solid;
                            border-width: 3px 3px 1px 3px;
                            margin:0;
                            padding:0;
                            cursor:pointer;
                            margin-bottom:-5px;
                        }
                        #outdiv
                        {
                            width:320px;
                            height:240px;
                            border: solid;
                            border-width: 1px 1px 1px 1px;
                        }
                        #result{
                            border: solid;
                            border-width: 1px 1px 1px 1px;
                            padding:20px;
                            width:37.3%;
                        }
                        #imghelp{
                            position:relative;
                            left:0px;
                            top:-160px;
                            z-index:100;
                            font:18px arial,sans-serif;
                            background:#f0f0f0;
                            margin-left:35px;
                            margin-right:35px;
                            padding-top:10px;
                            padding-bottom:10px;
                            border-radius:20px;
                        }
                        p.helptext{
                            margin-top:54px;
                            font:18px arial,sans-serif;
                        }
                        p.helptext2{
                            margin-top:100px;
                            font:18px arial,sans-serif;
                        }
                        .tsel{
                            padding:0;
                        }
                        </style>

                        <div id="main" class="main-block">
                            <div id="mainbody" class="center-block">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <button id="qrimg" class="btn btn-primary btn-sm" onclick="setimg()"><span class="fa fa-file-o"></span></button>
                                        <button id="webcamimg" class="btn btn-primary btn-sm" onclick="setwebcam()"><span class="fa fa-camera"></span></button>
                                    </div>  
                                </div>
                                <div id="outdiv" style="width:373px;height:280px"></div>
                                <div id="result" style="width:373px;height:auto"></div>
                            </div>
                        </div>

                        <canvas id="qr-canvas" width="800" height="600"></canvas>

                    </div>
                </div>                        
            </div>                
        </div>
    </div>
    <!-- /.row -->
</div>    