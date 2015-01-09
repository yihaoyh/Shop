<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        if ($_SESSION['uid'] == C('md5passwd')) {
            $this->display('loginindex');
        } else {
            $this->display();
        }
    }

    public function logininsert() {
        $m = C('username');
        $n = C('passwd');
        if ($m === trim($_POST['name']) && $n === trim($_POST['passwd'])) {
            $_SESSION['uid'] = md5('!qaz@wsx');
            $this->success("登录成功", "?s=Index/loginindex");
        } else {
            $this->error("登录失败", "?s=Index/index");
        }
    }

    public function loginindex() {
        $this->display();
    }

    //登出
    public function logout() {
        unset($_SESSION['uid']);
        session_destroy();
        $this->success("退出成功!!", "admin.php");
    }

}
