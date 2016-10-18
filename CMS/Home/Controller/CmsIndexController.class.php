<?php

namespace Home\Controller;

use Think\Controller;
use Home\Controller\CommonController;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;

class CmsIndexController extends Controller
{
    public function index()
    {
        $data = M('ppt');
        $this->ppt = $data->limit(4)->select();
        $data_notice = M('notice');
        $this->notice = $data_notice->select();
        $data_cat = M('article_category');
        $this->article_category = $data_cat->select();
        //print_r($_GET);
        if ($_GET) {
            $data_article = M('article');
            $this->arr_article = $data_article->limit(6)->where("category_id={$_GET['id']}")->select();//从数据库取出数据
        } else {
            $data_article = M('article');
            $this->arr_article = $data_article->where("category_id=6")->limit(6)->select();//从数据库取出数据
            //$now = "now";
        }
        $now=$_GET['id'];
        $this->now = $now;
        $this->display();
    }
public function news(){
    $data_cat = M('article_category');
    $this->article_category = $data_cat->select();
    $data_art=M('article');
    $amount = $data_art->count();
    $page_size = 4;
    $page = I('get.p', 1);
    $this->pager = new Page($amount, $page_size);
    $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
    $this->pager->setConfig('prev', '上一页');
    $this->pager->setConfig('next', '下一页');
    $this->article= $data_art->page("{$page},{$page_size}")->select();
    $this->news=$data_art->limit(3)->select();
    $this->display();
}
    public function neirong($id){
        $data=M('article');
        $this->news=$data->find($id);
        $this->news_art=$data->limit(3)->select();
        $this->display();
    }

}