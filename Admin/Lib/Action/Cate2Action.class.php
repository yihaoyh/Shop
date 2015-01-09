<?php

class Cate2Action extends CommonAction {

    public function index() {
        $id = checkstr($_GET['id']);//分类
        $model = M("cate2");
        $list = $model->where("pid='{$id}'")->select();
        import("ORG.Util.Page"); // 导入分页类
        $count = $model->where("pid='{$id}'")->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->where("pid='{$id}'")->order("id desc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign("id", $id);
        $this->assign("page", $show);
        $this->assign("list", $list);
        $this->display();
    }

    public function insert() {
        $data['pid'] = checkstr($_POST['pid']);
        $data['name'] = checkstr($_POST['cate2']);
        if ($data['name'] == '') {
            $this->error("名字不能为空", "?s=Cate2/index&id=".$data['pid']);
        } else {
            $model = M("Cate2");
            $id = $model->add($data);
            if ($id) {
                $this->success("添加成功", "?s=Cate2/index&id=".$data['pid']);
            } else {
                $this->error("添加失败", "?s=Cate2/index&id=".$data['pid']);
            }
        }
    }

    public function edit() {
        $id = checkstr($_GET['id']);
        $model = M("Cate2");
        $one = $model->where("id='{$id}'")->find();
        if (!$one) {
            $this->error("没有找到此记录", "?s=Cate2/index&id=".$one['pid']);
        }
        $this->assign("one", $one);
        $this->display();
    }

    public function update() {
        $data['id'] = checkstr($_POST['id']);
        $data['pid'] = checkstr($_POST['pid']);
        $data['name'] = checkstr($_POST['name']);
        $model = M("Cate2");
        $one = $model->save($data);
        if ($one) {
            $this->success("更新成功", "?s=Cate2/index&id=".$data['pid']);
        } else {
            $this->error("更新失败", "?s=Cate2/index&id=".$data['pid']);
        }
    }

    public function del() {
        $id= checkstr($_GET['id']);
        $model = M("Cate2");
        $pid = checkstr($_GET['pid']);
        $one = $model->where("id='{$id}'")->delete();
        if ($one) {
            $this->success("删除成功", "?s=Cate2/index&id=".$pid);
        } else {
            $this->error("删除失败", "?s=Cate2/index&id=".$pid);
        }
    }

   
}
