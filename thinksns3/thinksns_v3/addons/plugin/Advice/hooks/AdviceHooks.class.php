<?php
/**
 * 天气预报钩子
 * @author 程序_小时代
 * @version TS3.0
 */
class AdviceHooks extends Hooks
{
	/**
     * 主页右上方钩子，加载换肤插件按钮
     * @return void
     */
    public function home_index_right_bottom()
    {
	   $this->assign('url',$this->htmlPath.'/html');	
       $this->display('advice');
    }


}