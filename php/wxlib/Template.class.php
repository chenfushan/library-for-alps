<?php 
	/**
	* WeChat Template message
	*/
	class Template
	{
		/**
		 * to user openid
		 * @var string
		 */
		private $toUser = "";
		/**
		 * template message id
		 * @var string
		 */
		private $templateId ="";
		/**
		 * the template message redirect url
		 * @var string
		 */
		private $url ="";
		/**
		 * template message data
		 * @var string
		 */
		private $data ="";
		/**
		 * template message top color
		 * @var string
		 */
		private $topColor = "";
		function __construct(argument){}

		/**
		 * get toUser openid
		 * @return string up
		 */
		public function getToUser()
		{
			return $this->$toUser;
		}

		/**
		 * get template message id
		 * @return string up
		 */
		public function getTemplateId()
		{
			return $this->templateId;
		}

		/**
		 * get redirect url
		 * @return string up
		 */
		public function getUrl()
		{
			return $this->url;
		}

		/**
		 * get template message data
		 * @return string up
		 */
		public function getData()
		{
			return $this->data;
		}

		/**
		 * get template message top color
		 * @return string top color
		 */
		public function getTopColor()
		{
			return $this->topColor;
		}

		/**
		 * set to user openid
		 * @param string $toUser openid
		 */
		public function setToUser($toUser)
		{
			$this->toUser = $toUser;
			return $this;
		}

		/**
		 * set template id
		 * @param string $templateId template message id
		 */
		public function setTemplateId($templateId)
		{
			$this->templateId = $templateId;
			return $this;
		}

		/**
		 * set url 
		 * @param string $url url
		 */
		public function setUrl($url)
		{
			$this->url = $url;
			return $this;
		}

		/**
		 * set template message data
		 * @param string $data template data
		 */
		public function setData($data)
		{
			$this->data = $data;
			return $this;
		}

		/**
		 * set template message top color
		 * @param string $topColor message color
		 */
		public function setTopColor($topColor)
		{
			$this->topColor = $topColor;
			return $this;
		}

		
	}
 ?>