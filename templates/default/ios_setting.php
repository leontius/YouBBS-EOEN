<?php
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied');
echo '
<a name="1"></a>
<div class="title"><i class="fa fa-angle-double-right"></i> 个人信息</div>
<div class="main-box">';

if($tip1){
    echo '<div class="reedos"><i class="fa fa-info-circle"></i> ',$tip1,'</div>';
}
echo '
<form method="post" action="',$_SERVER["REQUEST_URI"],'#1">
<input type="hidden" name="action" value="info"/>
<table cellpadding="5" cellspacing="8" border="0" width="100%" class="fs12">
    <tbody><tr>
        <td width="120" align="right">用户名</td>
        <td width="82%" align="left"><input class="sl wb80" disabled="disabled" name="username" type="text" value="',$cur_user['name'],'"></td>
    </tr>
    <tr>
        <td width="120" align="right" valign="top">电子邮件</td>
        <td width="auto" align="left"><input type="text" class="sl wb80" name="email" value="',htmlspecialchars(stripslashes($cur_user['email'])),'" /> <br/><span class="grey fs12"> 取回密码用</span></td>
    </tr>
    <tr>
        <td width="120" align="right">个人网站</td>
        <td width="auto" align="left"><input type="text" class="sl wb80" name="url" value="',htmlspecialchars(stripslashes($cur_user['url'])),'" /></td>
    </tr>
    <tr>
        <td width="120" align="right"></td>
        <td width="auto" align="left"><input type="submit" value="保存设置" name="submit" class="textbtn" /></td>
    </tr>

</tbody></table>
</form>

</div>';

if($cur_user['password']){

echo '
<a name="3"></a>
<div class="title"><i class="fa fa-angle-double-right"></i> 更改密码</div>
<div class="main-box">';
if($tip3){
    echo '<div class="reedos"><i class="fa fa-info-circle"></i> ',$tip1,'</div>';
}
echo '
<form method="post" action="',$_SERVER["REQUEST_URI"],'#3">
<input type="hidden" name="action" value="chpw" />
<table cellpadding="5" cellspacing="8" border="0" width="100%" class="fs12">
    <tbody>
    <tr>
        <td width="120" align="right">当前密码</td>
        <td width="65%" align="left"><input type="password" class="sl wb80" name="password_current" value="" /></td>
    </tr>
    <tr>
        <td width="120" align="right">新密码</td>
        <td width="auto" align="left"><input type="password" class="sl wb80" name="password_new" value="" /></td>
    </tr>
    <tr>
        <td width="120" align="right">再次输入新密码</td>
        <td width="auto" align="left"><input type="password" class="sl wb80" name="password_again" value="" /></td>
    </tr>
    <tr>
        <td width="120" align="right"></td>
        <td width="auto" align="left"><input type="submit" value="更改密码" name="submit" class="textbtn" /></td>
    </tr>

</tbody></table>
</form>

</div>';

}else{

echo '<a name="3"></a>
<div class="title">设置登录密码： 设置一个登录密码，以备急用</div>
<div class="main-box">';
if($tip3){
    echo '<div class="reedos"><i class="fa fa-info-circle"></i> ',$tip1,'</div>';
}
echo '
<form method="post" action="',$_SERVER["REQUEST_URI"],'#3">
<input type="hidden" name="action" value="setpw" />
<table cellpadding="5" cellspacing="8" border="0" width="100%" class="fs12">
    <tbody>
    <tr>
        <td width="120" align="right">这个是干嘛？</td>
        <td width="auto" align="left">当不用QQ登录时可以使用你的用户名和设置的密码登录</td>
    </tr>
    <tr>
        <td width="120" align="right">设置登录密码</td>
        <td width="auto" align="left"><input type="password" class="sl wb80" name="password_new" value="" /></td>
    </tr>
    <tr>
        <td width="120" align="right">再次输入密码</td>
        <td width="auto" align="left"><input type="password" class="sl wb80" name="password_again" value="" /></td>
    </tr>
    <tr>
        <td width="120" align="right"></td>
        <td width="auto" align="left"><input type="submit" value="设置登录密码" name="submit" class="textbtn" /></td>
    </tr>

</tbody></table>
</form>

</div>';

}

?>