<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<div class="title">
   <i class="fa fa-angle-double-right"></i> 个人收藏的主题 (',$user_fav['articles'],')
</div>

<div class="main-box home-box-list">';

if($articledb){

foreach($articledb as $article){
echo '
<div class="post-list">
    <div class="item-avatar"><a href="/user/',$article['uid'],'"><img src="/avatar/normal/',$article['uavatar'],'.png" alt="',$article['author'],'" /></a></div>
    <div class="item-content count',$article['comments'],'">
        <h1><a href="/topics/',$article['id'],'">',$article['title'],'</a></h1>
        <span class="item-date"><i class="fa fa-tags"></i><a href="/nodes/',$article['cid'],'">',$article['cname'],'</a>';
if($article['comments']){
    echo '&nbsp;&nbsp;<i class="fa fa-user"></i><a href="/user/',$article['ruid'],'">',$article['rauthor'],'</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i>',$article['edittime'],'回复';
}else{
    echo '&nbsp;&nbsp;<i class="fa fa-user"></i><a href="/user/',$article['uid'],'">',$article['author'],'</a>&nbsp;&nbsp;<i class="fa fa-calendar"></i>',$article['addtime'],'发表';
}
echo '&nbsp;&nbsp;<i class="fa fa-star-o"></i><a href="/favorites?act=del&id=',$article['id'],'">取消</a></span>
    </div>';
if($article['comments']){
    $gotopage = ceil($article['comments']/$options['commentlist_num']);
    if($gotopage == 1){
        $c_page = '';
    }else{
        $c_page = '-'.$gotopage;
    }
    echo '<div class="item-count"><a href="/topics/',$article['id'],'">',$article['comments'],'</a></div>';
}
echo '    <div class="c"></div>
</div>';

}


if($user_fav['articles'] > $options['list_shownum']){ 
echo '<div class="pagination">';
if($page>1){
echo '<a href="/favorites?page=',$page-1,'" class="float-left">&laquo; 上一页</a>';
}
if($page<$taltol_page){
echo '<a href="/favorites?page=',$page+1,'" class="float-right">下一页 &raquo;</a>';
}
echo '<div class="c"></div>
</div>';
}


}else{
    echo '<p>&nbsp;&nbsp;&nbsp;暂无收藏主题</p>';
}

echo '</div>';

?>