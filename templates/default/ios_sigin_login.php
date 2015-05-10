<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

foreach($errors as $error){
    echo '<div id="closes" class="errortipc"><i class="fa fa-info-circle"></i> ',$error,' <span id="close"><i class="fa fa-times"></i></span></div>';
}
echo '
<div class="title"><i class="fa fa-angle-double-right"></i> ',$title,'</div>
<div class="main-box">
<p class="red fs12">';
if($options['authorized']){
    echo '<i class="fa fa-bullhorn"></i> 社区必须登录才能访问，请先登录！<br/>';
}
if($options['register_review']){
    echo '<i class="fa fa-bullhorn"></i> 已设置注册用户验证，注册后需要管理员审核！ <br/>';
}

print_r($cur_user);
echo '</p>
<form action="',$_SERVER["REQUEST_URI"],'" method="post">
<input type="hidden" name="formhash" value="',$formhash,'" />
<p><label>用户名： <input type="text" name="name" class="name sl wb50" value="',htmlspecialchars($name),'" /></label></p>
<p><label>密　码： <input type="password" name="pw" class="pw sl wb50" value="" /></label></p>';

if($url_path == 'sigin'){
    if($regip){
        echo '<p class="red">一个ip最小注册间隔时间是 ',$options['reg_ip_space'],' 秒，请稍后再来注册。</p>';
    }else{
        echo '<p><label>重　复： <input type="password" name="pw2" class="pw2 sl wb50" value="" /></label></p>';
        echo '<p><label>验证码： <input type="text" name="seccode" class="seccode sl wb20" value="" /></label> <img src="/seccode.php" align="absmiddle" /></p>';
    }
}else{
    echo '<p><label>安全码： <input type="text" name="gauth" class="gauth sl wb50" value="" /></label></p>
	<p><label>验证码： <input type="text" name="seccode" class="seccode sl wb20" value="" /></label> <img src="/seccode.php" align="absmiddle" /></p>';
}

echo '<p><input type="submit" value="  ',$title,'  " name="submit" class="textbtn" style="margin-left:60px;" /> </p>';
if($url_path == 'login'){
    if($options['close_register'] || $options['close']){
        echo '<p class="grey fs12">&nbsp;&nbsp;<i class="fa fa-ban"></i> 网站暂时停止注册&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i> 忘记密码？<a href="/forgot">马上找回</a>';
    }else{
        echo '<p class="grey fs12">&nbsp;&nbsp;<i class="fa fa-user-plus"></i> 还没来过？<a href="/sigin">现在注册</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i> 忘记密码？<a href="/forgot">马上找回</a>';
    }
}else{
    echo '<p class="grey fs12">&nbsp;&nbsp;<i class="fa fa-user"></i> 已有用户？<a href="/login">现在登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i> 忘记密码？<a href="/forgot">马上找回</a>';
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
