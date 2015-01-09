<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<title>menu</title>
<link rel="stylesheet" href="__PUBLIC__/skin/css/base.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/skin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="__PUBLIC__/skin/js/frame/menu.js"></script>
<base target="main" />
</head>
<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td style='padding-left:3px;padding-top:8px' valign="top">
	<!-- Item 1 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items1_1")'><b>常用操作</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <ul class='sitemu'>
            <li>
              <div class='items'>
                <div class='fllct'><a href='?s=Cate/index' target='main'>管理分类</a></div>
              </div>
            </li>
            <li>
              <div class='items'>
                <div class='fllct'><a href='?s=Product/index' target='main'>商品管理</a></div>
              </div>
            </li>
            <li>
              <div class='items'>
                <div class='fllct'><a href='?s=User/index' target='main'>注册用户管理</a></div>
              </div>
            </li>
            <li>
              <div class='items'>
                <div class='fllct'><a href='?s=Order/index' target='main'>订单管理</a></div>
              </div>
            </li>
          </ul>
        </dd>
      </dl>
      <!-- Item 1 End -->
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>系统帮助</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='#' target='_blank'>官方网站</a></li>
          </ul>
        </dd>
      </dl>
      <!-- Item 2 End -->
	  </td>
  </tr>
</table>
</body>
</html>