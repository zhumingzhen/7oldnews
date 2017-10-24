<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>烂笔头</title>
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <style>
            input::-webkit-input-placeholder {
                /* placeholder颜色  */
                color: #00B83F;
                /* placeholder字体大小  */
                /*font-size: 12px;*/
                /* placeholder位置  */
                /*text-align: right;*/
                padding-left: 5px;
            }
        </style>
    </head>
    <body>
        <div style="width: 60%;margin: 0 auto;margin-top: 50px;">
            <form>
                <div class="form-group">
                    <label for="describe">describe</label>
                    <input type="text" class="form-control" id="describe" placeholder="describe">
                </div>
                <div class="form-group">
                    <label for="account">account</label>
                    <input type="text" class="form-control" id="account" placeholder="account">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label for="operation">operation</label>
                    <input type="password" class="form-control" id="operation" placeholder="operation">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <script>
            $(document).ready(function(){
                $(".submit").bind('click',function () {
                    var operation = $(this).prev().val();
                    var describe = $(this).parent().parent().find(".describe").text();
                    var account = $(this).parent().parent().find(".account").text();
                    var ciphertext = $(this).parent().parent().find(".ciphertext").text();
                    var that = this;
                    $.ajax({
                        type: "POST",
                        url: "/goodwritten/query",
                        data:{
                            '_token':'<?php echo csrf_token() ?>',
                            'operation':operation,
                            'describe':describe,
                            'account':account,
                            'ciphertext':ciphertext
                        },
                        cache:"false",
                        async:"",
                        dataType:"json",
                        success: function (res) {
                            if (res.code == 200){
                                $(that).next().html(res.data);
                            }else {
                                $(that).next().html(res.msg);
                            }
                        },
                        error: function () {

                        }
                    });
                });
            });
        </script>
    </body>
</html>
