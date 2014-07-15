<?php 
	namespace Admin;
	
	class EventsController extends BaseAdminController{
		protected $events;
      protected $eventsType;
      protected $paymentsType;
      protected $actionForm;

		public function _list() {
   		$this->setHeadTitle("Lista de Eventos");
         if (isset($this->params[":p"])) {
            $page = $this->params[":p"];
         } else {
            $page = 1;
         }
         \Events::setCurrentPage($page);

         if (isset($this->params[":id"])){
            $this->events = \Events::findById($this->params[":id"]);
            $this->pagination = new \Pager(count($this->events), \Events::getLimitByPage(), $page);
         }
         else{
            $this->events = \Events::find();
            $this->pagination = new \Pager(\Events::count(), \Events::getLimitByPage(), $page);
         }
		}

		public function _new(){
         //prepara formulario para inserção de novo evento
			$this->setHeadTitle("Novo Evento");
         $this->eventsType = \EventsType::all();
         $this->paymentsType = \PaymentType::all();
			$this->events = new \Events();
         $this->actionForm = $this->getUri("admin/eventos");
         $this->titleBtnSubmit = "Cadastrar";
		}

      public function create(){
         //salva evento no db
         $params = $this->params["event"];
         $this->events = new \Events($params);
         if ($this->events->save()){
            \FlashMessage::successMessage("Evento cadastrado com sucesso.");
            $this->redirectTo("admin/eventos/lista");
         }
         else{
            $errors = $this->events->getErrors();
            foreach ($errors as $error) {
               \FlashMessage::errorMessage($error);
            }
            
            $this->setHeadTitle("Novo Evento");
            $this->eventsType = \EventsType::all();
            $this->paymentsType = \PaymentType::all();            
            $this->actionForm = $this->getUri("admin/eventos");
            $this->titleBtnSubmit = "Cadastrar";
            $this->render("_new");
         }
      }

		public function edit(){
         //prepara formulario para edição do evento
			$this->setHeadTitle("Editar Evento");
         $this->eventsType = \EventsType::all();
         $this->paymentsType = \PaymentType::all();
			$this->events = \Events::findById($this->params[":id"])[0];
         $this->actionForm = $this->getUri("admin/eventos/{$this->events->getIdEvent()}");
         $this->titleBtnSubmit = "Salvar";
		}

      public function update(){
         //salva edição do evento no db  
         $this->events = \Events::findById($this->params[":id"])[0];
         if ($this->events->update($this->params['event'])){
            \FlashMessage::successMessage("Evento modificado com sucesso.");
            $this->redirectTo("admin/eventos/lista");
         }
         else{
            $errors = $this->events->getErrors();
            foreach ($errors as $error) {
               \FlashMessage::errorMessage($error);
            }

            $this->setHeadTitle("Editar Evento");
            $this->eventsType = \EventsType::all();
            $this->paymentsType = \PaymentType::all();
            $this->actionForm = $this->getUri("admin/eventos/{$this->events->getIdEvent()}");
            $this->titleBtnSubmit = "Salvar";
            $this->render("edit");
         }
      }

		public function remove(){
         $this->events = \Events::findById($this->params[":id"])[0];
         $this->events->remove();
         \FlashMessage::successMessage("Evento removido com sucesso.");
         $this->redirectTo("admin/eventos/lista");
		}
	} 
?>