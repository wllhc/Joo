<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dell
 * Date: 13-4-12
 * Time: 上午10:26
 * To change this template use File | Settings | File Templates.
 */

class cameristAction extends frontendAction{
    /**
     * 摄影师首页
     */
    public function index() {
        $user_follow_mod = M('user');
        $db_pre = C('DB_PREFIX');
        $uf_table = $db_pre . 'user';
        $pagesize = 20;
        $count = $user_follow_mod->count();
        //$count = $user_follow_mod->where(array('uid' => $this->_user['id']))->count();
        $pager = $this->_pager($count, $pagesize);
        //$where = array($uf_table . '.uid' => $this->_user['id']);
        //$field = 'u.id,u.username,u.fans,u.last_time,' . $uf_table . '.add_time,' . $uf_table . '.mutually';
        //$join = $db_pre . 'user u ON u.id=' . $uf_table . '.follow_uid';
        //$user_list = $user_follow_mod->field($field)->order($uf_table . '.add_time DESC')->limit($pager->firstRow . ',' . $pager->listRows)->select();
        $user_list = $user_follow_mod->order($uf_table . '.reg_time DESC')->limit($pager->firstRow . ',' . $pager->listRows)->select();
        $this->assign('user_list', $user_list);
        $this->assign('page_bar', $pager->fshow());
        $this->assign('tab_current', 'follow');
        $this->_config_seo(array(
            //'title' => $this->_user['username'] . L('space_follow_title') . '-' . C('pin_site_name'),
            'title' => L('摄影师') . '-' . C('pin_site_name'),
        ));
        $this->display();
    }

}