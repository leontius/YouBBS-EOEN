<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<div class="title">
       <i class="fa fa-angle-double-right"></i> ',$c_obj['name'],'(',$c_obj['articles'],')';
        if($cur_user && $cur_user['flag']>=99){
            echo ' &nbsp;<i class="fa fa-pencil-square-o"></i> <a href="/admin-node-',$c_obj['id'],'#edit">编辑</a>';
        }
echo '    <div class="c"></div>
</div>

<div class="main-box home-box-list">';

if($c_obj['about']){
    echo '<div class="post-list grey"><div class="nodesm">',$c_obj['about'],'</div></div>';
}

foreach($articledb as $article){
echo '
<div class="post-list">
    <div class="item-avatar"><a href="/user/',$article['uid'],'">';
if($is_spider){
    echo '<img src="/avatar/normal/',$article['uavatar'],'.png" alt="',$article['author'],'" />';
}else{
    echo '<img src="/static/grey.gif" data-original="/avatar/normal/',$article['uavatar'],'.png" alt="',$article['author'],'" />';
}
echo '    </a></div>
    <div class="item-content">
        <h1><a href="/topics/',$article['id'],'">',$article['title'],'</a></h1>
        <span class="item-date"><i class="fa fa-user"></i> <a href="/user/',$article['uid'],'">',$article['author'],'</a>';
if($article['comments']){
    echo '&nbsp;&nbsp; <i class="fa fa-calendar"></i> ',$article['edittime'],'&nbsp;&nbsp;  <i class="fa fa-user-secret"></i> 最后回复来自 <a href="/user/',$article['ruid'],'">',$article['rauthor'],'</a>';
}else{
    echo ' •  ',$article['addtime'];
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
    echo '<div class="item-count"><a href="/t-',$article['id'],$c_page,'#reply',$article['comments'],'">',$article['comments'],'</a></div>';
}
echo '    <div class="c"></div>
</div>';

}

if($c_obj['articles'] > $options['list_shownum']){ 
echo '<div class="pagination">';
if($page>1){
echo '<a href="/n-',$cid,'-',$page-1,'" class="float-left">&laquo; 上一页</a>';
}
if($page<$taltol_page){
echo '<a href="/n-',$cid,'-',$page+1,'" class="float-right">下一页 &raquo;</a>';
}
echo '<div class="c"></div>
</div>';
}


echo '</div>';


?>