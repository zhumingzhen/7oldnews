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
            }
        </style>
    </head>
    <body>
        <table class="table">
            <caption>goodwritten</caption>
            <thead>
            <tr>
                <th>describe</th>
                <th>account</th>
                <th>ciphertext</th>
                <th>operation</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">163邮箱</th>
                <td>itdream6@163.com</td>
                <td>sddagfdgd15sda</td>
                <td>
                    <input type="text" placeholder="密钥">
                    <button type="button" class="btn btn-default submit">查看密码</button>
                </td>
            </tr>
            <tr>
                <th scope="row">邮箱</th>
                <td>z.it1.me</td>
                <td>121dsfdsfsd</td>
                <td>
                    <input type="text" placeholder="密钥">
                    <button type="button" class="btn btn-default submit">查看密码</button>
                </td>
            </tr>
            <tr>
                <th scope="row">工资卡</th>
                <td>88888888</td>
                <td>88888888</td>
                <td>
                    <input type="text" placeholder="密钥">
                    <button type="button" class="btn btn-default submit">查看密码</button>
                </td>
            </tr>
            </tbody>
        </table>
        <script>
            $(document).ready(function(){
                $(".submit").bind('click',function () {
                    var val = $(this).prev().val();
                    alert(val);
                });
            });
        </script>
    </body>
</html>
