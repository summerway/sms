@extends('layouts.model')

@section('title', '编辑信息')


@section('load_css')

@endsection

@section('customize_css')
    <style>

    </style>
@endsection


@section('content')
    <div class="container">

        <div style="margin: 10px;">
            <form id="company-form">
                <a class="btn btn-success" href="/company" style="margin-bottom: 10px;">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> 返回列表
                </a>
                <div class="form-group">
                    <label for="name">保险公司名称</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="名称 (必填项)"
                           data-error="请填写保险公司名称" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="car_id">车架号</label>
                    <input type="text" class="form-control" id="car_id" name="car_id" placeholder="大写字母+数字 (必填项)"
                           pattern="[A-Z0-9]{17}$" data-error="请按格式填写车架号" required/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="license">车牌号</label>
                    <input type="text" class="form-control" id="license" name="license" placeholder="车牌号 (必填项)"
                           data-error="请填写车牌号" required />
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="server_id">服务商</label>
                    <select multiple class="form-control" id="server_id" name="service_id" data-error="请选择服务商" required>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <input id="id" name="id" type="hidden" />
                    <button id="submit" type="submit" class="btn btn-primary pull-right">提交</button>
                </div>
            </form>
        </div>
    </div><!-- /.container -->
@endsection

@section('load_js')

@endsection

@section('customize_js')
    <script>
        $(document).ready(function() {
            //global params
            var company_id = '{!! $company_id !!}';

            //init data
            loadConfig();

            $.ajax({
                type: "post",
                url: base_path + '/api/company/editInfo',
                data: {id:company_id},
                error: function (request) {
                    error(request.responseJSON.ErrorMsg);
                },
                success: function (rs){
                    $.each(rs.data.info,function(index,value){
                        var element = "#" + index;
                        $(element).val(value);
                    })

                    //event
                    $('#company-form').validator().on('submit', function (e) {
                        if (e.isDefaultPrevented()) {
                            //alert('form is not valid');
                        } else {
                            e.preventDefault();
                            update();
                        }
                    });
                }
            });


        });

        /**
         * 加载配置项
         */
        function loadConfig(){
            $.ajax({
                type: "POST",
                url: base_path + "/api/company/createConf",
                dataType: "json",
                error: function (request) {
                    error(request.responseJSON.ErrorMsg);
                },
                success: function (rs) {
                    var item = rs.data;
                    var html = '';
                    $.each(item.service,function(key,val){
                        html = '<option value="'+ val['key'] +'">'+ val['value'] +'</option>'
                        $("#server_id").append(html);
                    })
                }
            });
        }

        /**
         * 更新数据
         */
        function update(){
            var _values = $("#company-form").serializeArray();
            $.ajax({
                type: "post",
                url: base_path + "/api/company/update",
                data: _values,
                error: function (request) {
                    error(request.responseJSON.ErrorMsg);
                },
                success: function (rtn){
                    success(rtn.msg);
                    window.setTimeout(function(){
                        if ( rtn.url != undefined ) {
                            window.location.href = rtn.url;
                        }
                    }, 2000);
                }
            });
        }

    </script>
@endsection

