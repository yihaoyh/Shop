<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文档管理</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/skin/css/base.css">
<script language="javascript">


//获得选中其中一个的id
function getOneItem()
{
	var allSel="";
	if(document.form2.id.value) return document.form2.id.value;
	for(i=0;i<document.form2.id.length;i++)
	{
		if(document.form2.id[i].checked)
		{
				allSel = document.form2.id[i].value;
				break;
		}
	}
	return allSel;
}
function selAll()
{
	for(i=0;i<document.form2.id.length;i++)
	{
		if(!document.form2.id[i].checked)
		{
			document.form2.id[i].checked=true;
		}
	}
}
function noSelAll()
{
	for(i=0;i<document.form2.id.length;i++)
	{
		if(document.form2.id[i].checked)
		{
			document.form2.id[i].checked=false;
		}
	}
}
</script>
</head>
<body leftmargin="8" topmargin="8" background='__PUBLIC__/skin/images/allbg.gif'>

<!--  快速转换位置按钮  -->
<table width="98%" border="0" cellpadding="0" cellspacing="1" bgcolor="#D1DDAA" align="center">
<tr>
 <td height="26" background="__PUBLIC__/skin/images/newlinebg3.gif">
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center">
    
 </td>
 </tr>
</table>
</td>
</tr>
</table>
  
<!--  内容列表   -->

<table width="98%" border="0" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA" align="center" style="margin-top:8px">
<tr bgcolor="#E7E7E7">
	<td height="24" colspan="10" background="__PUBLIC__/skin/images/tbg.gif">&nbsp;分类列表&nbsp;</td>
</tr>
<tr align="center" bgcolor="#FAFAF1" height="22">
	<td width="6%">ID</td>
	<td width="40%">分类名称</td>
	<td width="10%">操作</td>
</tr>
<?php if($list): if(is_array($list)): foreach($list as $key=>$vo): ?><tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';" height="22" >
	<td>5</td>
	<td><?php echo ($vo["name"]); ?></td>
        <td><a href="?s=Cate2/index&id=<?php echo ($vo["id"]); ?>">管理分类</a> |<a href="?s=Cate/edit&id=<?php echo ($vo["id"]); ?>">编辑</a> | <a href="?s=Cate/del&id=<?php echo ($vo["id"]); ?>">删除</a></td>
</tr><?php endforeach; endif; ?>
    <tr>
        <td  colspan="3" align="center"><?php echo ($page); ?></td>
    </tr>
    <?php else: ?>
    <tr>
        <td width="6%"></td>
	<td width="40%">没有添加分类</td>
	<td width="4%"></td>
    </tr><?php endif; ?>
</table>
<br><br><br><br>

<table width="300px" bgcolor="FCFDEE"  align="center" border="0px">
    <form  action="?s=Cate/insert" method="post">
    <tr><td colspan="2">添加新的分类</td></tr>
    <tr><td>分类名称</td><td><input type="text" name="cate"></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" value="添加"></td></tr>
    </form>
</table>


</body>
</html>