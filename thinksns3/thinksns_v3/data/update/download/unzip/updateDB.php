<?php
// 升级入口方法
function updateDB() {
	DBchang ();
	updateVersion ();
}
function DBchang() {
	$installfile = DATA_PATH . '/update/download/unzip/updateDB.sql';
	M()->executeSqlFile($installfile, false);
}

// 更新版本号
function updateVersion() {
	//更新后台的JS版本
	$info = model('Xdata')->get('admin_Config:site');
	$info['sys_version'] = '2013052318';
	model('Xdata')->put('admin_Config:site', $info);	

	//记录本次版本号
	model('Xdata')->put('update:version', '2013052318');

	//更新错误的地区信息
	$pid = M('area')->where("title='密云县'")->getField('pid');
	//dump($pid);

	if(!empty($pid)){
		$map['area_id'] = $pid;
		$res = M('area')->where($map)->find();
		if(!$res){
			$map['title'] = '县';
			$map['pid'] = 110000;
			$map['sort'] = 2;dump($map);
			$ss = M('area')->add($map);
			//dump($ss);dump(M('area')->getLastSql());
		}
	}
}