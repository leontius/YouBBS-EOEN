<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<div class="title">
        <i class="fa fa-angle-double-right"></i> <a href="/nodes/',$c_obj['id'],'">',$c_obj['name'],'</a> (',$c_obj['articles'],')';
	if($cur_user['notic']){
            $notic_n = count(array_unique(explode(',', $cur_user['notic'])))-1;
	echo'<span class="nopic"><a href="/notifications"><i class="fa fa-bell"></i> 您有',$notic_n,'条消息</a></span>';
	}
echo '    <div class="c"></div>
</div>

<div class="main-box">
<div class="topic-title">
    <div class="topic-title-main float-left">
        <h1>',$t_obj['title'],'</h1>
        <div class="topic-title-date">
        <i class="fa fa-calendar"></i>',$t_obj['addtime'],'&nbsp;&nbsp;<i class="fa fa-eye"></i>',$t_obj['views'],'阅读';
if($t_obj['favorites']){
    echo '&nbsp;&nbsp;<i class="fa fa-star"></i>',$t_obj['favorites'],'收藏';
}
if($cur_user && $cur_user['flag']>4){
    if($in_favorites){
        echo '&nbsp;&nbsp;<i class="fa fa-star-o"></i><a href="/favorites?act=del&id=',$t_obj['id'],'" title="取消收藏">取消</a>';
    }else{
        echo '&nbsp;&nbsp;<i class="fa fa-star"></i><a href="/favorites?act=add&id=',$t_obj['id'],'" title="收藏">收藏</a>';
    }
	if($cur_user['flag']>=99){
        echo '&nbsp;&nbsp;<i class="fa fa-pencil-square"></i><a href="/admin-edit-post-',$t_obj['id'],'">编辑</a>';
    }
}
echo '        </div>
    </div>
    <div class="detail-avatar"><a href="/user/',$t_obj['uid'],'"><img src="/avatar/normal/',$t_obj['uavatar'],'.png" alt="',$t_obj['author'],'" />    </a></div>
    <div class="c"></div>
</div>
<div class="topic-content">

<p>',$t_obj['content'],'</p>

</div>

</div>
<!-- post main content end -->';

if($t_obj['comments']){
echo '
<div class="title">
    ',$t_obj['comments'],' 回复  |  直到 ',$t_obj['edittime'],'
</div>
<div class="main-box home-box-list">';

$count_n = ($page-1)*$options['commentlist_num'];
foreach($commentdb as $comment){
$count_n += 1;
echo '
    <div class="commont-item">
        <div class="commont-avatar"><a href="/user/',$comment['uid'],'"><img src="/avatar/mini/',$comment['avatar'],'.png" alt="',$comment['author'],'" /></a></div>
        <div class="commont-data">
            <div class="commont-content">
            <p>',$comment['content'],'</p>
            </div>
            
            <div class="commont-data-date">
                <div class="float-left"><i class="fa fa-user"></i> <a href="/user/',$comment['uid'],'">',$comment['author'],'</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$comment['addtime'];
if($cur_user && $cur_user['flag']>=99){
    echo '&nbsp;&nbsp;<i class="fa fa-pencil-square"></i> <a href="/admin-edit-comment-',$comment['id'],'">编辑</a>';
}
                echo '</div>
                <div class="float-right">';
if(!$t_obj['closecomment'] && $cur_user && $cur_user['flag']>4 && $cur_user['name'] != $comment['author']){
    echo '<i class="fa fa-reply"></i> <a href="#new-comment" onclick="replyto(\'',$comment['author'],'\');">回复</a>'; 
}
echo '                <span class="commonet-count">',$count_n,'</span></div>
                <div class="c"></div>
            </div>
            <div class="c"></div>
        </div>
        <div class="c"></div>
    </div>';
}

if($t_obj['comments'] > $options['commentlist_num']){ 
echo '<div class="pagination">';
if($page>1){
echo '<a href="/topics/',$tid,'/',$page-1,'" class="float-left">&laquo; 上一页</a>';
}
if($page<$taltol_page){
echo '<a href="/topics/',$tid,'/',$page+1,'" class="float-right">下一页 &raquo;</a>';
}
echo '<div class="c"></div>
</div>';
}

echo '
    
</div>
<!-- comment list end -->

<script type="text/javascript">
function replyto(somebd){
    var con = document.getElementById("id-content").value;
    document.getElementsByTagName(\'textarea\')[0].focus();
    document.getElementById("id-content").value = " @"+somebd+" " + con;
}
</script>';

}else{
    echo '<div class="no-comment">目前尚无回复</div>';
}

if($t_obj['closecomment']){
    echo '<div class="no-comment">该帖评论已关闭</div>';
}else{

if($cur_user && $cur_user['flag']>4){

echo '<a name="new-comment"></a>
<div class="title">
    <div class="float-left">添加一条新回复</div>
    <div class="float-right"><a href="#"><a href="#"><i class="fa fa-chevron-up"></i> 回到顶部</a></div>
    <div class="c"></div>    
</div>
<div class="main-box">';
if($tip){
    echo '<p class="red">',$tip,'</p>';
}
echo '    <form action="',$_SERVER["REQUEST_URI"],'#new-comment" method="post">
<input type="hidden" name="formhash" value="',$formhash,'" />
    <p><textarea id="id-content" name="content" class="comment-text mll wb96">',htmlspecialchars($c_content),'</textarea></p>
    <p><input type="submit" value=" 提 交 " name="submit" class="textbtn wb96" /></p>
    <p class="fs12 grey">请尽量让自己的回复能够对别人有帮助</p>
    </form>
</div>
<!-- new comment end -->';

}else{
    echo '<div class="no-comment">请 <a href="/login" rel="nofollow">登录</a> 后发表评论</div>';
}

}


?>