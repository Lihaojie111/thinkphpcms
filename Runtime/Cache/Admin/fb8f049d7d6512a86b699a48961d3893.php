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

    
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--bootstrap组件--><link rel="stylesheet" href="/Public/bootstrap/bootstrap.min.css" ><script src="/Public/bootstrap/jquery.min.js" ></script><script src="/Public/bootstrap/popper.min.js"></script><script src="/Public/bootstrap/bootstrap.min.js"></script><!--awesome字体--><link href="/Public/bootstrap/font/css/font-awesome.min.css" rel="stylesheet"><!--bootstrap-dialog--><script src="/Public/bootstrap/bootstrap.dialog.js"></script><!--拖拽--><!--<script type="text/javascript" src="/Public/Plugs/jq/jquery-ui.min.js"></script>--><!--文件上传--><!--<link rel="stylesheet" type="text/css" href="/Public/Plugs/uploadify/uploadify.css"><script type="text/javascript" src="/Public/Plugs/uploadify/jquery.uploadify.min.js"></script>--><!--滚动条--><!--<link rel="stylesheet" type="text/css" href="/Public/Plugs/mCustomScrollbar/jquery.mCustomScrollbar.css"/><script type="text/javascript" src="/Public/Plugs/mCustomScrollbar/jquery.mCustomScrollbar.js"></script>--><!--颜色选择器--><link rel="stylesheet" type="text/css" href="/Public/Plugs/spectrum/spectrum.css"><script type="text/javascript" src="/Public/Plugs/spectrum/spectrum.js"></script><!--弹出框--><script type="text/javascript" src="/Public/Plugs/jq/jquery-dialog.js"></script><!--新日历控件,来源  http://blog.csdn.net/binyao02123202/article/details/42066035--><!--<link rel="stylesheet" type="text/css" href="/Public/Plugs/calendar/cxcalendar.css"/><script type="text/javascript" src="/Public/Plugs/calendar/calendar.js"></script>--><!--日期选择器插件datetimepicker--><link rel="stylesheet" href="/Public/Plugs/flatpickr/flatpickr.min.css"><script type="text/javascript" src="/Public/Plugs/flatpickr/flatpickr.js"></script><script type="text/javascript" src="/Public/Plugs/flatpickr/zh.js?v=3"></script><!--文件上传-插件地址：https://github.com/danielm/uploader--><script src="/Public/Plugs/dmuploader/jquery.dm-uploader.js"></script><!--ueditor--><script type="text/javascript" src="/Public/Plugs/ueditor/ueditor.config.js"></script><script type="text/javascript" src="/Public/Plugs/ueditor/ueditor.all.js"></script><link rel="stylesheet" type="text/css" href="/Public/Plugs/ueditor/third-party/video-js/video-js.css"><script type="text/javascript" src="/Public/Plugs/ueditor/third-party/video-js/video.js"></script><!--app--><link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css"/><script type="text/javascript" src="/Public/Admin/js/common_admin.js"></script>
    
</head>
<body>

<div class="g-page-in">
    <div class="g_tab">	<div class="title">QQ设置</div></div>			<div class="g_operation">				<div class="lft">					<!--                    <form action="" method="get" name="form1">                        标题搜索：                        <input class="text" name="title" type="text" value="<?php echo ($_GET['title']); ?>"/>                        &nbsp;                        <input class="submit" type="submit" value="搜索" />                    </form>                    -->				</div>				<div class="rgt">					<div class="btn_group">						<dl>							<dd><a href="<?php echo U('ToolQq/add');?>">新增客服</a></dd>						</dl>						<div class="clear"></div>					</div>				</div>				<div class="clear"></div>			</div>			<table class="g_list">				<tr>					<th width="40">ID</th>					<th>客服名称</th>					<th>qq号</th>					<th>备注</th>					<th>排序</th>					<th>状态</th>					<th>操作</th>				</tr>				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="tr_<?php echo ($vo["id"]); ?>">						<td><?php echo ($vo["id"]); ?></td>						<td><?php echo ($vo["name"]); ?></td>						<td><?php echo ($vo["qq"]); ?></td>						<td><?php echo ($vo["remark"]); ?></td>						<td>							<input class="text" type="text" name="sort" value="<?php echo ($vo["sort"]); ?>" old-sort="<?php echo ($vo["sort"]); ?>" data-id="<?php echo ($vo["id"]); ?>" style="width:40px;" />							<a href="#" onclick="return update_sort_one(<?php echo ($vo["id"]); ?>,this)">更新</a>						</td>						<td>							<select name="is_show" onchange="return set_is_show(<?php echo ($vo["id"]); ?>,this);">								<?php switch($vo["is_show"]): case "0": ?><option value="1">开启</option>										<option value="0" selected="selected">关闭</option><?php break;?>									<?php case "1": ?><option value="1" selected="selected">开启</option>										<option value="0">关闭</option><?php break; endswitch;?>							</select>						</td>						<td>							<a href="<?php echo U('ToolQq/edit',array('cate_id'=>$vo['pid'],'id'=>$vo['id'],'jump_url'=>array_encode($_GET)));?>">编辑</a>&nbsp;&nbsp;&nbsp;							<a href="#" onclick="return del(<?php echo ($vo["id"]); ?>)">删除</a>						</td>					</tr><?php endforeach; endif; else: echo "" ;endif; ?>			</table>			<div class="g_btns">				<a class="btn" href="#" onclick="return update_sort();">更新排序</a>			</div><script>	//ajax删除单页	function del($id){		$.confirm({text:'确认删除？',title:'删除单页'},function(){			$.ajax({				type:"post",				url: "<?php echo U('ToolQq/ajax_del');?>",				data: {id:$id},				success: function(data){					if(data)					{						$.ktext({text:'删除成功！',delay:1200},function(){							$(".tr_"+$id).remove();						});					}else					{						$.ktext({text:'删除失败！',delay:1200});					}				}			});		});		return false;	}	//更新单条排序	function update_sort_one($id,obj){		var old_sort = $(obj).prev().attr('old-sort');		var now_sort = $(obj).prev().val();		if(old_sort == now_sort){			$.ktext({text:"请先调整排序值！",delay:1200});			return false;		}else{			$.ajax({				type:"post",				url:"<?php echo U('ToolQq/ajax_setsort');?>",				data:{id:$id,sort:now_sort},				success:function(data){					if(data['status']){						$.ktext({text:"更新成功！",delay:1200},function(){							window.location = window.location;						});					}				}			});		}		return false;	}	function update_sort(){		$last_id = $("input[name=sort]").last().attr('data-id');		$("input[name=sort]").each(function(){			var $id = $(this).attr('data-id'),$sort = $(this).val(),$old_sort = $(this).attr('old_sort');			if($old_sort!=$sort){				$.ajax({					type:"post",					url:"<?php echo U('ToolQq/ajax_setsort');?>",					data:{id:$id,sort:$sort},					success:function(data){						if(data['status'] && $id == $last_id){							$.ktext({text:"更新成功！",delay:1200},function(){								window.location = window.location;							});						}					}				});			}		});		return false;	}	//ajax取消置顶活动	function set_is_show($id,obj){		$.ajax({			type:"post",			url: "<?php echo U('ToolQq/ajax_set_is_show');?>",			data: {id:$id,val:$(obj).val()},			success: function(data){				if(data)				{					$.ktext({text:'状态设置成功！',delay:1200},function(){					});				}else{					$.ktext({text:'状态设置失败！',delay:1200});				}			}		});		return false;	}</script>
</div>

<script type="text/javascript" src="/Public/Admin/js/my.js"></script>
</body>
</html>