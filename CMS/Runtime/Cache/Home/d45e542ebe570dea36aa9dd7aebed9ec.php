<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 添加分类 </title>
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
    <li><a href="<?php echo U('Index/index');?>"><i class="home"></i><em>管理首页</em></a></li>
    </ul>
    <ul>
        <li><a href="<?php echo U('Index/show');?>"><i class="show"></i><em>首页幻灯广告</em></a></li>
        <li><a href="<?php echo U('Index/page');?>"><i class="page"></i><em>公告栏管理</em></a></li>
    </ul>
    <ul>
        <li class="cur"><a href="<?php echo U('Index/article_category');?>"><i class="articleCat"></i><em>文章分类</em></a></li>
        <li><a href="<?php echo U('Index/article');?>"><i class="article"></i><em>文章列表</em></a></li>
    </ul>
    <ul class="bot">
        <li><a href="<?php echo U('Index/manager');?>"><i class="manager"></i><em>网站管理员</em></a></li>
    </ul>
</div></div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="article_category.html" class="actionBtn">文章分类</a>添加分类</h3>
        <form action="<?php echo U ('Index/category_edit');?>" method="post">
            <input type="hidden" name="id" value="<?php echo ($article_category["id"]); ?>" size="40" class="inpMain" />
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="80" align="right">分类名称</td>
                    <td>
                        <input type="text" name="name" value="<?php echo ($article_category["name"]); ?>" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">别名</td>
                    <td>
                        <input type="text" name="extra_name" value="<?php echo ($article_category["extra_name"]); ?>" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">关键字</td>
                    <td>
                        <input type="text" name="keywords" value="<?php echo ($article_category["keywords"]); ?>" size="40" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">简单描述</td>
                    <td>
                        <textarea name="info" cols="60" rows="4" class="textArea"><?php echo ($article_category["info"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="token" value="25bfda40" />
                        <input type="hidden" name="cat_id" value="" />
                        <input name="submit" class="btn" type="submit" value="提交" />
                    </td>
                </tr>
            </table>
        </form>
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