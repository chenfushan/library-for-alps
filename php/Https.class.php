<?php 
	/**
	* http request to url
	* Alps create 2015/10/09
	*/
	class Https
	{
		private $url;
		private $timeout;
		private $data;
		function __construct()
		{
		}
		/**
		 * send http request json data
		 * @param string $url  send url
		 * @param string $data send json data
		 */
		function HttpsRequest($url, $data = null) {
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
		/**
		 * send http request xml data and receive xml data
		 * @param string $url     send url
		 * @param string $data    send xml data
		 * @param int $timeout connect time out
		 */
		public function HttpsPostXmlRequest($url, $data = null, $timeout) {
			$ch = curl_init();
			//设置超时
			curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
			
			// //如果有配置代理这里就设置代理
			// if(WxPayConfig::CURL_PROXY_HOST != "0.0.0.0" 
			// 	&& WxPayConfig::CURL_PROXY_PORT != 0){
			// 	curl_setopt($ch,CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST);
			// 	curl_setopt($ch,CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT);
			// }
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,TRUE);
			curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);//严格校验
			//设置header
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			//要求结果为字符串且输出到屏幕上
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		
			//post提交方式
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			//运行curl
			$data = curl_exec($ch);
			//返回结果
			if($data){
				curl_close($ch);
				$values = array();
				$values = json_decode(json_encode(simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
				// $values = simplexml_load_string($data);		
					// var_dump($values);

				return $values;
			} else { 
				$error = curl_errno($ch);
				curl_close($ch);
				return false;
			}
		}
	}
	

	
 ?>