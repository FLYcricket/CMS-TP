<?php
namespace Home\Controller;

use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;

class IndexController extends Controller
{

    // 检测自动登录
    public function _initialize()
    {
        //判断用户是否已经登录
        if (!isset($_SESSION['is_auth'])) {
            $this->error('对不起,您还没有登录!请先登录再进行浏览', U('Login/login'), 1);
        }
    }

//首页
    public function Index()
    {

        //print_r($_SESSION['user_name']);
        $this->display();

    }

//登录注销
    public function loginout()
    {
        unset($_SESSION['is_auth']);
        unset($_SESSION['user_name']);
        unset($_SESSION['email']);
        $this->success('退出成功！', U('Login/login'), 3);
    }

//文章分类列表
    public function article_category()
    {
        $data = M('article_category');
        $amount = $data->count();
        $page_size = 2;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->article_category = $data->page("{$page},{$page_size}")->select();
        $this->display();
    }


//文章列表
    public function article()
    {
        //print_r($_POST);

        $data_cat = M('article_category');
        $this->article_category = $data_cat->select();
        $this->article_category2 = $this->article_category;
        foreach ($this->article_category as $val) {
            $arr_cat[$val['id']] = $val['name'];
        }
        $this->arr_cat = $arr_cat;


        $article = M('article');
        //$this->tip = true;
        $this->keywords = I('post.keywords');
        if (I('post.category_id') == '') {//用来筛选
            if (I('post.keywords') == '') {
                // $this->arr_article = $article->select();
                $amount = $article->count();
                $page_size = 2;
                $page_size = $amount < $page_size ? $amount : $page_size;//对总记录数和每页显示记录数进行比较
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);//底下显示的页码
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');
                $data = $article->page("{$page},{$page_size}")->select();//从数据库取出数据
                $this->arr_article = $data; 
            } else {
                $arr['keywords'] = ['like', "%" . I('post.keywords') . "%"];
                //$this->arr_article = $article->where($arr)->select();
                $amount = $article->where($arr)->count();
                $page_size = 2;
                $page_size = $amount < $page_size ? $amount : $page_size;//对总记录数和每页显示记录数进行比较
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);//底下显示的页码
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');
                $data = $article->page("{$page},{$page_size}")->where($arr)->select();//从数据库取出数据
                $this->arr_article = $data;
                /*echo $news->getLastSql()."<br>";
                echo $amount;
                exit;*/
            }
        } else {
            if (I('post.keywords') == '') {
                // $this->arr_article = $article->where("category_id={$_POST['category_id']}")->select();
                $amount = $article->where("category_id={$_POST['category_id']}")->count();
                $page_size = 2;
                $page_size = $amount < $page_size ? $amount : $page_size;//对总记录数和每页显示记录数进行比较
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);//底下显示的页码
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');
                $data = $article->page("{$page},{$page_size}")->where("category_id={$_POST['category_id']}")->select();//从数据库取出数据
                $this->arr_article = $data;
            } else {
                $arr['keywords'] = ['like', "%" . I('post.keywords') . "%"];
                $arr['category_id'] = ['eq', I('post.category_id')];
                // $this->arr_article = $article->where($arr)->select();
                $amount = $article->where($arr)->count();
                $page_size = 2;
                $page_size = $amount < $page_size ? $amount : $page_size;//对总记录数和每页显示记录数进行比较
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);//底下显示的页码
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');
                $data = $article->page("{$page},{$page_size}")->where($arr)->select();//从数据库取出数据
                $this->arr_article = $data;
            }
        }
        $this->display();
    }


//管理员列表
    public function manager()
    {
        $data = M('admin');
        $amount = $data->count();
        $page_size = 3;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->admin = $data->page("{$page},{$page_size}")->select();
        $this->display();
    }

//增加文章分类
    public function add_article_category()
    {
        $this->display();
    }

    //添加管理员
    public function add_manager()
    {
        $this->display();
    }

//添加管理员sql语句插入数据库
    public function insert_manager()
    {
        $data = D('admin');
        if ($_POST['password'] == $_POST['password2']) {
            if ($data->create()) {// 根据表单提交的POST数据创建数据对象
                $result = $data->add(); // 写入数据到数据库
                if ($result) {
                    $this->success('操作成功！', U('Index/manager'), 3);
                } else {
                    $this->error('写入错误！');
                }
            } else {
                $this->error($data->getError());
            }
        } else {
            $this->error('前后密码不一致，请重新输入！');
        }
    }

    //删除管理员
    public function manager_delete($id)
    {
        $admin = M('admin');// 实例化news表对象
        $admin->create();// 根据表单提交的POST数据创建数据对象
        $result = $admin->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Index/manager'), 3);
        } else {
            $this->error('写入错误！');
        }
    }

    //管理员信息编辑
    public function editor_manager($id)
    {
        $data = M('admin');
        $this->admin = $data->find($id);
        $this->display();

    }

    //管理员信息提交处理
    public function edit_manager()
    {
        $data = M('admin');
        $this->check_admin = $data->find($_POST['id']);
        if ($this->check_admin['password'] == $_POST['password1']) {
            if ($_POST['password'] == $_POST['password2']) {
                if ($data->create()) {// 根据表单提交的POST数据创建数据对象
                    $result = $data->save(); // 写入数据到数据库
                    if ($result) {
                        $this->success('操作成功！', U('Index/manager'), 3);
                    } else {
                        $this->error('写入错误！');
                    }
                } else {
                    $this->error($data->getError());
                }
            } else {
                $this->error('前后密码不一致，请重新输入！');
            }
        } else {
            $this->error('原密码不正确，请重新输入！');
        }
    }

//分类信息导入数据库
    public function category_insert()
    {
        $data = M('article_category');
        if ($data->create()) {// 根据表单提交的POST数据创建数据对象
            $result = $data->add(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/article_category'), 3);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($data->getError());
        }
    }

//编辑分类信息网页显示
    public function category_editor($id)
    {
        $data = M('article_category');
        // 读取数据
        $article_category = $data->find($id);
        if ($article_category) {
            $this->article_category = $article_category;// 模板变量赋值
        } else {
            $this->error('数据错误');
        }
        $this->display();
    }

//编辑后数据导入
    public function category_edit()
    {
        $article_category = M('article_category');// 实例化news表对象
        $article_category->create();// 根据表单提交的POST数据创建数据对象
        $result = $article_category->save(); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Index/article_category'), 3);
        } else {
            $this->error($article_category->getError());
        }
    }

//分类删除
    public function category_delete($id)
    {
        //print_r($id);
        // exit;

        $article_category = M('article_category');// 实例化news表对象
        $article_category->create();// 根据表单提交的POST数据创建数据对象
        $result = $article_category->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Index/article_category'), 3);
        } else {
            $this->error('写入错误！');
        }
    }

//添加文章
    public function add_article()
    {
        $data = M('article_category');
        $this->article_category = $data->select();
        $this->display();
    }

//添加文章数据导入数据库
    public function insert_article()
    {
        $article = D('article');// 实例化news表对象
        $pic = self::saveUpload();
        if ($article->create()) {// 根据表单提交的POST数据创建数据对象
            $article->pic = $pic;
            $result = $article->add(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/article'), 3);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($article->getError());
        }
    }

//图片地址存取
    public function saveUpload()
    {
        $file_path = '';
        if (IS_POST) {
            // 判断是否为post提交
            $upload = new Upload();
            $results = $upload->uploadOne($_FILES['pic']); // 上传多个文件
            if ($results) {
                $file_path = "/uploads/" . $results['savepath'] . $results['savename'];
            }
        }
        return $file_path;
    }

//文章信息网页显示
    public function editor_article($id)
    {
        $data = M('article_category');
        $this->article_category = $data->select();

        $data = M('article');
        // 读取数据
        $article = $data->find($id);
        if ($article) {
            $this->article = $article;// 模板变量赋值
        } else {
            $this->error('数据错误');
        }
        $this->display();
    }

//编辑后文章信息导入数据库
    public function edit_article()
    {
//print_r($_POST);
        $article = D('article');// 实例化news表对象
        $pic = self::saveUpload();
//var_dump($pic);
        if ($article->create()) {// 根据表单提交的POST数据创建数据对象
            if (count($pic) > 0) {
                $article->pic = $pic;
            } else {
                $article->pic = $_POST['photo'];
            }
            $result = $article->save(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/article'), 3);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($article->getError());
        }
    }

//删除文章
    public function delete_article($id)
    {
        $article = M('article');// 实例化news表对象
        $article->create();// 根据表单提交的POST数据创建数据对象
        $result = $article->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Index/article'), 3);
        } else {
            $this->error('写入错误！');
        }
    }

//群删文章
    public function delete_all_article()
    {
        //print_r($_POST);
        //exit;
        $article = D('article');// 实例化news表对象
        if ($_POST['action'] == "del_all") {

            $article->create();// 根据表单提交的POST数据创建数据对象
            $del_id = implode(',', $_POST['checkbox']);
            $result = $article->delete($del_id); // 写入删除语句到数据库
            //  echo $article->getLastSql();
            if ($result) {
                $this->success('操作成功！', U('Index/article'), 3);
            } else {
                $this->error('写入错误！');
            }

        } elseif ($_POST['action'] == "category_move") {


            //$pic = self::saveUpload();
            foreach (I('post.checkbox') as $val) {
                $k = I('post.new_cat_id');
                $sql = "update article set category_id = $k where id = $val ";
                $result = $article->execute($sql);
            }
            if ($result) {
                $this->success('操作成功！', U('Index/article'), 3);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($article->getError());
        }
    }

    //首页幻灯片导入数据库
    public function show_insert()
    {
        $ppt = D('ppt');// 实例化news表对象
        $pic = self::saveUpload();
        if ($ppt->create()) {// 根据表单提交的POST数据创建数据对象
            $ppt->url = $pic;
            $result = $ppt->add(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/show'), 1);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($ppt->getError());
        }
    }

    //首页幻灯片列表
    public function show()
    {
        $data = M('ppt');
        $amount = $data->count();
        $page_size = 5;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->ppt = $data->page("{$page},{$page_size}")->select();
        $this->display();
    }

    //编辑幻灯片
    public function editor_show($id)
    {
        $data = M('ppt');
        $amount = $data->count();
        $page_size = 5;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->ppt = $data->page("{$page},{$page_size}")->select();
        //编辑
        // 读取数据
        $data_show = M('ppt');
        $ppt_show = $data_show->find($id);
        if ($ppt_show) {
            $this->ppt_show = $ppt_show;// 模板变量赋值
        } else {
            $this->error('数据错误');
        }
        $this->display();
    }

    //幻灯片编辑信息导入数据库
    public function edit_show()
    {

        $ppt = D('ppt');// 实例化news表对象
        $pic = self::saveUpload();
        if ($ppt->create()) {// 根据表单提交的POST数据创建数据对象
            $ppt->url = $pic;
            $result = $ppt->save(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/show'), 3);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($ppt->getError());
        }
    }

    //删除幻灯片
    public function delete_show($id)
    {
        $article = M('ppt');// 实例化news表对象
        $article->create();// 根据表单提交的POST数据创建数据对象
        $result = $article->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Index/show'), 3);
        } else {
            $this->error('写入错误！');
        }
    }


    //首页公告栏导入数据库
    public function page_insert()
    {
        $notice = D('notice');// 实例化news表对象
        $pic = self::saveUpload();
        if ($notice->create()) {// 根据表单提交的POST数据创建数据对象
            $notice->pic = $pic;
            $result = $notice->add(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/page'), 1);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($notice->getError());
        }
    }

    //首页公告栏列表
    public function page()
    {
        $data = M('notice');
        $amount = $data->count();
        $page_size = 5;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->notice = $data->page("{$page},{$page_size}")->select();
        $this->display();
    }

    //编辑公告栏
    public function editor_page($id)
    {
        $data = M('notice');
        $amount = $data->count();
        $page_size = 5;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->notice = $data->page("{$page},{$page_size}")->select();
        //编辑
        // 读取数据
        $data_show = M('notice');
        $notice_show = $data_show->find($id);
        if ($notice_show) {
            $this->notice_show = $notice_show;// 模板变量赋值
        } else {
            $this->error('数据错误');
        }
        $this->display();
    }

    //公告栏编辑信息导入数据库
    public function edit_page()
    {

        $notice = D('notice');// 实例化news表对象
        $pic = self::saveUpload();
        if ($notice->create()) {// 根据表单提交的POST数据创建数据对象
            $notice->pic = $pic;
            $result = $notice->save(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Index/page'), 3);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($notice->getError());
        }
    }

    //删除公告栏
    public function delete_page($id)
    {
        $article = M('notice');// 实例化news表对象
        $article->create();// 根据表单提交的POST数据创建数据对象
        $result = $article->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Index/page'), 3);
        } else {
            $this->error('写入错误！');
        }
    }

}
