<?php

$login = array(
  'name' => 'frmLogin',
  'id'   => 'frmLogin',
);

$user_id = array(
  'name'        => 'user_id',
  'id'          => 'user_id',
//  'value'     => set_value('user_id'),
  'class'       => 'input-large',
  'placeholder' => 'ユーザー名',
);

$password = array(
  'name'        => 'password',
  'id'          => 'password',
//  'value'     => set_value('password'),
  'class'       => 'input-large',
  'placeholder' => 'パスワード',
);

$next = array(
);

$submit = array(
  'name'  =>'submit',
  'id'    =>'submit',
  'class' =>'btn btn-success',
);

?>
<div class="container" style="margin-top: 150px;">
  <div class="hero-unit" style="padding-top: 80px; padding-bottom: 80px;">
    <div class="row-fluid">
      <div class="span7" style="border-right: 1px solid #ddd;">
        <h2>Shift Management System</h2>
        <h1>SMS</h1>
        <p style="margin-top: 1em;"><b>アヴァンセが辿り着いた究極のシフト管理システム</b></p>
      </div>
      <div class="span5">
        <h4 style="line-height: 3em;">ログイン</h4>

        <?=validation_errors('<div class="alert alert-error">', '</div>');?>
        <?=form_open_multipart('auth/login/',$login)?>
        <?=form_input($user_id)?>
        <?=form_password($password)?>
<!--ボタンズレてるから封印・ヘルパー見直しが必要？
        <?=form_submit($submit,'ログイン')?>
-->
        <?=form_hidden($next)?>
        <?=form_close()?>

<!--救済処置は不要では？
        <a href="#" onclick="alert('教えません。');"><h5 style="margin-left: 1em;">ID・パスワードを忘れてしまった方</h5></a>
-->
      </div>
    </div><!-- /row -->
  </div>
</div>

<script type="text/javascript">
  onload = function(){
    $("#user_id").focus();
  }
</script>
