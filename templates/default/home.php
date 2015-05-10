<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<div class="title">
    <div class="float-left"><i class="fa fa-angle-double-right"></i> 最新发布的主题</div>
	<div class="float-right"><i class="fa fa-rss"></i> <a href="/feed" target="_blank">RSS订阅</a></div>
	<div class="c"></div>
</div>
<div class="main-box home-box-list">';

foreach($articledb as $article){
echo '
<div class="post-list">
    <div class="item-avatar"><a href="/user/',$article['uid'],'">';
if(!$is_spider){
    echo '<img src="/avatar/large/',$article['uavatar'],'.png" alt="',$article['author'],'" />';
}else{
    echo '<img src="/static/grey.gif" data-original="/avatar/large/',$article['uavatar'],'.png" alt="',$article['author'],'" />';
}
echo '    </a></div>
    <div class="item-content">
        <h1><a href="/topics/',$article['id'],'">',$article['title'],'</a></h1>
        <span class="item-date"><i class="fa fa-tags"></i> <a href="/nodes/',$article['cid'],'">',$article['cname'],'</a>&nbsp;&nbsp;<i class="fa fa-user"></i> <a href="/user/',$article['uid'],'">',$article['author'],'</a>';
if($article['comments']){
    echo '&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$article['edittime'],'&nbsp;&nbsp;<i class="fa fa-user-secret"></i> 最后回复来自 <a href="/user/',$article['ruid'],'">',$article['rauthor'],'</a>';
}else{
    echo '&nbsp;&nbsp;<i class="fa fa-calendar"></i> ',$article['addtime'];
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
    echo '<div class="item-count"><a href="/topics/',$article['id'],$c_page,'#reply',$article['comments'],'">',$article['comments'],'</a></div>';
}
echo '    <div class="c"></div>
</div>';

}


if(count($articledb) == $options['home_shownum']){ 
echo '<div class="pagination">';
echo '<a href="/page/2" class="float-right">下一页 &raquo;</a>';
echo '<div class="c"></div>
</div>';
}


echo '</div>';

if(isset($bot_nodes)){
echo '
<div class="title">热门分类</div>
<div class="main-box main-box-node">
<span class="btn">';
foreach( $bot_nodes as $k=>$v ){
    echo '<a href="/',$k,'">',$v,'</a>';
}
echo '
</span>
<div class="c"></div>

</div>';
}

?>
