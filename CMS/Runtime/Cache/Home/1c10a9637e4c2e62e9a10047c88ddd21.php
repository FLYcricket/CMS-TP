<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 网站管理员 </title>
    <meta name="Copyright" content="Douco Design." />
    <link href="/thinkphp_3.2.3/Public/cms_1/css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_1/js/jquery.min.js"></script>
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_1/js/global.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcHead">
        <div id="head">
            <div class="logo"><a href="index.html"><img src="/thinkphp_3.2.3/Public/cms_1/images/dclogo.gif" alt="logo"></a></div>
            <div class="nav">
                <ul>
                    <li class="M"><a href="JavaScript:void(0);" class="topAdd">新建</a>
                        <div class="drop mTopad"><a href="product.php?rec=add">商品</a> <a href="article.php?rec=add">文章</a> <a href="nav.php?rec=add">自定义导航</a> <a href="show.html">首页幻灯</a> <a href="page.php?rec=add">单页面</a> <a href="manager.php?rec=add">管理员</a> <a href="link.html"></a> </div>
                    </li>
                    <li><a href="../index.php" target="_blank">查看站点</a></li>
                    <li><a href="index.php?rec=clear_cache">清除缓存</a></li>
                    <li><a href="http://help.douco.com" target="_blank">帮助</a></li>
                    <li class="noRight"><a href="module.html">DouPHP+</a></li>
                </ul>
                <ul class="navRight">
                    <li class="M noLeft"><a href="JavaScript:void(0);">您好，<?php echo $_SESSION['user_name'] ?></a>
                        <div class="drop mUser">
                            <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
                            <a href="manager.php?rec=cloud_account">设置云账户</a>
                        </div>
                    </li>
                    <li class="noRight"><a href="<?php echo U ('Index/loginout');?>">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
    <ul class="top">
        <li><a href="<?php echo U('Index/index');?>"><i class="home"></i><em>管理首页</em></a></li>
    </ul>
    <ul>
        <li><a href="<?php echo U('Index/show');?>"><i class="show"></i><em>首页幻灯广告</em></a></li>
        <li><a href="<?php echo U('Index/page');?>"><i class="page"></i><em>公告栏管理</em></a></li>
    </ul>
    <ul>
        <li><a href="<?php echo U('Index/article_category');?>"><i class="articleCat"></i><em>文章分类</em></a></li>
        <li><a href="<?php echo U('Index/article');?>"><i class="article"></i><em>文章列表</em></a></li>
    </ul>
    <ul class="bot">
        <li  class="cur"><a href="<?php echo U('Index/manager');?>"><i class="manager"></i><em>网站管理员</em></a></li>
    </ul>
</div></div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo U('Index/add_manager');?>" class="actionBtn">添加管理员</a>网站管理员</h3>
        <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <th width="30" align="center">编号</th>
                <th align="left">管理员名称</th>
                <th align="center">E-mail地址</th>
                <th align="center">添加时间</th>
                <th align="center">最后登录时间</th>
                <th align="center">操作</th>
            </tr>
            <?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?><tr>
                <td align="center"><?php echo ($admin["id"]); ?></td>
                <td><?php echo ($admin["username"]); ?></td>
                <td align="center"><?php echo ($admin["email"]); ?></td>
                <td align="center"><?php echo ($admin["created_at"]); ?></td>
                <td align="center"><?php echo ($admin["login_log"]); ?></td>
                <td align="center"><a href="<?php echo U('Index/editor_manager');?>?id=<?php echo ($admin["id"]); ?>">编辑</a> |
                    <a href="<?php echo U('Index/manager_delete');?>?id=<?php echo ($admin["id"]); ?>">删除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="page1">
            <?php echo ($pager->show()); ?>
        </div>
    </div>
    </div>
    <div class="clear"></div>
    <div id="dcFooter">
        <div id="footer">
            <div class="line"></div>
            <ul>
                版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
            </ul>
        </div>
    </div><!-- dcFooter 结束 -->
    <div class="clear"></div> </div>
</body>
</html>