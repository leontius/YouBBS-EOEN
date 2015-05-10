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
    <div class="item-avatar"><a href="/user/',$article['uid'],'"><img src="/avatar/normal/',$article['uavatar'],'.png" alt="',$article['author'],'" /></a></div>
    <div class="item-content count',$article['comments'],'">
        <h1><a href="/notic/',$article['id'],'">',$article['title'],'</a></h1>
        <span class="item-date"><i class="fa fa-tags"></i> <a href="/nodes/',$article['cid'],'">',$article['cname'],'</a>';
if($article['comments']){
    echo '&nbsp;&nbsp;<i class="fa fa-user"></i> <a href="/user/',$article['ruid'],'">',$article['rauthor'],'</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$article['edittime'],'回复';
}else{
    echo '&nbsp;&nbsp;<i class="fa fa-user"></i> <a href="/user/',$article['uid'],'">',$article['author'],'</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$article['addtime'],'发表';
}
echo '        </span>
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