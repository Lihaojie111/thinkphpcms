<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<script type="text/javascript" src="/Public/Plugs/jq/jquery-1.7.2.min.js"></script>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 10px; width:560px;height:240px;border-top:#aaa 5px solid;margin:0 auto;}
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size:30px;margin:10px 0 0 0;}
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
</style>
</head>
<body>
<div class="system-message">
<?php if(isset($message)) {?>
<img src="/Public/Common/images/right.png" />
<p class="success"><?php echo($message); ?></p>
<?php }else{?>
<img src="/Public/Common/images/error.png" />
<p class="error"><?php echo($error); ?></p>
<?php }?>
<p class="detail"></p>
<p class="jump">
<b id="wait"><?php echo($waitSecond); ?></b> 秒后自动跳转，或&nbsp;<a id="href" href="<?php echo($jumpUrl); ?>">点击这里</a>&nbsp;直接跳转
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	}
}, 1000);

/*
var $h = $(window).height();
$(".system-message").css({marginTop:$h/2-144});
*/
})();
</script>
</body>
</html>