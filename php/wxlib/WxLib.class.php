<?php 
	require_once 'GlobalVariable.class.php';

	/**
	* 微信封装接口函数
	* 此类依赖于GloblVariable实现。
	*/
	class WxLib
	{
		/**
		 * WeChat platform appId
		 * @var string
		 */
		private static $appId = GlobalVariable::APP_ID;
		/**
		 * WeChat platform secret
		 * @var string
		 */
		private static $secret = GlobalVariable::SECRET;

		/**
		 * WeChat get access token url
		 * @var string
		 */
		private static $accessTokenUrl = GlobalVariable::ACCESS_TOKEN_URL;

		/**
		 * WeChat send template message url
		 * @var string
		 */
		private static $templateSendUrl = GlobalVariable::TEMPLATE_URL;

		/**
		 * private construct : can't instance the WxLib object
		 */
		private function __construct() {
		}

		/**
		 * return the weixin global access token.
		 * @return global_access_token [WeChat platform access token]
		 */
		public static function getAccessToken()
		{
			//this function just return the wx's global access token by appid and secret
			//but I havn't consider the exception
			//if the wx server return a errmsg, It should return a false.
			$url = self::$accessTokenUrl . "appid=" . self::$appId."&secret=" . self::$secret;
			$globalAccessTokenJson = json_decode(file_get_contents($url), true);
			$globalAccessToken = $globalAccessTokenJson['access_token'];
			return $globalAccessToken;
		}

		/**
		 * construct a template message content
		 * @param  object $TemplateObject a object contains template info
		 * @return string                 template message string
		 */
		public static function constructTemplate($TemplateObject)
		{
			$json = '{
	           "touser":"' 		. $TemplateObject->getToUser() 		.'",
	           "template_id":"'	. $TemplateObject->getTemplatedId()	.'",
	           "url":'			. $TemplateObject->getUrl() 		.'",
	           "topcolor":"'	. $TemplateObject->getTopColor() 	.'",
	           "data":{'		. $TemplateObject->getData() 		.'}
	        }';
	        return $json;
		}

		/**
		 * send template message
		 * @param  string $globalAccessToken WeChat global access token
		 * @param  string $json              template message string
		 * @return json                    {"errcode": 0, "errmsg":"ok", "msgid":200228332 }
		 */
		public static function sendTemplate($json = null)
		{
			$result = self::HttpsRequest(self::$templateSendUrl, $json);
			return $result;
		}

		/**
		 * send http request to url
		 * @param string $url  request url
		 * @param string $data send data
		 */
		private static function HttpsRequest($url, $data = null) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
			if (!empty($data)) {
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$output = curl_exec($curl);
			curl_close($curl);
			return $output;
		}
	}
 ?>