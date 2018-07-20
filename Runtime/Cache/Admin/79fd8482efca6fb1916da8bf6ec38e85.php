<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,minimal-ui">
    <meta content="telephone=no" name="format-detection" />
    <meta content="email=no" name="format-detection" />
    <meta name="wap-font-scale" content="no">  <!--解决UC字体忽然变大-->
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    
        <?php if(!empty($page["title"])): ?><title><?php echo ($page["title"]); ?></title>
            <?php else: ?>
            <title><?php echo ($setting["sitename"]); ?></title><?php endif; ?>
    
    <?php if(!empty($page["keywords"])): ?><meta name="keywords" content="<?php echo ($page["keywords"]); ?>"/>
        <?php else: ?>
        <meta name="keywords" content="<?php echo ($setting["keywords"]); ?>"/><?php endif; ?>
    <?php if(!empty($page["description"])): ?><meta property="description" name="description" content="<?php echo ($page["description"]); ?>"/>
        <?php else: ?>
        <meta property="description" name="description" content="<?php echo ($setting["description"]); ?>"/><?php endif; ?>

    
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
</head>
<body>

<div class="g-page-in">
    
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "留言时间-开始"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width:160px;">
    <input type="text" class="form-control form-control-sm" name="time_begin" placeholder="<?php echo ($placeholder); ?>" value="<?php echo ($_GET['time_begin']); ?>" >
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
    </div>
</div>
<script>
    //日期选择器
    $("input[name='time_begin']").flatpickr({
        enableTime: false,
        dateFormat: "Y-m-d",
        locale: "zh"
    });
</script>
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "留言时间-结束"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width:160px;">
    <input type="text" class="form-control form-control-sm" name="time_end" placeholder="<?php echo ($placeholder); ?>" value="<?php echo ($_GET['time_end']); ?>" >
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
    </div>
</div>
<script>
    //日期选择器
    $("input[name='time_end']").flatpickr({
        enableTime: false,
        dateFormat: "Y-m-d",
        locale: "zh"
    });
</script>
</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>