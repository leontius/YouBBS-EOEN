<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<div class="title">
    <i class="fa fa-angle-double-right"></i> <a href="/nodes/',$c_obj['id'],'">',$c_obj['name'],'</a> (',$c_obj['articles'],')
	<div class="c"></div>
</div>

<div class="main-box">
<div class="topic-title">
    <div class="topic-title-main float-left">
        <h1>',$t_obj['title'],'</h1>
        <div class="topic-title-date">
        <i class="fa fa-user"></i> <a href="/member/',$t_obj['uid'],'">',$t_obj['author'],'</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$t_obj['addtime'],'&nbsp;&nbsp;<i class="fa fa-eye"></i> ',$t_obj['views'],'阅读';
if($cur_user && $cur_user['flag']>4){
    if(!$t_obj['closecomment']){
        echo '&nbsp;&nbsp;<i class="fa fa-comments"></i> <a href="#new-comment">回复</a>';
    }
}


echo '        </div>
    </div>
    <div class="detail-avatar"><a href="/user/',$t_obj['uid'],'">';
if($is_spider){
    echo '<img src="/avatar/large/',$t_obj['uavatar'],'.png" alt="',$t_obj['author'],'" />';
}else{
    echo '<img src="/static/grey.gif" data-original="/avatar/large/',$t_obj['uavatar'],'.png" alt="',$t_obj['author'],'" />';
}
echo '    </a></div>
    <div class="c"></div>
</div>
<div class="topic-content">
',$options['ad_post_top'],'
<p>',$t_obj['content'],'</p>
',$options['ad_post_bot'],'
<div class="topic-title-date"></div>
<div class="tagge">';
if($t_obj['favorites']){
    echo '&nbsp;&nbsp; <i class="fa fa-star"></i>',$t_obj['favorites'],'收藏';
}
if($cur_user && $cur_user['flag']>4){
    if($in_favorites){
        echo '&nbsp;&nbsp; <a href="/favorites?act=del&id=',$t_obj['id'],'" title="点击取消收藏"><i class="fa fa-star-o"></i> 取消收藏</a>';
    }else{
        echo '&nbsp;&nbsp; <a href="/favorites?act=add&id=',$t_obj['id'],'" title="点击收藏"><i class="fa fa-star"></i> 收藏</a>';
    }
    if($cur_user['flag']>=99){
        echo '&nbsp;&nbsp; <a href="/admin-edit-post-',$t_obj['id'],'"><i class="fa fa-pencil-square"></i> 编辑</a>';
    }
}
echo'&nbsp;&nbsp; <span class="right"><i class="fa fa-eye"></i> ',$t_obj['views'],'阅读</span></div>
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
        <div class="commont-avatar"><a href="/user/',$comment['uid'],'">';
if($is_spider){
    echo '    <img src="/avatar/normal/',$comment['avatar'],'.png" alt="',$comment['author'],'" />';
}else{
    echo '    <img src="/static/grey.gif" data-original="/avatar/normal/',$comment['avatar'],'.png" alt="',$comment['author'],'" />';
}
echo '</a></div>
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
</script>

';

}else{
    echo '<div class="no-comment">目前尚无回复</div>';
}

if($t_obj['closecomment']){
    echo '<div class="no-comment">该帖评论已关闭</div>';
}else{

if($cur_user && $cur_user['flag']>4){
echo '

<a name="new-comment"></a>
<div class="title">
    <div class="float-left">添加一条新回复</div>
    <div class="float-right"><a href="#"><i class="fa fa-chevron-up"></i> 回到顶部</a></div>
    <div class="c"></div>    
</div>
<div class="main-box">';
if($tip){
    echo '<p class="red">',$tip,'</p>';
}
echo '    <form action="',$_SERVER["REQUEST_URI"],'#new-comment" method="post">
<input type="hidden" name="formhash" value="',$formhash,'" />
    <p><textarea id="id-content" name="content" class="comment-text mll">',htmlspecialchars($c_content),'</textarea></p>';
/*
if(!$options['close_upload']){
    include(dirname(__FILE__) . '/upload.php');  //回复最好不要上传附件
}
*/
echo '
    <p>
    <div class="float-right"><input type="submit" value=" 回 复 " name="submit" class="textbtn" /></div>
    <div class="float-left fs12 grey">请尽量让自己的回复能够对别人有帮助</div>
    <div class="c"></div> 
    </p>
    </form>
</div>
<!-- new comment end -->';

}else{
    echo '<div class="no-comment">请 <a href="/login" rel="nofollow">登录</a> 后发表评论</div>';
}


}

?>