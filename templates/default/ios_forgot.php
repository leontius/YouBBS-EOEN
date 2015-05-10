<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

foreach($errors as $error){
    echo '<div id="closes" class="errortipc"><i class="fa fa-info-circle"></i> ',$error,' <span id="close"><i class="fa fa-times"></i></span></div>';
}
echo '
<div class="title"><i class="fa fa-angle-double-right"></i> 取回密码</div>
<div class="main-box">
<p class="red fs12" style="margin-left:60px;"><i class="fa fa-bullhorn"></i> 请填写注册时提供的邮箱地址<br/>';

echo '</p>
<form action="',$_SERVER["REQUEST_URI"],'" method="post">
<p><label>用户名： <input type="text" name="name" class="sl wb50" value="',htmlspecialchars($name),'" /></label></p>
<p><label>邮　箱： <input type="text" name="email" class="sl wb50" value="" /></label></p>
<p><input type="submit" value=" ',$title,' " name="submit" class="textbtn" style="margin-left:60px;" /> </p>';
if($url_path == 'login'){
    if($options['close_register'] || $options['close']){
        echo '<p class="grey fs12">网站暂时关闭 或 已停止新用户注册 ';
    }else{
        echo '<p class="grey fs12">还没来过？<a href="/sigin">现在注册</a> ';
    }
}else{
    echo '<p class="grey fs12">又想起来了？<a href="/login">现在登录</a> ';
}
echo '</p>
</form>
</div>';
echo'
<script>
$(document).ready(function(){
  $("#close").click(function(){
    $("#closes").remove();
  });
});
</script>';

?>
