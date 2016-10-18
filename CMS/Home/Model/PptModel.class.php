<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/29
 * Time: 16:46
 */
namespace Home\Model;
use Think\Model;
class PptModel extends Model{
    // 定义自动验证
    protected $_validate  = array(
        array('name', 'require', '请填写名称'),
    );

    // 定义自动完成
    protected $_auto = array(
        array('created_at', 'getDate', Model::MODEL_INSERT, 'callback'),
        array('created_at', 'getDate', Model::MODEL_UPDATE, 'callback'),
    );

    // 获取当前日期时间
    public function getDate()
    {
        return date("Y-m-d H:i:s");
    }
}