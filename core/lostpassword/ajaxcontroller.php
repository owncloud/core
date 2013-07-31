<?php

class OC_Core_LostPassword_Ajax_Controller {
	public static function lost()	{
		OCP\JSON::callCheck();
	
		try {
			OC_Core_LostPassword_Controller::sendEmail(@$_POST['user'], @$_POST['proceed']);
			OCP\JSON::success();
		} catch (EncryptedDataException $e){
			OCP\JSON::error(
				array('encryption' => '1')
			);
		} catch (Exception $e){
			OCP\JSON::error(
				array('msg'=> $e->getMessage())
			);
		}
		
		exit();
	}
	
	public static function resetPassword($args) {
		OCP\JSON::callCheck();
		try {
			OC_Core_LostPassword_Controller::resetPassword($args);
			OCP\JSON::success();
		} catch (Exception $e){
			OCP\JSON::error(
				array('msg'=> $e->getMessage())
			);
		}
		exit();
	}
}