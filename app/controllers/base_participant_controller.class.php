<?php
	class BaseParticipantController extends BaseController {
		protected $currentParticipant;
		private $loginRequired;

		public function setLoginRequired($loginRequired) {
			$this->loginRequired = $loginRequired;
		}

		public function beforeAction(){		
			if (!isset($_SESSION["participant"]) && $this->loginRequired) {
				$this->redirectTo("conta/login");
			}
			else {
				$this->currentParticipant = $_SESSION["participant"];
			}
		}
	}
?>