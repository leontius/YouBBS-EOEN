<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<form action="',$_SERVER["REQUEST_URI"],'" method="post">
<div class="title">
    <i class="fa fa-angle-double-right"></i> 修改帖子 <i class="fa fa-angle-double-right"></i> 
    <select name="select_cid">';
foreach($all_nodes as $n_id=>$n_name){
    if($t_obj['cid'] == $n_id){
        $sl_str = ' selected="selected"';
    }else{
        $sl_str = '';
    }
    echo '<option value="',$n_id,'"',$sl_str,'>',$n_name,'</option>';
}

echo '
</select>
</div>

<div class="main-box">';
if($tip){
    echo '<p class="red">',$tip,'</p>';
}

echo '

<p>
<input type="text" name="title" value="',$p_title,'" class="sll" />
</p>
<p><textarea id="id-content" name="content" class="mll tall">',$p_content,'</textarea></p>
<p>
<label><input type="checkbox" name="closecomment" value="1" ',$t_obj['closecomment'],'/> 关闭评论</label>&nbsp;&nbsp;
<label><input type="checkbox" name="visible" value="1" ',$t_obj['visible'],'/> 显示帖子</label>&nbsp;&nbsp;
<label><input type="checkbox" name="top" value="1" ',$t_obj['top'],'/> 首页置顶</label>&nbsp;&nbsp;
<label><input type="checkbox" name="fop" value="1" ',$t_obj['fop'],'/> 版块置顶</label>&nbsp;&nbsp;
<label><input type="checkbox" name="isred" value="1" ',$t_obj['isred'],'/> 推荐帖子</label>
</p>';

if(!$options['close_upload']){
    include(dirname(__FILE__) . '/upload.php');
}

echo '
<div class="float-right" style="margin-top: -30px;"><input type="submit" value=" 保 存 " name="submit" class="textbtn" /></div>
</form>

</div>';


?>
