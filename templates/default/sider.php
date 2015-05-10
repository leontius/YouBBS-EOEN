<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

$c_obj = $DBS->fetch_one_array("SELECT * FROM yunbbs_categories WHERE id='".$cid."'");
if($cid<1){
	$cid=1;
}
if(isset($site_infos)){
	if($cur_user && $cur_user['flag']>=99){
	echo '
	<div class="sider-box">
		<div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 管理员面板</div>
		<div class="sider-box-content">
		<div class="btn">
		<a href="/admin-node">分类管理</a><a href="/admin-setting">网站设置</a><a href="/admin-user-list">用户管理</a><a href="/admin-link-list">链接管理</a>
		</div>
		<div class="c"></div>
		</div>
	</div>';
	}
}
if($cur_user && $cur_user['flag']<2){
	echo'<div class="sider-box">
			<div class="sider-box-content">';
	if($cur_user['flag'] == 0){
        echo '<div class="notpad"><i class="fa fa-times-circle"></i> 您的帐户已被禁用！</div>';
    }else if($cur_user['flag'] == 1){
        echo '<div class="notpad"><i class="fa fa-exclamation-triangle"></i> 您的帐户在等待审核！</div>';
    }
	echo'<div class="c"></div>
	</div>
</div>';
}

if($cur_user && $cur_user['flag']>=5){
echo '
<div class="sider-box">
    <div class="sider-box-content">
	<div class="user">
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<tbody>
				<tr>
					<td width="73" valign="top"><img src="/avatar/large/',$cur_user['avatar'],'.png" class="avatar" border="0" align="default" style="max-width: 73px; max-height: 73px;border-radius: 8px;border: 1px solid #E2E2E2;"></td>
					<td width="10" valign="top"></td>
					<td width="auto" align="left"><span class="bigger"><a href="/user/',$cur_user['id'],'" style="color:#444;text-decoration: none;font-size: 23px;">',$cur_user['name'],'</a></span><br/><br/><a href="/newpost/',$cid,'" rel="nofollow"><i class="fa fa-pencil-square-o" style="font-size: 25px;color: #444;"><span style="font-size: 13px; font-weight: bold;">创作新主题</span></i></a></td>
				</tr>
			</tbody>
		</table><div class="notic">';
		if($cur_user['notic']){
        $notic_n = count(array_unique(explode(',', $cur_user['notic'])))-1;
		echo'<a href="/notifications" class="rightnotic"><i class="fa fa-bell"></i> ',$notic_n,' 条未读提醒</a>';
		}else{
		echo'<a href="/notifications" class="rightnotic"><i class="fa fa-bell"></i> 0 条未读提醒</a>';
		}
		if($cur_user['flag'] == 5){
        echo'<a href="/user/',$cur_user['id'],'" class="leftnotic"><i class="fa fa-user"></i> 普通会员</a>';
		}else{
		if($cur_user['flag'] == 99){
        echo'<a href="/user/',$cur_user['id'],'" class="leftnotic"><i class="fa fa-user-secret"></i> 管理员</a>';
			}
		}
echo'</div>
	</div>
    <div class="c"></div>
    </div>
</div>';
}

if($options['ad_sider_top']){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 广而告之</div>
    <div class="sider-box-content">',$options['ad_sider_top'],'
    <div class="c"></div>
    </div>
</div>';
}


if($options['close']){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 网站暂时关闭公告</div>
    <div class="sider-box-content">
    <h2>';
if($options['close_note']){
    echo $options['close_note'];
}else{
    echo '数据调整中。。。';
}
echo '</h2>
    <div class="c"></div>
    </div>
</div>';

}


if(isset($newpost_page)){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 发帖提示</div>
	<div class="sider-box-content">
	<div class="newpostt">
		<h1><i class="fa fa-hand-o-right"></i> 选择版块</h1>
		<p>请为你的主题选择一个节点。恰当的归类会让你发布的信息更加有用。<p>
		<h1><i class="fa fa-hand-o-right"></i> 主题标题</h1>
		<p>请在标题中描述内容要点。如果一件事情在标题的长度内就已经可以说清楚，那就没有必要写正文了。</p>
		<h1><i class="fa fa-hand-o-right"></i> 主题正文</h1>
		<p>可以在正文中为你要发布的主题添加更多细节，正文为纯文本格式不支持HTML等文本标记语法。</p>
		<h1><i class="fa fa-hand-o-right"></i> 字数限制</h1>
		<p>主题标题<',$options['article_title_max_len'],'字，主题内容<',$options['article_content_max_len'],'字。</p>
	</div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($newpost_page)){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 社区指导原则</div>
	<div class="sider-box-content">
	<div class="newpostt">
		<h1><i class="fa fa-heart"></i> 友好互助</h1>
		<p>保持对陌生人的友善。用知识去帮助别人。</p>
	</div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($bot_nodes)){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 最热主题</div>
    <div class="sider-box-content">
    <div class="btn">';
foreach(array_slice($bot_nodes, 0, intval($options['hot_node_num']), true) as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '    </div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($newest_nodes) && $newest_nodes){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 最近添加的节点</div>
    <div class="sider-box-content">
    <div class="btn">';
foreach( $newest_nodes as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '    </div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($links) && $links){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 友好链接</div>
    <div class="sider-box-content">
    <div class="btn">';
foreach( $links as $k=>$v ){
    echo '<a href="',$v,'" target="_blank">',$k,'</a>';
}
echo '    </div>
    <div class="c"></div>
    </div>
</div>';
}

if(isset($site_infos)){
echo '
<div class="sider-box">
    <div class="sider-box-title"><i class="fa fa-angle-double-right"></i> 运行信息</div>
    <div class="sider-box-content">
    <ul>';
foreach($site_infos as $k=>$v){
    echo '<li>',$k,': ',$v,'</li>';
}
echo '    </ul>
    <div class="c"></div>
    </div>
</div>';
} 
?>
