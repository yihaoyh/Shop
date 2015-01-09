<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>文档管理</title>
        <link rel="stylesheet" type="text/css" href="__PUBLIC__/skin/css/base.css">
        <script language="javascript">


            //获得选中其中一个的id
            function getOneItem()
            {
                var allSel = "";
                if (document.form2.id.value)
                    return document.form2.id.value;
                for (i = 0; i < document.form2.id.length; i++)
                {
                    if (document.form2.id[i].checked)
                    {
                        allSel = document.form2.id[i].value;
                        break;
                    }
                }
                return allSel;
            }
            function selAll()
            {
                for (i = 0; i < document.form2.id.length; i++)
                {
                    if (!document.form2.id[i].checked)
                    {
                        document.form2.id[i].checked = true;
                    }
                }
            }
            function noSelAll()
            {
                for (i = 0; i < document.form2.id.length; i++)
                {
                    if (document.form2.id[i].checked)
                    {
                        document.form2.id[i].checked = false;
                    }
                }
            }
        </script>
        <script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
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
                <td height="24" colspan="10" background="__PUBLIC__/skin/images/tbg.gif">&nbsp;注册用户列表&nbsp;</td>
            </tr>
            <tr align="center" bgcolor="#FAFAF1" height="22">
                <td width="6%">ID</td>
                <td width="40%">用户名</td>
                <td width="20%">操作</td>
            </tr>
            
            <?php if($list): if(is_array($list)): foreach($list as $key=>$vo): ?><tr align='center' bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor = '#FCFDEE';" onMouseOut="javascript:this.bgColor = '#FFFFFF';" height="22" >
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td>
                    <?php if($vo["status"] == 0): ?><a href="?s=User/lahei&id=<?php echo ($vo["id"]); ?>">不拉黑</a>
                      <?php else: ?>
                      <a href="?s=User/unlahei&id=<?php echo ($vo["id"]); ?>">拉黑</a><?php endif; ?>
                    </td>
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <td  colspan="4" align="center"><?php echo ($page); ?></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td width="6%"></td>
                    <td width="40%">没有用户</td>
                    <td width="4%"></td>
                </tr><?php endif; ?>
            
            
            
        </table>
        <br><br><br><br>
        <br><br><br>
    </body>
    
    
</html>
<script>
    function show(id,photo)
    {
        $("#show").html('');
        $("#show").html('<img src="__PUBLIC__/product/s_'+photo+'">');
    }
</script>