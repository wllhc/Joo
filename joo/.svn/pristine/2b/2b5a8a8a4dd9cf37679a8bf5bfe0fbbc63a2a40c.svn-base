<?php
class aboutusAction extends frontendAction {

    public function index() {
        $id = $this->_get('id', 'intval');
        !$id && $this->redirect('index/index');
        $info = M('article_page')->find($id);
        $this->assign('info', $info);
        $this->assign('id', $id);
        $this->_config_seo();
        $this->display();
    }

    public function flink() {
        $this->_config_seo();
    	$this->display();
    }

    /**
     * 团队成员
     *
     */
    public function team() {
        $team_info = M('team_member')->select();
        dump($team_info);
        $this->assign('info', $team_info);
        $this->_config_seo();
    	$this->display();
    }
}
