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
    

    <div class="u-breadcrumb">
        <a class="back" href="javascript:history.back()" ><span class="fa fa-chevron-left"></span> 后退</a>
        <a class="back" href="javascript:window.location.reload()" ><span class="fa fa-repeat"></span> 刷新</a>
        <span class="name">新增链接</span>
    </div>
    <div class="h15"></div>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label><span class="text-danger">* </span>链接分类</label>
            <select class="form-control" name="cate_id" id="itemsids" style="width:400px;">
                <?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["id"]) == $_GET['cate_id']): ?><option onclick="selectid(<?php echo ($item["id"]); ?>)" value="<?php echo ($item["id"]); ?>" selected>
                            <?php echo ($item["name"]); ?>
                        </option>
                        <?php else: ?>
                        <option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>链接标题</label>
            <div class="form-inline">
                <input type="text" class="form-control" name="title" placeholder="链接标题" style="width:400px;" value="<?php echo ($page["title"]); ?>" />
            </div>
            <small class="form-text text-muted">1-100个字符</small>
        </div>
        <div class="form-group">
            <label>图片</label>
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <small class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label>链接</label>
            <div class="form-inline">
                <input type="text" class="form-control" name="url" placeholder="链接" style="width:400px;" value="http://" />
            </div>
            <small class="form-text text-muted">链接请以“http://”开头</small>
        </div>
        <div class="form-group">
            <label>打开方式</label>
            <select class="form-control" name="target" style="width:400px;">
                <?php if(($page["target"]) == "_blank"): ?><option value="_self">_self</option>
                    <option value="_blank" selected>_blank</option>
                <?php else: ?>
                    <option value="_self" selected>_self</option>
                    <option value="_blank">_blank</option><?php endif; ?>
            </select>
            <small class="form-text text-muted">_self当前窗口，_blank新窗口</small>
        </div>
        <div class="form-group">
            <label>到期时间</label>
            <!--
必选字段：
inputname
inputvalue
可选字段：
placeholder
-->

<?php
 $placeholder = "到期时间"; $placeholder = $placeholder?$placeholder:'选择时间'; ?>
<div class="input-group" style="width: 200px;">
    <input type="text" class="form-control form-control-sm" name="end_at" placeholder="<?php echo ($placeholder); ?>" value="<?php echo date('Y-m-d H:i:s', strtotime('+10 year'));?>" >
    <div class="input-group-append">
        <span class="input-group-text">
            <i class="fa fa-calendar" aria-hidden="true"></i>
        </span>
    </div>
</div>
<script>
    //日期选择器
    $("input[name='end_at']").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        locale: "zh"
    });
</script>
            <small class="form-text text-muted">默认10年</small>
        </div>
        <button type="submit" class="btn btn-primary">保存</button>
    </form>


    <script type="text/javascript">
        //分类切换（需要标志当前pid）
        $("#itemsids").change(function(){
            var $id=$(this).val();
            window.location = "<?php echo U('Ad/add');?>"+"?cate_id="+$id;
        });
    </script>


</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>