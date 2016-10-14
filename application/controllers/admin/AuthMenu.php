<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthMenu extends Home_Auth_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$rules = $this->db->select('*')->order_by('sort', 'asc')->get('auth_rule')->result_array();
        foreach ($rules as $key => $value) {
            $rules[$key]['order'] = $value['sort'];
        	$rules[$key]['parentid']= $value['pid'];
        	$rules[$key]['name'] = lang($value['language_label']);
        	$rules[$key]['title'] = $value['method'];
        	$rules[$key]['isshow'] = $value['isshow']?'√':'×';
        }

        $this->load->library('tree');
        $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
        $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->tree->init($rules);
        $str = "<option value=\$id >\$spacer\$name</option>";
        $menus = $this->tree->get_tree(0,$str,1);
        $tdStr = "<tr>
                    <td width='60px'><input type='text' class='form-control' name='order[\$id]' value='\$order'></td>
                    <td>\$id</td>
                    <td>\$spacer\$name</td>
                    <td>\$title</td>
                    <td><font color='red'>\$isshow</font></td>
                    <td>\$create_time</td>
                    <td><a href='javascript:void(0)' class='btn btn-sm btn-primary edit-btn' data-val='\$id' ><i class='fa fa-edit'></i></a> <a href='javascript:void(0)' class='btn btn-sm btn-danger delete-btn' data-val='\$id' ><i class='fa fa-trash'></i></a></td>
                </tr>";
        $this->tree->init($rules);
        $tr = $this->tree->get_tree(0, $tdStr);
        $arr['menus'] = $menus;
        $arr['tr'] = $tr;
        $this->twig->render('admin/AuthMenu/index.html',$arr);
	}


    public function addMenu(){
        if($this->input->is_ajax_request()){
            $language_label = trim($this->input->post('title'));
            $method = trim($this->input->post('name'));
            $isshow = trim($this->input->post('isshow'));
            $icon = $this->input->post('icon');
            $pid = $this->input->post('pid');
            if(!$language_label){
                $this->response_data('error','菜单名称不能为空');
            }
            $data = $this->db->get_where('auth_rule', array('language_label'=>$language_label,'pid'=>$pid))->row_array();
            if($data){
                $this->response_data('error','菜单名称已经存在');
            }

            $status = $this->db->insert('auth_rule',array('create_time'=>date('Y-m-d H:i:s', time()),'language_label'=>$language_label,'is_show'=>$isshow,'method'=>$method,'pid'=>$pid,'icon'=>$icon));
            if($status){
                $this->response_data('success','菜单添加成功');
            }
        }
    }

    /**
     * 获取不包含本身菜单的层级
     */
    public function ajaxGetMenu(){
        if($this->input->is_ajax_request()){
           $mid = trim($this->input->post('id'));
            $rules = $this->db->select('*')->order_by('sort', 'asc')->get_where('auth_rule',array('id!='=>$mid))->result_array();
            foreach ($rules as $key => $value) {
                $rules[$key]['order'] = $value['sort'];
                $rules[$key]['parentid']= $value['pid'];
                $rules[$key]['name'] = lang($value['language_label']);
                $rules[$key]['title'] = $value['method'];
                $rules[$key]['isshow'] = $value['isshow']?'√':'×';
                $rules[$key]['create_time'] = date('Y-m-d H:i:s', $value['create_time']);
            }
            $this->load->library('tree');
            $this->tree->icon = array('&nbsp;&nbsp;&nbsp;','&nbsp;&nbsp;&nbsp;├─ ','&nbsp;&nbsp;&nbsp;└─ ');
            $this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';
            $this->tree->init($rules);
            $str = "<option value=\$id >\$spacer\$name</option>";
            $menus = $this->tree->get_tree(0,$str,1);
            $arr['menus'] = '<option value="0">--顶级菜单--</option>'.$menus;
            $info = $this->db->select('*')->get_where('auth_rule',array('id='=>$mid))->row_array();
            $arr['info'] = $info;
            $this->response_data('success','获取成功',$arr);

        }
    }

    /**
     * 编辑保存菜单
     */

    public function saveMenu(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            $is_show = $this->input->post('is_show');
            $pid = $this->input->post('pid');
            $icon = $this->input->post('icon');
            $menu_title = $this->input->post('menu_title');
            $method = $this->input->post('method');
            if(empty($menu_title)){
                $this->response_data('error','菜单名称不能为空');
            }
            $this->db->update('auth_rule', array('method'=>$method,'language_label'=>$menu_title,'is_show'=>$is_show,'pid'=>$pid,'icon'=>$icon), array('id'=>$id));
            $this->response_data('success','菜单编辑成功');
        }
    }

    public function delMenu(){
        if($this->input->is_ajax_request()){
            $id = $this->input->post('id');
            $data = $this->db->get_where('auth_rule', array('pid'=>$id))->result_array();
            if($data){
                $this->response_data('error','当前菜单下，存在子菜单');
            }else{
                $this->db->delete('auth_rule', array('id'=>$id));
                $this->response_data('success','删除成功');
            }
        }

    }

    public function order(){
        $orders = $this->input->post('order');
        foreach ($orders as $key => $value) {
            $this->db->update('auth_rule', array('sort'=>$value), array('id'=>$key));
        }
        $this->response_data('success','排序成功');
    }




}
