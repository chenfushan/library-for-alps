<?php 
	/**
	* 这个是用来存放全局变量的静态类
	* 2015/08/16 create by Alps
	*/
	class GlobalVariable
	{
		/**
		 * WeChat platform appId
		 * @var string
		 */
		const APP_ID = "wx84a20704532ab29a";
		// wechat secret var
		/**
		 * WeChat platform secret
		 * @var string
		 */
		const SECRET = "php_secret";

		/**
		 * WeChat platform id
		 * @var string
		 */
		const TEMPLATE_URL = "https://api.weixin.qq.com/cgi-bin/message/template/send?";

		/**
		 * WeChat access token url
		 * @var  string 
		 */
		const ACCESS_TOKEN_URL = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&";

	}
 ?>
