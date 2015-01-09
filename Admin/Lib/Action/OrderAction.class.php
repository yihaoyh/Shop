<?php

//订单
class OrderAction extends CommonAction {

    public function index() {
        $model = M("Order");
        $list = $model->select();
        import("ORG.Util.Page"); // 导入分页类
        $count = $model->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order("create_time asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign("page", $show);
        $this->assign("list", $list);
        $this->display();
    }

    //审核通过
    public function shenhe() {
        $model = M("Order");
        $data['id'] = checkstr($_GET['id']);
        $data['status'] = 1;
        $id = $model->save($data);
        if ($id) {
            $this->success("操作成功", "?s=Order/index");
        } else {
            $this->error("操作失败", "?s=Order/index");
        }
    }

    //拒绝审核通过
    public function unshenhe() {
        $model = M("Order");
        $data['id'] = checkstr($_GET['id']);
        $data['status'] = 2;
        $id = $model->save($data);
        if ($id) {
            $this->success("操作成功", "?s=Order/index");
        } else {
            $this->error("操作失败", "?s=Order/index");
        }
    }

}
