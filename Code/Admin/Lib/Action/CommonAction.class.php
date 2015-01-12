<?php


class CommonAction extends Action {

    public function _initialize() {
        if ($_SESSION['uid'] != C('md5passwd')) {
            $this->error("请先登录", "admin.php");
        }
    }

}
