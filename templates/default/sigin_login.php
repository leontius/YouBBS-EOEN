<?php 
if (!defined('IN_SAESPOT')) exit('error: 403 Access Denied'); 

foreach($errors as $error){
    echo '<div id="closes" class="errortipc"><i class="fa fa-info-circle"></i> ',$error,' <span id="close"><i class="fa fa-times"></i></span></div>';
}
echo '
<div class="title"><i class="fa fa-angle-double-right"></i> ',$title,'</div>
<div class="main-box">
<div id="svglogo"></div>
<p class="red fs12" style="margin-left:68px;margin-bottom: 14px;">';
echo '</p>
<form action="',$_SERVER["REQUEST_URI"],'" method="post">
<input type="hidden" name="formhash" value="',$formhash,'" />
<p><label>登录名： <input type="text" name="name" class="name sl w200" value="',htmlspecialchars($name),'" /></label></p>
<p><label>密　码： <input type="password" name="pw" class="pw sl w200" value="" /></label></p>';
if($url_path == 'sigin'){
    if($regip){
        echo '<p class="red">一个ip最小注册间隔时间是 ',$options['reg_ip_space'],' 秒，请稍后再来注册 或 让管理员把这个时间改小点。</p>';
    }else{
        echo '<p><label>重　复： <input type="password" name="pw2" class="pw2 sl w200" value="" /></label></p>';
        echo '<p><label>验证码： <input type="text" name="seccode" class="seccode sl w137" value="" /></label> <img src="/seccode.php" align="absmiddle" /></p>';
    }
}else{
    echo '<p><label>安全码： <input type="text" name="gauth" class="gauth sl w200" value="" /></label></p>
	<p><label>验证码： <input type="text" name="seccode" class="seccode sl w137" value="" /></label> <img src="/seccode.php" align="absmiddle" /></p>';
}

echo '<p><input type="submit" value=" ',$title,' " name="submit" class="textbtn" id="txtinbut"/> </p>';
if($url_path == 'login'){
    if($options['close_register'] || $options['close']){
        echo '<p class="grey fs12">&nbsp;&nbsp;<i class="fa fa-ban"></i> 网站暂时停止注册&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i> 忘记密码？<a href="/forgot">马上找回</a>';
    }else{
        echo '<p class="grey fs12">&nbsp;&nbsp;<i class="fa fa-user-plus"></i> 还没来过？<a href="/sigin">现在注册</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i> 忘记密码？<a href="/forgot">马上找回</a>';
    }
}else{
    echo '<p class="grey fs12">&nbsp;&nbsp;<i class="fa fa-user"></i> 已有用户？<a href="/login">现在登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-exclamation-triangle"></i> 忘记密码？<a href="/forgot">马上找回</a>';
}
echo '</p>
</form>
</div></div>';
echo '<div class="main-sider">';
		echo'<div class="sider-box">
			<div class="sider-box-title"><i class="fa fa-life-ring"></i> 站务信息</div>
			<div class="sider-box-content">';
			if($options['register_review']){
			echo'<span class="infoweb"><i class="fa fa-check-square-o"></i> 注册后需要管理员审核！ </span><br/>';
			}
			if($options['authorized']){
			echo'<span class="infoweb"><i class="fa fa-lock"></i> 只有登录用户才能访问，请先登录！</span> <br/>';
			}
		echo'<div class="c"></div>
			</div>
		</div>';		
		echo'
		<div class="sider-box">
			<div class="sider-box-title"><i class="fa fa-plus-square"></i> 第三方登录</div>
			<div class="sider-box-content">';
			if($options['wb_key'] && $options['wb_secret']){
			echo'<span class="sliderlogin"><a href="/wblogin" rel="nofollow"><i class="fa fa-weibo"></i> 微博登陆</a></span>';
			}
			if($options['qq_appid'] && $options['qq_appkey']){
			echo'<span class="sliderlogin"><a href="/qqlogin" rel="nofollow"><i class="fa fa-qq"></i> QQ登录</a></span>';
			}
			echo'<div class="c"></div>
			</div>
		</div>
	  </div>';
echo'
<script>
$(document).ready(function(){
  $("#close").click(function(){
    $("#closes").remove();
  });
});
</script>
<script type="text/javascript">
			(function( $ ){

				var svgData = {
					"svglogo" :
					{
						"strokepath" :
						[
							{
								"path": "M55.7,87.493c2.084,0.458,4.019,0.422,9.962-4.143c2.638-2.026,6.54-5.443,10.142-10.205l1.578-2.096    c13.492-17.944,45.078-59.955,90.701-57.677c37.619,2.745,64.299,31.157,77.125,82.173c0.438,1.732,0.701,2.8,0.996,3.612    c0.235,1.02,0.503,2.069,0.783,3.13h13.854c-0.664-2.134-1.301-4.444-1.817-6.658c-0.086-0.375-0.209-0.739-0.359-1.097    c-0.123-0.438-0.363-1.384-0.575-2.231c-2.033-8.084-7.439-29.564-20.536-49.765c-16.919-26.079-39.991-40.353-68.587-42.409    c-0.045-0.007-0.086-0.007-0.137-0.014C116.123-2.578,81.534,43.429,66.765,63.074l-1.552,2.06    c-4.043,5.344-8.821,8.673-10.467,9.637c-0.554,0.221-1.093,0.519-1.595,0.898c-2.067,1.565-3.077,4.236-2.521,6.769    C51.189,84.962,53.169,86.938,55.7,87.493z",
								"duration": 1400
							},
							{
								"path": "M126.539,180.379c-18.345,11.081-41.53,24.311-59.801,32.12c-3.374,1.444-4.938,5.342-3.498,8.717    c1.08,2.528,3.532,4.031,6.112,4.031c0.873,0,1.759-0.172,2.611-0.527c26.026-11.136,61.269-32.606,79.854-44.341H126.539z",
								"duration": 600
							},
							{
								"path": "M225.105,102.29c1.602-8.945,0.732-17.629-2.707-24.817c-4.278-8.952-12.266-15.432-23.086-18.753    c-15.886-4.861-35.136,3.963-52.782,24.171c-0.13,0.144-8.47,8.913-20.524,19.397h19.795c6.563-6.213,10.61-10.52,10.699-10.614    c10.715-12.271,26.56-24.035,38.92-20.25c7.276,2.231,12.327,6.194,15,11.784c2.521,5.27,2.864,12.021,1.136,19.081h13.549V102.29    z",
								"duration": 800
							},
							{
								"path": "M138.061,59.65c0.519-0.438,1.044-0.87,1.573-1.301c0.137-0.107,1.167-0.924,1.43-1.134    c4.625-3.541,9.557-6.694,14.743-9.356c4.894-2.521,9.811-4.28,15.772-5.523c1.975-0.409,2.405-0.452,3.884-0.603    c3.601-0.375,6.646-2.745,6.646-6.644c0-3.34-3.032-7.016-6.646-6.641c-24.01,2.484-44.544,17.499-60.374,34.926    c-3.013,3.327-5.718,6.894-8.634,10.296c-3.816,4.461-7.986,8.63-12.342,12.559c-4.478,4.045-8.102,6.938-13.382,9.974    c-3.614,2.074-7.286,4.113-10.983,6.09h25.66c9.253-7.043,17.217-15.258,24.54-24.25c2.976-3.648,6.153-7.132,9.476-10.463    c1.81-1.822,3.686-3.578,5.602-5.306C136.021,61.382,137.034,60.513,138.061,59.65z",
								"duration": 1300
							},
							{
								"path": "M63.391,190.57c4.17-1.431,13.352-4.777,25.266-10.191H55.636c-1.354,1.766-1.805,4.154-0.957,6.382    c1.006,2.659,3.532,4.288,6.216,4.288c0.75,0,1.518-0.123,2.264-0.39L63.391,190.57z",
								"duration": 600
							},
							{
								"path": "M182.595,92.079c-2.515,3.526-5.164,6.928-7.912,10.211h16.868c0.623-0.833,1.249-1.649,1.858-2.498    c2.129-2.993,1.438-7.132-1.547-9.269C188.878,88.396,184.724,89.086,182.595,92.079z",
								"duration": 600
							},
							{
								"path": "M244.149,230.113c-9.206-3.066-20.475-11.088-31.367-18.85c-15.78-11.245-29.4-20.943-40.505-19.034    c-8.34,1.444-22.912,10.753-45.92,25.916c-16.583,10.931-35.383,23.326-43.559,25.522c-3.543,0.958-5.641,4.606-4.688,8.146    c0.799,2.97,3.479,4.921,6.413,4.921c0.57,0,1.151-0.075,1.726-0.233c10.251-2.765,28.309-14.667,47.425-27.261    c15.439-10.181,34.654-22.846,40.865-23.917c5.637-0.965,19.445,8.853,30.539,16.758c11.69,8.323,23.777,16.934,34.872,20.64    c3.48,1.156,7.238-0.726,8.401-4.203C249.505,235.038,247.626,231.276,244.149,230.113z",
								"duration": 1000
							},
							{
								"path": "M227.518,262.661c-5.349-1.937-14.059-7.316-22.477-12.515c-17.778-10.988-29.082-17.651-37.188-16.259    c-8.217,1.424-25.468,13.148-54.419,34.29c-3.547,2.587-6.606,4.818-8.73,6.324c-2.993,2.118-3.708,6.263-1.595,9.257    c1.301,1.831,3.351,2.813,5.433,2.813c1.325,0,2.663-0.397,3.826-1.219c2.207-1.561,5.306-3.829,8.897-6.44    c11.522-8.418,42.136-30.766,48.778-31.915c4.144-0.28,19.088,8.938,28.021,14.448c9.407,5.811,18.295,11.307,24.94,13.709    c3.446,1.249,7.259-0.54,8.508-3.993C232.757,267.712,230.971,263.907,227.518,262.661z",
								"duration": 1000
							},
							{
								"path": "M205.086,295.682c-3.734-2.433-7.159-4.887-10.486-7.251c-10.889-7.786-20.307-14.507-30.628-12.703    c-11.62,2.002-30.13,20.614-33.726,24.32c-2.551,2.636-2.481,6.845,0.154,9.401c1.29,1.238,2.953,1.865,4.615,1.865    c1.738,0,3.473-0.675,4.774-2.022c8.901-9.186,21.537-19.633,26.441-20.482c4.846-0.831,12.18,4.388,20.656,10.435    c3.268,2.334,6.967,4.976,10.93,7.563c3.077,2.002,7.197,1.139,9.199-1.934C209.014,301.801,208.151,297.69,205.086,295.682z",
								"duration": 1000
							},
							{
								"path": "M250.642,193.226c-4.99-1.54-8.774-3.483-14.052-6.608c-3.076-1.813-6.037-3.918-8.822-6.238h-18.172    c9.37,12.114,22.942,21.169,37.514,25.656C255.323,208.563,258.807,195.744,250.642,193.226z",
								"duration": 600
							},
							{
								"path": "M33.574,106.062v64.071h244.167v-64.071H33.574z M267.229,159.62H44.086v-43.046h223.142V159.62z",
								"duration": 600
							},
							{
								"path": "M 76.991,148.43 L 83.811,152.738 87.89,143.883 91.639,152.624 99.019,148.407 93.128,141.041 102.239,142.131     102.239,133.986 93.054,135.203 98.915,127.491 91.786,123.453 87.995,132.166 84.143,123.526 76.957,127.648 82.728,135.143     73.847,133.993 73.847,142.145 82.781,140.995   z",
								"duration": 600
							},
							{
								"path": "M 122.064,148.43 L 128.883,152.738 132.965,143.883 136.711,152.624 144.092,148.407 138.205,141.041     147.316,142.131 147.316,133.986 138.131,135.203 143.99,127.491 136.863,123.453 133.071,132.166 129.216,123.526     122.028,127.648 127.799,135.143 118.924,133.993 118.924,142.145 127.853,140.995   z",
								"duration": 600
							},
							{
								"path": "M 167.134,148.43 L 173.957,152.738 178.044,143.883 181.787,152.624 189.173,148.407 183.276,141.041     192.39,142.131 192.39,133.986 183.197,135.203 189.062,127.491 181.935,123.453 178.143,132.166 174.286,123.526     167.106,127.648 172.873,135.143 163.996,133.993 163.996,142.145 172.931,140.995   z",
								"duration": 600
							},
							{
								"path": "M 212.217,148.43 L 219.031,152.738 223.113,143.883 226.857,152.624 234.242,148.407 228.353,141.041     237.466,142.131 237.466,133.986 228.281,135.203 234.14,127.491 227.008,123.453 223.216,132.166 219.369,123.526     212.18,127.648 217.946,135.143 209.072,133.993 209.072,142.145 218.004,140.995   z",
								"duration": 600
							}
						],
						"dimensions": {"width": 312,"height": 312}
					}
				}

				$(document).ready(function(){

					// Setup your Lazy Line element.
					// see README file for more settings
					$(\'#svglogo\').lazylinepainter({
							\'svgData\' : svgData,
							\'strokeWidth\':1,
							\'speedMultiplier\':1,
							\'strokeColor\':\'#DADADA\',
							\'onComplete\' : function(){
								console.log(\'>> onComplete\');
							},
							\'onStart\' : function(){
								console.log(\'>> onStart\');
							}
						}
					)
					// Paint your Lazy Line, that easy!
					var state = \'paint\';
					$(\'#svglogo\').lazylinepainter(state);
/*
					$(window).on(\'click\', function(){
						state = (state === \'erase\') ? \'paint\':\'erase\' ;
						$(\'#svglogo\').lazylinepainter(state);

						console.log(\'>> \' + state);
					});
*/
				})
				
			})( jQuery );
</script>
<script type="text/javascript" charset="utf-8">
$(\'.gauth\').contip({
    trigger: \'focus\',
    align: \'right\',
	radius: 2,
    bg: \'#EFEFEF\',
	color: \'#000\',
    fade: 180,
    rise: 3,
    html: \'如果已经开启二次验证登录，请输入！\'
});
$(\'.name\').contip({
    trigger: \'focus\',
    align: \'right\',
	radius: 2,
    bg: \'#EFEFEF\',
	color: \'#000\',
    fade: 180,
    rise: 3,
    html: \'请输入您的用户名！\'
});
$(\'.pw2\').contip({
    trigger: \'focus\',
    align: \'right\',
	radius: 2,
    bg: \'#EFEFEF\',
	color: \'#000\',
    fade: 180,
    rise: 3,
    html: \'请在输入一次密码！\'
});
$(\'.pw\').contip({
    trigger: \'focus\',
    align: \'right\',
	radius: 2,
    bg: \'#EFEFEF\',
	color: \'#000\',
    fade: 180,
    rise: 3,
    html: \'请输入您的密码！\'
});
$(\'.seccode\').contip({
    trigger: \'focus\',
    align: \'right\',
	radius: 2,
    bg: \'#EFEFEF\',
	color: \'#000\',
    fade: 180,
    rise: 67,
    html: \'您是机器人吗？\'
});
</script>';
?>
