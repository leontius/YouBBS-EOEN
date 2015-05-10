<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<div class="title">
    <i class="fa fa-angle-double-right"></i> 站内提醒（ 有人在下面的文章或回复提起了你 ）
</div>

<div class="main-box home-box-list">';

if($articledb){

foreach($articledb as $article){
echo '
<div class="post-list">
    <div class="item-avatar"><a href="/user/',$article['uid'],'">';
    echo '<img src="/static/grey.gif" data-original="/avatar/normal/',$article['uavatar'],'.png" alt="',$article['author'],'" />';
echo '    </a></div>
    <div class="item-content">
        <h1><a href="/notic/',$article['id'],'">',$article['title'],'</a></h1>
        <span class="item-date"><i class="fa fa-tags"></i> <a href="/nodes/',$article['cid'],'">',$article['cname'],'</a>&nbsp;&nbsp;<i class="fa fa-user"></i> <a href="/user/',$article['uid'],'">',$article['author'],'</a>';
if($article['comments']){
    echo '&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$article['edittime'],'&nbsp;&nbsp;<i class="fa fa-user-secret"></i> 最后回复来自 <a href="/user/',$article['ruid'],'">',$article['rauthor'],'</a>';
}else{
    echo '&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$article['addtime'];
}
echo '</span>
    </div>';
if($article['comments']){
    $gotopage = ceil($article['comments']/$options['commentlist_num']);
    if($gotopage == 1){
        $c_page = '';
    }else{
        $c_page = '-'.$gotopage;
    }
    echo '<div class="item-count"><a href="/notic/',$article['id'],'">',$article['comments'],'</a></div>';
}
echo '    <div class="c"></div>
</div>';

}

}else{
    echo '<p>&nbsp;&nbsp;&nbsp;暂无未读提醒</p>';
}

echo '</div>';

?>