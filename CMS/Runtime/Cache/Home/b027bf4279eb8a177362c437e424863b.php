<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>蓝色企业集团公司网站模板</title>
    <script language=javascript>
        <!--
        if (screen.width == 1024 )
        {
            document.write('<link rel=stylesheet type="text/css" href="/thinkphp_3.2.3/Public/cms_2/css/1024_768.css">')
        }
        else {document.write('<link rel=stylesheet type="text/css" href="/thinkphp_3.2.3/Public/cms_2/css/style.css">')}
        //-->
    </script>
    <link type="text/css" href="/thinkphp_3.2.3/Public/cms_2/css/nav.css" rel="stylesheet" />
    <script language="javascript" src="/thinkphp_3.2.3/Public/cms_2/js/jquery-1.7.2.min.js"></script>
    <script language="javascript" src="/thinkphp_3.2.3/Public/cms_2/js/nav.js"></script>
    <script language="javascript" src="/thinkphp_3.2.3/Public/cms_2/js/jquery.pack.js"></script>
    <script language="javascript" src="/thinkphp_3.2.3/Public/cms_2/js/slide.js"></script>
    <script language="javascript" src="/thinkphp_3.2.3/Public/cms_2/js/png.js"></script>
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_2/js/jwplayer.js" ></script>
    <script type="text/javascript" src="/thinkphp_3.2.3/Public/cms_2/js/jwplayer.html5.js" ></script>

</head>
<body>
<div class="head">
    <div class="top">
        <div class="line_01">
            <p class="logo"><a href="http://www.mycodes.net" class="index"><img src="/thinkphp_3.2.3/Public/cms_2/images/logo.png" width="162" height="56" /></a></p>
            <form action="/e/search/index.php" method="post" name="searchform" id="searchform">
                <p class="search">
                    <input type="text" value="" name='keyboard' id='keyboard' class="s_text"/>
                    <input type="submit" value="搜索" class="s_btn"/>
                </p>
            </form>
        </div>
        <div class="header_all">
            <div class="nav" id="nav">
                <p class="n_left_bg"><a href="index.html" class="index">首页</a></p>
                <ul>
                    <li><span class="v"><a href="guanyulantian.html" class="about">关于蓝天</a></span>
                        <div class="bg">
                            <div class="b_link">

                                <a href="/guanyulantian/dongshichangzhici/">董事长致辞</a>


                                <a href="/guanyulantian/gongsijieshao/">公司介绍</a>


                                <a href="/guanyulantian/guanlituandui/">管理团队</a>


                            </div>
                        </div>


                    </li><li><span class="v"><a href="news.html" class="news">新闻中心</a></span>
                    <div class="bg">
                        <div class="b_link">

                            <a href="/xinwenzhongxin/jituanyaowen/">集团要闻</a>


                            <a href="/xinwenzhongxin/xingyexinxi/">行业信息</a>


                            <a href="/xinwenzhongxin/hongguanhuanjing/">宏观环境</a>


                        </div>
                    </div>


                </li><li><span class="v"><a href="#" class="industry">蓝天产业</a></span>
                    <div class="bg">
                        <div class="b_link">

                            <a href="/lantianchanye/lantiantouzi/">蓝天投资</a>


                            <a href="/lantianchanye/lantianranqi/">蓝天燃气</a>


                            <a href="/lantianchanye/lantiannongye/">蓝天农业</a>


                            <a href="/lantianchanye/lantianzhiye/">蓝天置业</a>


                            <a href="/lantianchanye/lantiankuangye/">蓝天矿业</a>


                            <a href="/lantianchanye/lantianshihua/">蓝天石化</a>


                        </div>
                    </div>


                </li><li><span class="v"><a href="#" class="careers">人力资源</a></span>
                    <div class="bg">
                        <div class="b_link">

                            <a href="/renliziyuan/rencaipeixun/">人才培训</a>


                            <a href="/renliziyuan/rencaizhaopin/">人才招聘</a>


                            <a href="/renliziyuan/rencailinian/">人才理念</a>


                        </div>
                    </div>


                </li><li><span class="v"><a href="#" class="party">企业党建</a></span>
                    <div class="bg">
                        <div class="b_link">

                            <a href="/qiyedangjian/dangweigongzuo/">党委工作</a>


                            <a href="/qiyedangjian/tuanweigongzuo/">团委工作</a>


                        </div>
                    </div>


                </li><li><span class="v"><a href="#" class="cultrue">企业文化</a></span>
                    <div class="bg">
                        <div class="b_link">

                            <a href="/qiyewenhua/qiyelinian/">企业理念</a>


                            <a href="/qiyewenhua/zhinenglinian/">职能理念</a>


                            <a href="/qiyewenhua/qiyebiaoshi/">企业标示</a>


                            <a href="/qiyewenhua/banchejingshen/">板车精神</a>


                            <a href="/qiyewenhua/wenhuahuodong/">文化活动</a>


                        </div>
                    </div>


                </li><li><span class="v"><a href="#" class="contact">联系我们</a></span>
                    <div class="bg">
                        <div class="b_link">

                            <a href="/lianxiwomen/jituanzongbu/">集团总部</a>


                            <a href="/lianxiwomen/liuyanban/">留言板</a>


                        </div>
                    </div>


                </li>                    </ul>

                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>
<div class="banner">
    <div class="ban_pic">
<?php if(is_array($ppt)): $i = 0; $__LIST__ = $ppt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppt): $mod = ($i % 2 );++$i;?><div class="image" id="image_<?php echo ($ppt["rank"]); ?>">
            <a href="#" target="_blank">
                <img src="/thinkphp_3.2.3<?php echo ($ppt["url"]); ?>"  />
            </a>
            <div class="word"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="open">
        <div class="o_center">
            <h3>蓝天新闻公告：</h3>
            <p><marquee scrollamount="2" width="500" onmouseover="stop()" onmouseout="start()">
            </marquee>
            </p>
        </div>
    </div>
</div>

<div class="roll">
    <div class="roll_p">
        <div class="r_cen">
            <ul class="r_center" id="service_items">
                <?php if(is_array($notice)): $i = 0; $__LIST__ = $notice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?><li class="roll_pic r_01" style="background: url('/thinkphp_3.2.3<?php echo ($notice["pic"]); ?>')" onclick="javascript:window.location.href='/lantianchanye/lantiantouzi/';">
                    <h2><a href="/lantianchanye/lantiantouzi/"><?php echo ($notice["name"]); ?></a></h2>
                    <p><a href="/lantianchanye/lantiantouzi/"><?php echo ($notice["content"]); ?></a></p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="clear"></div>
            </ul>


            <div class="clear"></div>
        </div>
        <div class="new_po">
            <div id="service_prev"> <p class="r_left"><img src="/thinkphp_3.2.3/Public/cms_2/images/roll_left.jpg" width="30" height="56" id="service_prev"/></p></div>
            <div id="service_next"><p class="r_right"><img src="/thinkphp_3.2.3/Public/cms_2/images/roll_right.jpg" width="30" height="56" id="service_next"/></p></div>
        </div>
        <!--<div id="service_prev"> <p class="r_left"><img src="/thinkphp_3.2.3/Public/cms_2/images/roll_left.jpg" width="30" height="56" id="service_prev"/></p></div>
        <div id="service_next"><p class="r_right"><img src="/thinkphp_3.2.3/Public/cms_2/images/roll_right.jpg" width="30" height="56" id="service_next"/></p></div>-->

    </div>
</div>
<div class="main">
    <div class="m_content">
        <div class="in_news">
            <div class="in_tit">
                <ul>
                    <?php if(is_array($article_category)): $i = 0; $__LIST__ = $article_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$article_category): $mod = ($i % 2 );++$i; if(($$now) == $article_category['id']): ?><li><a href="<?php echo U('CmsIndex/index');?>?id=<?php echo ($article_category["id"]); ?>" class="now"><?php echo ($article_category["name"]); ?></a></li>
                            <?php else: ?>
                            <li><a href="<?php echo U('CmsIndex/index');?>?id=<?php echo ($article_category["id"]); ?>"><?php echo ($article_category["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="in_list" id="company">
                <div class="in_pic">
                    <!-- 首页头条头图-->
                    <p>
                        <img src="/thinkphp_3.2.3/Public/cms_2/images/59e0c54fd0415faa263636830324adde.jpg" alt="集团公司团委举行“蓝天梦•我的梦”主题演讲比赛" width="205" height="152" />
                    </p>
                </div>
                <div class="pic_list">
                    <ul>
                        <?php if(is_array($arr_article)): $i = 0; $__LIST__ = $arr_article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr_article): $mod = ($i % 2 );++$i;?><li><a href="/xinwenzhongxin/jituanyaowen/2013-06-28/773.html" title="<?php echo ($arr_article["title"]); ?>">
                            <?php echo ($arr_article["title"]); ?></a>
                            <span><?php echo ($arr_article["created_at"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                </div>
                <div class="clear"></div>
            </div>





        </div>
        <div class="video">
            <h3>视频中心</h3>
            <div class="v_pic">
                <div id="FlashFile">
                    <object type="application/x-shockwave-flash" width="220px" height="178px" data="flvplayer.swf?file=ftp://218.28.100.165/HNLT-Fly.FLV">
                        <param name="movie" value="flvplayer.swf?file=ftp://218.28.100.165/HNLT-Fly.FLV&amp;showfsbutton=true&amp;autostart=false">
                        <param name="wmode" value="transparent">
                        <param name="quality" value="high">
                        <param name="allowfullscreen" value="true">
                        <embed src="/thinkphp_3.2.3/Public/cms_2/images/aoa.mp4" width="220px" height="178px" wmode="transparent" quality="high" allowfullscreen="true">
                    </object>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
</div>
<!-- 页脚 -->
<!-- 页脚 -->
<div class="foot">
    <P>COPYRIGHT BY @2011 HENAN LANTIAN GROUP CO.,LTD. ALL RIGHT RESERVED</P>
    <p>版权所有：河南蓝天集团有限公司 网站备案号：豫ICP备05008790号</p>
</div>
</body>
<script type=text/javascript>
    <!--图片的数量,0 必须保存-->
    var target = ["0","1","2","3","4"];
</script>
</html>