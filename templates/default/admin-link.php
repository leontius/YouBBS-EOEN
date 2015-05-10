<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<a name="add"></a>
<div class="title">
   <i class="fa fa-angle-double-right"></i> 添加链接
</div>

<div class="main-box">';
if($tip1){
    echo '<p class="red">',$tip1,'</p>';
}

echo '
<form action="',$_SERVER["REQUEST_URI"],'#add" method="post">
<input type="hidden" name="action" value="add"/>
<p>链接名： <input type="text" class="sl w100" name="name" value="" />
网址： <input type="text" class="sl w200" name="url" value="" />
<input type="submit" value=" 添 加 " name="submit" class="textbtn" /></p>
</form>
</div>';


if($l_obj){
echo '
<a name="edit"></a>
<div class="title"><i class="fa fa-angle-double-right"></i> 修改链接</div>

<div class="main-box">';
if($tip2){
    echo '<p class="red">',$tip2,'</p>';
}

echo '
<form action="',$_SERVER["REQUEST_URI"],'#edit" method="post">';

echo '
<input type="hidden" name="action" value="edit"/>
<p>链接名： <input type="text" class="sl w100" name="name" value="',htmlspecialchars($l_obj['name']),'" />
网址： <input type="text" class="sl w200" name="url" value="',htmlspecialchars($l_obj['url']),'" />
<input type="submit" value=" 保 存 " name="submit" class="textbtn" /></p>
</form>
</div>';
}

if($linkdb){
echo '
<a name="list"></a>
<div class="title"><i class="fa fa-angle-double-right"></i> 链接列表</div>

<div class="main-box">';
echo '
<ul class="user-list">';
foreach($linkdb as $link){
    echo '<li><i class="fa fa-diamond"></i> <a href="',$link['url'],'" target="_blank">',$link['name'],'</a>&nbsp;&nbsp;<span class="centli"><i class="fa fa-link"></i> ',$link['url'],'</span><span class="reghtlink"><a href="/admin-link-edit-',$link['id'],'#1" title="编辑"><i class="fa fa-pencil-square-o"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/admin-link-del-',$link['id'],'#list" title="删除"><i class="fa fa-times"></i></a></span></li>';
}

echo '</ul>
</div>';
}

?>
