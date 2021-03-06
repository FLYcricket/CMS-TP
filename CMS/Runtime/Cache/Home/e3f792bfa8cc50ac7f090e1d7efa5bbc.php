<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 文章列表 </title>
    <meta name="Copyright" content="Douco Design." />
    <link href="/thinkphp_3.2.3/Public/cms_1/css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_1/js/jquery.min.js"></script>
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_1/js/global.js"></script>
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_1/js/jquery.autotextarea.js"></script>
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
        <li class="cur"><a href="<?php echo U('Index/article');?>"><i class="article"></i><em>文章列表</em></a></li>
    </ul>
    <ul class="bot">
    <li><a href="<?php echo U('Index/manager');?>"><i class="manager"></i><em>网站管理员</em></a></li>
    </ul>
</div></div>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>文章列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="<?php echo U('Index/add_article');?>" class="actionBtn add">添加文章</a>文章列表</h3>
    <div class="filter">
        <form action="<?php echo U('Index/article');?>" method="post">
            <select name="category_id">
                <option value="">未分类</option>
                <?php if(is_array($article_category)): $i = 0; $__LIST__ = $article_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_category): $mod = ($i % 2 );++$i;?><option value="<?php echo ($article_category["id"]); ?>"><?php echo ($article_category["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <input name="keywords" type="text" class="inpMain" value="" size="20" />
            <input name="submit" class="btnGray" type="submit" value="筛选" />
        </form>
    <span>
        <a class="btnGray" href="article.php?rec=sort">开始筛选首页文章</a>
        </span>
    </div>
    <div id="list">
        <form name="action" method="post" action="<?php echo U('Index/delete_all_article');?>">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th width="22" align="center"><input name='chkall' type='checkbox' id='chkall' onclick='selectcheckbox(this.form)' value='check'></th>
                    <th width="40" align="center">编号</th>
                    <th align="left">文章名称</th>
                    <th width="150" align="center">文章分类</th>
                    <th width="80" align="center">添加日期</th>
                    <th width="80" align="center">操作</th>
                </tr>

                <?php if(is_array($arr_article)): $i = 0; $__LIST__ = $arr_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr_article): $mod = ($i % 2 );++$i;?><tr>
                    <td align="center"><input type="checkbox" name="checkbox[]" value="<?php echo ($arr_article["id"]); ?>" /></td>
                    <td align="center"><?php echo ($arr_article["id"]); ?></td>
                    <td><a href="article.php?rec=edit&id=10"><?php echo ($arr_article["title"]); ?></a></td>
                    <td align="center"><a href="article.php?cat_id=1"><?php echo $arr_cat[$arr_article[category_id]] ?></a></td>
                    <td align="center"><?php echo ($arr_article["created_at"]); ?></td>
                    <td align="center">
                        <a href="http://127.0.0.1/thinkphp_3.2.3/CMS.php/Home/Index/editor_article/id/<?php echo ($arr_article["id"]); ?>">编辑</a>
                        | <a href="http://127.0.0.1/thinkphp_3.2.3/CMS.php/Home/Index/delete_article/id/<?php echo ($arr_article["id"]); ?>">删除</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div class="action">
                <script>
                    function del(){
                        if( confirm("您确定要删除此新闻吗?") ){
                            document.location.href = "http://127.0.0.1/thinkphp_3.2.3/CmsIndex.php/home/index/news_delete?id=<?php echo ($news["id"]); ?>";

                        }
                    }
                </script>

                <select name="action" onchange="douAction()">
                    <option value="0">请选择...</option>
                    <option value="del_all">删除</option>
                    <option value="category_move">移动分类至</option>
                </select>
                <select name="new_cat_id">
                    <option value="">未分类</option>
                    <?php if(is_array($article_category2)): $i = 0; $__LIST__ = $article_category2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($category2["id"]); ?>"><?php echo ($category2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>

                <input name="submit" class="btn" type="submit" value="执行" />
            </div>
        </form>
    </div>
    <div class="clear"></div>
    <div class="page1">
        <?php echo ($pager->show()); ?>
    </div>          </div>
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
<script type="text/javascript">

    onload = function()
    {
        document.forms['action'].reset();
    }

    function douAction()
    {
        var frm = document.forms['action'];

        frm.elements['new_cat_id'].style.display = frm.elements['action'].value == 'category_move' ? '' : 'none';
    }

</script>
</body>
</html>