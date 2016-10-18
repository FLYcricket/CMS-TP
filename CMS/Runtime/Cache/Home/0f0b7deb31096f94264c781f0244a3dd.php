<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 编辑文章 </title>
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
        <li><a href="index.html"><i class="home"></i><em>管理首页</em></a></li>
    </ul>
    <ul>
    <li><a href="show.html"><i class="show"></i><em>首页幻灯广告</em></a></li>
        <li><a href="page.html"><i class="page"></i><em>公告栏管理</em></a></li>
    </ul>
       <ul>
        <li><a href="article_category.html"><i class="articleCat"></i><em>文章分类</em></a></li>
        <li class="cur"><a href="article.html"><i class="article"></i><em>文章列表</em></a></li>
    </ul>
    <ul class="bot">
<li><a href="manager.html"><i class="manager"></i><em>网站管理员</em></a></li>
    </ul>
</div></div>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>编辑文章</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="article.html" class="actionBtn">文章列表</a>编辑文章</h3>
        <form action="<?php echo U('Index/edit_article');?>" method="post" enctype="multipart/form-data">

            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="90" align="right">文章名称</td>
                    <td>
                        <input type="hidden" name="id" value="<?php echo ($article["id"]); ?>" size="80" class="inpMain" />
                        <input type="text" name="title" value="<?php echo ($article["title"]); ?>" size="80" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">文章分类</td>
                    <td>
                        <select name="category_id">
                            <option value="0">未分类</option>
                            <?php if(is_array($article_category)): $i = 0; $__LIST__ = $article_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_category): $mod = ($i % 2 );++$i;?><option value="<?php echo ($article_category["id"]); ?>"><?php echo ($article_category["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right" valign="top">文章描述</td>
                    <td>
                        <!-- KindEditor -->
                        <link rel="stylesheet" href="/thinkphp_3.2.3/Public/cms_1/js/kindeditor/themes/default/default.css" />
                        <link rel="stylesheet" href="/thinkphp_3.2.3/Public/cms_1/js/kindeditor/plugins/code/prettify.css" />
                        <script charset="utf-8" src="/thinkphp_3.2.3/Public/cms_1/js/kindeditor/kindeditor.js"></script>
                        <script charset="utf-8" src="/thinkphp_3.2.3/Public/cms_1/js/kindeditor/lang/zh_CN.js"></script>
                        <script charset="utf-8" src="/thinkphp_3.2.3/Public/cms_1/js/kindeditor/plugins/code/prettify.js"></script>
                        <script>
                            KindEditor.ready(function(K) {
                                var editor1 = K.create('textarea[name="content"]', {
                                    cssPath : '../plugins/code/prettify.css',
                                    uploadJson : '../php/upload_json.php',
                                    fileManagerJson : '../php/file_manager_json.php',
                                    allowFileManager : true,
                                    afterCreate : function() {
                                        var self = this;
                                        K.ctrl(document, 13, function() {
                                            self.sync();
                                            K('form[name=example]')[0].submit();
                                        });
                                        K.ctrl(self.edit.doc, 13, function() {
                                            self.sync();
                                            K('form[name=example]')[0].submit();
                                        });
                                    }
                                });
                                prettyPrint();
                            });
                        </script>
                        <!-- /KindEditor -->
                        <textarea id="content" name="content" style="width:780px;height:400px;" class="textArea"><?php echo ($article["content"]); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">缩略图</td>
                    <td>
                        <input type="file" name="pic" size="38" class="inpFlie" />
                        <input type="hidden" name="photo" value="<?php echo ($article["pic"]); ?>" size="50" class="inpMain" />
                        <img src="/thinkphp_3.2.3<?php echo ($article["pic"]); ?>" style="width: 50px;height: auto"></td>
                </tr>
                <tr>
                    <td align="right">关键字</td>
                    <td>
                        <input type="text" name="keywords" value="<?php echo ($article["keywords"]); ?>" size="50" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">标签</td>
                    <td>
                        <input type="text" name="tag" value="<?php echo ($article["tag"]); ?>" size="50" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">简单描述</td>
                    <td>
                        <input type="text" name="info" value="<?php echo ($article["info"]); ?>" size="50" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td align="right">作者</td>
                    <td>
                        <input type="text" name="author" value="<?php echo ($article["author"]); ?>" size="50" class="inpMain" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
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