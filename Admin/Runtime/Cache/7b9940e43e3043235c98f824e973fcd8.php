<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>文档管理</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/skin/css/base.css">



<table width="300px" bgcolor="FCFDEE"  align="center" border="0px">
    <form  action="?s=Cate2/update" method="post">
    <tr><td colspan="2">编辑</td></tr>
    <input type="hidden" name="id" value="<?php echo ($one[id]); ?>">
    <input type="hidden" name="pid" value="<?php echo ($one[pid]); ?>">
    <tr><td>名称</td><td><input type="text" name="name" value="<?php echo ($one[name]); ?>"></td></tr>
    <tr><td colspan="2" align="center"><input type="submit" value="更新"></td></tr>
    </form>
</table>


</body>
</html>