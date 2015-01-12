<?php

//产品
class ProductAction extends CommonAction {

    public function index() {
        $model = M("Product");
        $list = $model->select();
        import("ORG.Util.Page"); // 导入分页类
        $count = $model->count(); // 查询满足要求的总记录数
        $Page = new Page($count, 20); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order("id desc,display asc")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign("page", $show);
        $this->assign("list", $list);
        $this->display();
    }

    //显示
    public function accept() {
        $model = M("Product");
        $id = checkstr($_GET['id']);
        $data['display'] = 1;
        $res = $model->where("id='{$id}'")->save($data);
        if ($res) {
            $this->success("操作成功", "?s=Product/index");
        } else {
            $this->error("操作失败", "?s=Product/index");
        }
    }

    //不显示
    public function unaccept() {
        $model = M("Product");
        $data['id'] = checkstr($_GET['id']);
        $data['display'] = 0;
        $id = $model->save($data);
        if ($id) {
            $this->success("操作成功", "?s=Product/index");
        } else {
            $this->error("操作失败", "?s=Product/index");
        }
    }

    //ajax调用
    public function show() {
        $id = checkstr($_POST['id']);
        $list = M("cate2")->where("pid='{$id}'")->select();
        $html = '<td width="10%" align="center">二级分类</td><td><select name="cid2">';
        foreach ($list as &$v) {
            $html .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
        }
        $html .='</select></td>';
        $html = json_encode($html);
        exit('{"html":' . $html . '}');
    }

    public function add() {
        $cate = M("cate")->select();
        $this->assign("cate", $cate);
        $this->display();
    }

    public function insert() {
        foreach ($_POST as &$v) {
            $v = checkstr($v);
        }
        $res = $this->_upload();
        $_POST['photo'] = $res[0]['savename'];
        $model = M("product");
        $id = $model->add($_POST);
        if ($id) {
            $this->success("设置成功", "?s=Product/add");
        } else {
            $this->error("设置失败", "?s=Product/add");
        }
    }

    // 文件上传
    protected function _upload() {
        set_time_limit(0);
        import("@.ORG.UploadFile");
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize = 3292200;
        //设置上传文件类型
        $upload->allowExts = explode(',', 'jpg,png');
        //设置附件上传目录
        $upload->savePath = './Public/product/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix = 's_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth = '200';
        //设置缩略图最大高度
        $upload->thumbMaxHeight = '300';
        //设置上传文件规则
        $upload->saveRule = uniqid;
        //删除原图
        //$upload->thumbRemoveOrigin = true;
        if (!$upload->upload()) {
            //捕获上传异常
            $this->error($upload->getErrorMsg());
        } else {
            //取得成功上传的文件信息
            $uploadList = $upload->getUploadFileInfo();
            import("@.ORG.Image");
        }
        return $uploadList;
    }

    public function edit() {
        $id = checkstr($_GET['id']);
        $list = M("product")->where("id='{$id}'")->find();
        $cate = M("cate")->select();
        $cate2 = M("cate2")->where("pid='{$list['cid']}'")->select();
        $this->assign("cate", $cate);
        $this->assign("cate2", $cate2);
        $this->assign("list", $list);
        $this->display();
    }

    public function update() {
        $id = checkstr($_POST['id']);
        foreach ($_POST as &$v) {
            $v = checkstr($v);
        }
        if ($_FILES['file']['name']) {
            $res = $this->_upload();
            $_POST['photo'] = $res[0]['savename'];
        }
        $model = M("product");
        $res = $model->save($_POST);
        if ($res) {
            $this->success("更新成功", "?s=Product/edit&id=" . $id);
        } else {
            $this->error("更新失败", "?s=Product/edit&id=" . $id);
        }
    }

    //删除
    public function del() {
        $id = checkstr($_GET['id']);
        $model = M("product");
        $res = $model->where("id='{$id}'")->delete();
        if ($res) {
            $this->success("删除成功", "?s=Product/index");
        } else {
            $this->error("删除失败", "?s=Product/index");
        }
    }

}
