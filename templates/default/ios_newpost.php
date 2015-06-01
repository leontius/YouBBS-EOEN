<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

echo '
<form action="',$_SERVER["REQUEST_URI"],'" method="post">
<input type="hidden" name="formhash" value="',$formhash,'" />
<div class="title"><i class="fa fa-angle-double-right"></i> 创作新主题</div>
<div class="main-box">';
if($tip){
    echo '<div id="closes" class="redbox"><i class="fa fa-info-circle"></i> ',$tip,'<span id="close"><i class="fa fa-times"></i></span></div>';
}
echo '
<p class="newp"><select name="select_cid" class="form-control">';
foreach($main_nodes_arr as $n_id=>$n_name){
        if($cid == $n_id){
            $sl_str = ' selected="selected"';
        }else{
            $sl_str = '';
        }
        echo '<option value="',$n_id,'"',$sl_str,'>',$n_name,'</option>';
	}
echo '</select></p>
<p class="newp"><input type="text" name="title" value="',htmlspecialchars($p_title),'" class="sll nw100" placeholder="请填写标题"/></p>
<p class="newp"><textarea id="id-content" name="content" class="mll nw100 tall">',htmlspecialchars($p_content),'</textarea></p>
<p><input type="submit" value=" 发布主题 " name="submit" class="textbtn nw98" /></p>
</form>
<div class="c"></div>
</div>';


?>
