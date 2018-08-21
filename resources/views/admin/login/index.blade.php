<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>后台内容管理系统登录登陆</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <link href="/static/public/css/base.css" rel="stylesheet" type="text/css">
    <link href="/static/public/css/login.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <?php echo '<pre>'; print_r(session()->all()); echo '</pre>';?>
    <div class="login">
      <form action="<?=route('admin.login.store')?>" method="post" id="form">
        <?= csrf_field()?>
        <div class="logo"></div>
        <div class="login_form">
          <div class="user">
            <input class="text_value" value="" name="name" type="text" id="username">
            <input class="text_value" value="" name="password" type="password" id="password">
          </div>
          <button class="button" id="submit" type="submit">登录</button>
        </div>

        <div id="tip"></div>
        <div class="foot">
          Copyright © 2011-2015  All Wen <a href="javascript:;" title="" target="_blank"></a>
        </div>
      </form>
    </div>
    
    <script>var basedir = '/static/public/ui/';</script>
    <script src="/static/public/ui/do.js"></script>
    <script src="/static/public/ui/config.js"></script>
    <script>
//      Do.ready('form', function () {
//        $("#form").Validform({
//          ajaxPost: true,
//          postonce: true,
//          tiptype: function (msg, o, cssctl) {
//            if (!o.obj.is("form")) {
//              var objtip = o.obj.siblings(".Validform_checktip");
//              cssctl(objtip, o.type);
//              objtip.text(msg);
//            } else {
//              var objtip = o.obj.find("#tip");
//              cssctl(objtip, o.type);
//              if (o.type == 2) {
//                window.location.href = 'index.php?r=admin/index/index';
//              } else {
//                objtip.text(msg);
//              }
//            }
//          }
//        });
//      });

    </script>
  </body>
</html>
