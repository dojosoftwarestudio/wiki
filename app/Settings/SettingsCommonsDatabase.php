<?php
namespace App\Settings;

class SettingsCommonsDatabase{

	private static $default_length = 250;
	private static $code_length = 20;

	public static function getDefaultLength(){
		return self::$default_length;
	}

	public static function getCodeLength(){
		return self::$code_length;
	}

	public static function addAuditFields(object $table){
		$table->string('status', 20);
		$table->string('reg_del',10)->default('valid');
		$table->string('user_mod', 200);
	}

}