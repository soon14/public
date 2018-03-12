<?php
namespace WY\app\controller;

use WY\app\libs\Model;
use WY\app\model\Pushorder;
if (!defined('WY_ROOT')) {
    exit;
}
class ordernotify extends Model
{
    public function index()
    {
        $stime = time();
        $days = time() - 60 * 60 * 3;
        $orders = $this->model()->select('id,orderid')->from('orders')->where(array('fields' => 'is_notify<>? and is_state=? and addtime>=?', 'values' => array(1, 1, $days)))->fetchAll();

		
        if ($orders) {
            foreach ($orders as $key => $val) {
                $o = $this->model()->select('times,nexts,addtime')->from('ordernotify')->where(array('fields' => 'orid=? and times<3 and is_status<>?', 'values' => array($val['id'], 3, 1)))->fetchRow();
                if ($o && $o['addtime'] + $o['nexts'] <= time()) {
                    $push = new Pushorder($val['orderid']);
                    $push->notify();
                }
            }
        }
        $etime = time();
        $time = $etime - $stime;
        echo json_encode(array('status' => 1, 'stime' => date('Y-m-d H:i:s', $stime), 'etime' => date('Y-m-d H:i:s', $etime), 'time' => $time));
    }
}