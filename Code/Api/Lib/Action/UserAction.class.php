<?php

//用户
class UserAction extends CommonAction {

    //注册
    public function reg() {
        foreach ($_REQUEST as &$v) {
            $v = checkstr($v);
        }
        $_REQUEST['password'] = md5($_REQUEST['password']);
        $model = M("User");
        $list = $model->where("name = '{$_REQUEST['name']}'")->find();
        if (!empty($list)) {
            error(1, "name eror");
        }
        $id = $model->add($_REQUEST);
        if ($id) {
            error(0, "reg ok");
        } else {
            error(1, "reg error");
        }
    }

    //登录
    public function login() {
        foreach ($_REQUEST as &$v) {
            $v = checkstr($v);
        }
        $_REQUEST['password'] = md5($_REQUEST['password']);
        $model = M("User");
        $list = $model->where("name = '{$_REQUEST['name']}' and password='{$_REQUEST['password']}'")->find();
        if (!empty($list)) {
            $_SESSION['name'] = $_REQUEST['name'];
            $_SESSION['password'] = md5($_REQUEST['password']);
            $_SESSION['authid'] = md5(rand(10000, 1000000));
            error(0, "login ok");
        } else {
            error(0, "login error");
        }
    }

}
