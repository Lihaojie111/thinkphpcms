<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title><?php echo ($setting["sitename"]); ?></title>
    <meta name="renderer" content="webkit">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        <?php if(!empty($page["title"])): ?><title><?php echo ($page["title"]); ?></title>
            <?php else: ?>
            <title><?php echo ($setting["sitename"]); ?></title><?php endif; ?>
    
    <?php if(!empty($page["keywords"])): ?><meta name="keywords" content="<?php echo ($page["keywords"]); ?>"/>
        <?php else: ?>
        <meta name="keywords" content="<?php echo ($setting["keywords"]); ?>"/><?php endif; ?>
    <?php if(!empty($page["description"])): ?><meta property="description" name="description" content="<?php echo ($page["description"]); ?>"/>
        <?php else: ?>
        <meta property="description" name="description" content="<?php echo ($setting["description"]); ?>"/><?php endif; ?>

    
        <!--bootstrap组件-->
        <link rel="stylesheet" href="/Public/bootstrap/bootstrap.min.css" >
        <script src="/Public/bootstrap/jquery.min.js" ></script>
        <script src="/Public/bootstrap/popper.min.js"></script>
        <script src="/Public/bootstrap/bootstrap.min.js"></script>

        <!--awesome字体-->
        <link href="/Public/bootstrap/font/css/font-awesome.min.css" rel="stylesheet">

        <!--bootstrap-dialog-->
        <script src="/Public/bootstrap/bootstrap.dialog.js"></script>


        <link rel="stylesheet" href="/Public/Admin/css/frame.css" >
    

</head>
<body>




</body>
</html>