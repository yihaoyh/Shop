<?php

class CateAction extends CommonAction {

    public function index() {
        $model = M("Cate");
        $list = $model->select();
        import("ORG.Util.Page"); // 导入分页类
        $count = $model->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order("id desc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign("page", $show);
        $this->assign("list", $list);
        $this->display();
    }

    public function insert() {
        $data['name'] = $this->checkstr($_POST['cate']);
        if ($data['name'] == '') {
            $this->error("名字不能为空", "?s=Cate/index");
        } else {
            $model = M("Cate");
            $id = $model->add($data);
            if ($id) {
                $this->success("添加成功", "?s=Cate/index");
            } else {
                $this->error("添加失败", "?s=Cate/index");
            }
        }
    }

    public function edit() {
        $id = $this->checkstr($_GET['id']);
        $model = M("Cate");
        $one = $model->where("id='{$id}'")->find();
        if (!$one) {
            $this->error("没有找到此记录", "?s=Cate/index");
        }
        $this->assign("one", $one);
        $this->display();
    }

    public function update() {
        $data['id'] = $this->checkstr($_POST['id']);
        $data['name'] = $this->checkstr($_POST['name']);
        $model = M("Cate");
        $one = $model->save($data);
        if ($one) {
            $this->success("更新成功", "?s=Cate/index");
        } else {
            $this->error("更新失败", "?s=Cate/index");
        }
    }

    public function del() {
        $id= $this->checkstr($_GET['id']);
        $model = M("Cate");
        $one = $model->where("id='{$id}'")->delete();
        if ($one) {
            M("keshi")->where("pid='{$id}'")->delete();//删除对应的科室
            $this->success("删除成功", "?s=Cate/index");
        } else {
            $this->error("删除失败", "?s=Cate/index");
        }
    }

    private function checkstr($str) {
        if (is_string($str)) {
            $str = htmlspecialchars($str);
            if (!get_magic_quotes_gpc()) {
                $str = addslashes($str);
            }
        }
        return trim($str);
    }

}
