<?php

//用户
class UserAction extends CommonAction {

    public function index() {
        $model = M("User");
        $list = $model->select();
        import("ORG.Util.Page"); // 导入分页类
        $count = $model->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order("id desc,create_time asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign("page", $show);
        $this->assign("list", $list);
        $this->display();
    }
    
    //拉黑
    public function lahei() {
        $model = M("User");
        $id = checkstr($_GET['id']);
        $data['status'] = 1;
        $res = $model->where("id='{$id}'")->save($data);
        if ($res) {
            $this->success("操作成功", "?s=User/index");
        } else {
            $this->error("操作失败", "?s=User/index");
        }
    }

    //不拉黑
    public function unlahei() {
        $model = M("User");
        $data['id'] = checkstr($_GET['id']);
        $data['status'] = 0;
        $id = $model->save($data);
        if ($id) {
            $this->success("操作成功", "?s=User/index");
        } else {
            $this->error("操作失败", "?s=User/index");
        }
    }
}
