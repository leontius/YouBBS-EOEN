<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 
ob_start();

echo '<!doctype html>
<html lang="zh-cmn-Hans">
<head>
<meta charset="utf-8">
<title>',$title,'</title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link href="/static/default/style_ios.css" rel="stylesheet" type="text/css" />
<link href="/static/default/awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />';
if($cur_user){
	echo'
<script src="',$options['jquery_lib'],'" type="text/javascript"></script>';
	}else{
		echo'
<script src="',$options['jquery_lib'],'" type="text/javascript"></script>
<script src="/static/js/jquery.contip.js" type="text/javascript"></script>';
}
if($options['head_meta']){
    echo $options['head_meta'];
}

if(isset($meta_des) && $meta_des){
    echo '<meta name="description" content="',$meta_des,'" />';
}
if(isset($canonical)){
    echo '<link rel="canonical" href="http://',$_SERVER['HTTP_HOST'],$canonical,'" />';
}

echo '
</head>
<body oncontextmenu=self.event.returnValue=false>
<div class="header-wrap">
    <div class="header">
        <div class="logo"><a href="/" name="top">',htmlspecialchars($options['name']),'</a></div>
        <div class="banner">';
        
if($cur_user){
    echo '<a href="/favorites"><i class="fa fa-star"></i>收藏</a>
		  <a href="/setting"><i class="fa fa-cog"></i>设置</a>
		  <a id="translateLink"><i class="fa fa-language"></i>繁體</a>
		  <a href="/logout"><i class="fa fa-sign-out"></i>退出</a>';
}else{
    if($options['wb_key'] && $options['wb_secret']){
        echo '<a href="/wblogin" rel="nofollow"><i class="fa fa-weibo"></i> 微博登陆</a>';
    }
    if($options['qq_appid'] && $options['qq_appkey']){
        echo '<a href="/qqlogin" rel="nofollow"><i class="fa fa-qq"></i> QQ登录</a>';
    }
    echo '<a id="translateLink"><i class="fa fa-language"></i>繁體</a><a href="/login" rel="nofollow"><i class="fa fa-sign-in"></i>登录</a>';
    if(!($options['wb_key'] && $options['wb_secret']) && !($options['qq_appid'] && $options['qq_appkey'])){
        if(!$options['close_register']){
            echo '<a href="/sigin"><i class="fa fa-user-plus"></i>注册</a>';
        }
    }
}
echo '       </div>
        <div class="c"></div>
    </div>
    <!-- header end -->
</div>

<div class="main-wrap">
    <div class="main">
        <div class="main-content">';

if($options['close']){
echo '
<div class="tiptitle"><i class="fa fa-angle-double-right"></i> 网站暂时关闭公告 &raquo; 
<span style="color:yellow;">';
if($options['close_note']){
    echo $options['close_note'];
}else{
    echo '数据调整中。。。';
}
echo '</span>
</div>';
}

if($cid<1){
	$cid=1;
}
if($cur_user && $cur_user['flag']>=5){
echo '
    <div class="main-box main-box-node">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tbody>
				<tr>
					<td width="50" valign="top"><a href="/user/',$cur_user['id'],'"><img src="/avatar/large/',$cur_user['avatar'],'.png" class="avatar" border="0" align="default" style="max-width: 30px; max-height: 30px;border-radius: 2px;"></a></td>
					<td style="text-align: center;" width="auto" valign="top"><a href="/user/',$cur_user['id'],'" style="color:#333;text-decoration: none;font-size: 25px;">',$cur_user['name'],'</a></td>
					<td style="text-align: right;" width="auto" align="left"><a href="/newpost/',$cid,'" rel="nofollow"><i class="fa fa-pencil-square-o" style="font-size: 26px;color: #333;"><span style="font-size: 15px;">创作新主题</span></i></a></td>
				</tr>
			</tbody>
		</table>
    <div class="c"></div>
    </div>';
}

if($cur_user && $cur_user['flag']>=99){
echo '
<div class="title"><i class="fa fa-angle-double-right"></i> 管理员面板</div>
<div class="main-box main-box-node">
<div class="btn">
<a href="/admin-node">分类管理</a><a href="/admin-setting">网站设置</a><a href="/admin-user-list">用户管理</a><a href="/admin-link-list">链接管理</a>
<div class="c"></div>
</div>

</div>';
}

include($pagefile);

if(isset($newest_nodes) && $newest_nodes){
echo '
<div class="title"><i class="fa fa-angle-double-right"></i> 最近添加的节点</div>
<div class="main-box main-box-node">
<div class="btn">';
foreach( $newest_nodes as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '
<div class="c"></div>
</div>

</div>';
}


if(isset($bot_nodes)){
echo '
<div class="title"><i class="fa fa-angle-double-right"></i> 热门节点</div>
<div class="main-box main-box-node">
<div class="btn">';
foreach( $bot_nodes as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '
<div class="c"></div>
</div>

</div>';
}

echo '       </div>
        <!-- main-content end -->
        <div class="c"></div>
    </div>
    <!-- main end -->
    <div class="c"></div>
</div>

<div class="footer-wrap">
    <div class="footer">
    <div class="sep5"></div><div class="sep5"></div>
	<div style="float: left;font-size: 12px;"><i class="fa fa-asterisk fa-spin"></i> Proudly Powered by <a href="http://youbbs.sinaapp.com/" target="_blank">YouBBS</a></div><div class="sep5"></div>
    <div style="float: right;margin-top: -6px;font-size: 12px;"><i class="fa fa-heart"></i> Lovingly made by <a href="https://www.eoen.org/" target="_blank"><b>EOEN</b></a></div>
	<div class="sep5"></div><div class="c"></div>    </div>
    <!-- footer end -->
</div>';

if($options['ad_web_bot']){
    echo $options['ad_web_bot'];
}

if($options['analytics_code']){
    echo $options['analytics_code'];
}

echo '
<script src="/static/js/Language.js" type="text/javascript"></script>
<script type="text/javascript">
translateInitilization();
</Script>
</body>
</html>';

$_output = ob_get_contents();
ob_end_clean();

// 304
$etag = md5($_output);
if($_SERVER['HTTP_IF_NONE_MATCH'] == $etag){
    header("HTTP/1.1 304 Not Modified");
    header("Status: 304 Not Modified");
    header("Etag: ".$etag);
    exit;    
}else{
    header("Etag: ".$etag);
}

echo $_output;

?>
