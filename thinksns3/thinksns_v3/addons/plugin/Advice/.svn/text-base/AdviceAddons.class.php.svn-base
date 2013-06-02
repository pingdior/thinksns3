<?php
/**
 * TS插件 - 天气预报插件
 * @author 程序_小时代
 * @version TS3.0
 */
class AdviceAddons extends NormalAddons
{
	protected $version = '0.1';
	protected $author = '梦想天空(IdealBinding)';
	protected $site = '';
	protected $info = '右侧建议提议框';
	protected $pluginName = '快速建议';
	protected $sqlfile = '暂无';
	protected $tsVersion = "3.0";
	
	/**
	 * 获的改插件使用了那些钩子聚合类，那些钩子是需要进行排序的
	 * @return void
	 */
	public function getHooksInfo()
	{
		$hooks['list'] = array('AdviceHooks');
		return $hooks;
	}

	/**
	 * 后台管理入口
	 * @return array 管理相关数据
	 */
	public function adminMenu()
	{
		// $menu = array('config'=>'天气管理');
		// return $menu;
	}

	public function start()
	{

	}

	public function install()
	{
		return true;
	}

	public function uninstall()
	{
		return true;
	}
}