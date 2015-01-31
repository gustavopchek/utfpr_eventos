<?php
    require 'main.php';
    $router = new Router($_SERVER['REQUEST_URI']);

    /*
    * rotas para acesso geral
    */ 

    //rota para raiz
   	$router->get('/', array('controller' => 'HomeController', 'action' => 'index'));

    //rota para sobre
    $router->get('/sobre', array('controller' => 'HomeController', 'action' => 'about'));

    //validacoes ajax
    $router->get('/validarcpf/:cpf', array('controller' => 'BaseController', 'action' => 'validateCpf'));
   	
   	//rotas para eventos
   	$router->get('/eventos/proximos', array('controller' => 'EventsController', 'action' => 'next'));
    $router->get('/eventos/proximos/pagina/:p', array('controller' => 'EventsController', 'action' => 'next'));
    $router->get('/eventos/anteriores', array('controller' => 'EventsController', 'action' => 'previous'));
    $router->get('/eventos/anteriores/pagina/:p', array('controller' => 'EventsController', 'action' => 'previous'));
    $router->get('/eventos/:id/ver', array('controller' => 'EventsController', 'action' => 'show'));
    $router->get('/eventos/:url', array('controller' => 'EventsController', 'action' => 'show'));

    //rota para setar nota do evento pelo participante
    $router->get('/eventos/:id/avaliacao/:r', array('controller' => 'EnrollmentController', 'action' => 'updateRating'));

   	//rotas para notícias
   	$router->get('/noticias/lista', array('controller' => 'NewsController', 'action' => 'show'));
    $router->get('/noticias/lista/pagina/:p', array('controller' => 'NewsController', 'action' => 'show'));
    $router->get('/noticias/:id/ler', array('controller' => 'NewsController', 'action' => 'item'));

    //rotas para mídia
    $router->get('/midia/galeria', array('controller' => 'MediaController', 'action' => 'gallery'));
    $router->get('/midia/galeria/pagina/:p', array('controller' => 'MediaController', 'action' => 'gallery'));
    $router->get('/midia/fotos/pagina/:p', array('controller' => 'MediaController', 'action' => 'photos'));
    $router->get('/midia/videos/pagina/:p', array('controller' => 'MediaController', 'action' => 'videos'));

    $router->get('/midia/galeria/evento/:id', array('controller' => 'MediaController', 'action' => 'gallery'));

    $router->get('/midia/galeria/fotos', array('controller' => 'MediaController', 'action' => 'photoGallery'));
    $router->get('/midia/galeria/fotos/pagina/:p', array('controller' => 'MediaController', 'action' => 'photoGallery'));
    $router->get('/midia/galeria/fotos/evento/:id/pagina/:p', array('controller' => 'MediaController', 'action' => 'photoGallery'));


    $router->get('/midia/galeria/videos', array('controller' => 'MediaController', 'action' => 'videoGallery'));
    $router->get('/midia/galeria/videos/pagina/:p', array('controller' => 'MediaController', 'action' => 'videoGallery'));
    $router->get('/midia/galeria/videos/evento/:id/pagina/:p', array('controller' => 'MediaController', 'action' => 'videoGallery'));

    //rotas para contato
    $router->get('/contato', array('controller' => 'ContactsController', 'action' => 'index'));
    $router->post('/contato', array('controller' => 'ContactsController', 'action' => 'sendMessage'));

    /*
    * rotas para area do participant
    */
   	//rota para login/cadastro - usuários
    $router->get('/conta/login', array('controller' => 'ParticipantController', 'action' => 'login'));
    $router->post('/conta/login', array('controller' => 'ParticipantController', 'action' => 'executeLogin'));
    $router->get('/conta/alterar', array('controller' => 'ParticipantController', 'action' => 'edit')); 
    $router->post('/conta/:id/alterar', array('controller' => 'ParticipantController', 'action' => 'update')); 
    $router->get('/conta/sair', array('controller' => 'ParticipantController', 'action' => 'logout'));
    $router->get('/conta/nova', array('controller' => 'ParticipantController', 'action' => '_new'));
    $router->post('/conta/nova', array('controller' => 'ParticipantController', 'action' => 'create'));
    $router->get('/conta/painel', array('controller' => 'ParticipantController', 'action' => 'dashboard'));

    $router->get('/conta/inscricoes', array('controller' => 'EnrollmentController', 'action' => '_list'));    
    $router->get('/conta/inscricoes/:id', array('controller' => 'EnrollmentController', 'action' => 'show'));  

    $router->get('/conta/certificados', array('controller' => 'CertificatesController', 'action' => '_list'));
    $router->get('/conta/certificados/:code/ver', array('controller' => 'CertificatesController', 'action' => 'show'));

    $router->get('/inscricao/evento/:id', array('controller' => 'EnrollmentController', 'action' => '_new'));
    $router->post('/inscricao/finalizar', array('controller' => 'EnrollmentController', 'action' => 'save'));
    $router->get('/inscricao/confirmacao', array('controller' => 'EnrollmentController', 'action' => 'confirmation'));

    //rota para validação de certificados
    $router->get('/certificados', array('controller' => 'CertificatesController', 'action' => 'index'));
    $router->post('/certificados/verificar', array('controller' => 'CertificatesController', 'action' => 'verification'));

    //$router->get('/conta/inscricoes', array('controller' => 'ParticipantController', 'action' => 'enrollments'));


    //rotas para pesquisa
    $router->get('/pesquisa/eventos', array('controller' => 'SearchController', 'action' => 'events'));
    $router->get('/pesquisa/eventos/:s', array('controller' => 'SearchController', 'action' => 'events'));
    $router->get('/pesquisa/eventos/:s/pagina/:p', array('controller' => 'SearchController', 'action' => 'events'));
    $router->post('/pesquisa/eventos', array('controller' => 'SearchController', 'action' => 'findEvents'));

    $router->get('/pesquisa/noticias', array('controller' => 'SearchController', 'action' => 'news'));
    $router->get('/pesquisa/noticias/:s', array('controller' => 'SearchController', 'action' => 'news'));
    $router->get('/pesquisa/noticias/:s/pagina/:p', array('controller' => 'SearchController', 'action' => 'news'));
    $router->post('/pesquisa/noticias', array('controller' => 'SearchController', 'action' => 'findNews'));


    $router->get('/pesquisa/midia', array('controller' => 'SearchController', 'action' => 'media'));
    $router->get('/pesquisa/midia/pagina/:p', array('controller' => 'SearchController', 'action' => 'media'));

    /*
    * rotas para area do admin
    */ 

    //root do admin
    $router->get('/admin', array('controller' => 'Admin\HomeController', 'action' => 'index'));

    //rotas para login
    $router->get('/admin/login', array('controller' => 'Admin\LoginController', 'action' => 'index'));
    $router->post('/admin/login', array('controller' => 'Admin\LoginController', 'action' => 'login'));
    $router->get('/admin/logout', array('controller' => 'Admin\LoginController', 'action' => 'logout'));

    //rotas para tipos de eventos
    $router->get('/admin/eventos/tipos', array('controller' => 'Admin\EventsTypeController', 'action' => '_list')); 
    $router->get('/admin/eventos/tipos/novo', array('controller' => 'Admin\EventsTypeController', 'action' => '_new')); 
    $router->post('/admin/eventos/tipos/novo', array('controller' => 'Admin\EventsTypeController', 'action' => 'create')); 
    $router->get('/admin/eventos/tipos/:id/alterar', array('controller' => 'Admin\EventsTypeController', 'action' => 'edit')); 
    $router->post('/admin/eventos/tipos/:id/alterar', array('controller' => 'Admin\EventsTypeController', 'action' => 'update')); 
    $router->get('/admin/eventos/tipos/:id/remover', array('controller' => 'Admin\EventsTypeController', 'action' => 'remove')); 

    //rotas para eventos
    $router->get('/admin/eventos/lista', array('controller' => 'Admin\EventsController', 'action' => '_list'));
    $router->get('/admin/eventos/lista/pagina/:p', array('controller' => 'Admin\EventsController', 'action' => '_list'));
    $router->get('/admin/eventos/lista/id/:id', array('controller' => 'Admin\EventsController', 'action' => '_list'));
    
    //rotas para lista de seleção de eventos
    $router->get('/admin/eventos/lista/selecao', array('controller' => 'Admin\EventsController', 'action' => 'selectionList'));
    $router->get('/admin/eventos/lista/selecao/pagina/:p', array('controller' => 'Admin\EventsController', 'action' => 'selectionList'));

    $router->get('/admin/eventos/novo', array('controller' => 'Admin\EventsController', 'action' => '_new'));
    $router->post('/admin/eventos', array('controller' => 'Admin\EventsController', 'action' => 'create'));    
    $router->get('/admin/eventos/:id/alterar', array('controller' => 'Admin\EventsController', 'action' => 'edit'));
    $router->post('/admin/eventos/:id', array('controller' => 'Admin\EventsController', 'action' => 'update'));
    $router->get('/admin/eventos/:id/remover', array('controller' => 'Admin\EventsController', 'action' => 'remove'));
    $router->get('/admin/eventos/:id/presenca', array('controller' => 'Admin\EventsController', 'action' => 'attendance'));
    $router->post('/admin/eventos/:id/presenca', array('controller' => 'Admin\EventsController', 'action' => 'checkAttendance'));

    //rotas para notícias
    $router->get('/admin/noticias/lista', array('controller' => 'Admin\NewsController', 'action' => '_list'));
    $router->get('/admin/noticias/lista/pagina/:p', array('controller' => 'Admin\NewsController', 'action' => '_list'));
    $router->get('/admin/noticias/nova', array('controller' => 'Admin\NewsController', 'action' => '_new'));
    $router->post('/admin/noticias', array('controller' => 'Admin\NewsController', 'action' => 'create'));    
    $router->get('/admin/noticias/:id/alterar', array('controller' => 'Admin\NewsController', 'action' => '_edit'));
    $router->post('/admin/noticias/:id', array('controller' => 'Admin\NewsController', 'action' => 'update'));
    $router->get('/admin/noticias/:id/remover', array('controller' => 'Admin\NewsController', 'action' => 'remove'));    

    //rotas para mídia
    $router->get('/admin/midia/lista', array('controller' => 'Admin\MediaController', 'action' => '_list'));
    $router->get('/admin/midia/lista/pagina/:p', array('controller' => 'Admin\MediaController', 'action' => '_list'));
    $router->get('/admin/midia/novo/video', array('controller' => 'Admin\MediaController', 'action' => '_new'));
    $router->get('/admin/midia/novas/fotos', array('controller' => 'Admin\MediaController', 'action' => '_newMultiple'));
    $router->get('/admin/midia/:id/alterar', array('controller' => 'Admin\MediaController', 'action' => '_edit'));
    $router->post('/admin/midia/fotos', array('controller' => 'Admin\MediaController', 'action' => 'createPhotos'));
    $router->post('/admin/midia/video', array('controller' => 'Admin\MediaController', 'action' => 'createVideo'));
    $router->post('/admin/midia/:id', array('controller' => 'Admin\MediaController', 'action' => 'update'));
    $router->get('/admin/midia/:id/remover', array('controller' => 'Admin\MediaController', 'action' => 'remove'));

    //rotas para inscrições
    $router->get('/admin/inscricoes/lista', array('controller' => 'Admin\EnrollmentController', 'action' => '_list'));
    $router->get('/admin/inscricoes/lista/pagina/:p', array('controller' => 'Admin\EnrollmentController', 'action' => '_list'));
    $router->get('/admin/inscricoes/:id/remover', array('controller' => 'Admin\EnrollmentController', 'action' => 'remove'));
    $router->get('/admin/inscricoes/nova', array('controller' => 'Admin\EnrollmentController', 'action' => '_new'));
    $router->get('/admin/inscricoes/:id/ver', array('controller' => 'Admin\EnrollmentController', 'action' => 'show'));
    $router->get('/admin/inscricoes/:id/pagamento', array('controller' => 'Admin\EnrollmentController', 'action' => 'payment'));
    $router->get('/admin/inscricoes/:id/cancela-pagamento', array('controller' => 'Admin\EnrollmentController', 'action' => 'cancelPayment'));

    //rotas para certificados
    $router->get('/admin/certificados', array('controller' => 'Admin\CertificatesController', 'action' => '_list')); 
    $router->get('/admin/certificados/lista/pagina/:p', array('controller' => 'Admin\CertificatesController', 'action' => '_list'));
    $router->get('/admin/certificados/:id/remover', array('controller' => 'Admin\CertificatesController', 'action' => 'remove'));
    $router->get('/admin/certificados/novo', array('controller' => 'Admin\CertificatesController', 'action' => '_new'));
    $router->get('/admin/certificados/:id/ver', array('controller' => 'Admin\CertificatesController', 'action' => 'show'));
    //rota para JSon
    $router->get('/admin/certificados/inscricoes/:id', array('controller' => 'Admin\CertificatesController', 'action' => 'enrollments'));
    $router->post('/admin/certificados', array('controller' => 'Admin\CertificatesController', 'action' => 'create'));   

    //rotas para usuários (do painel de administração)
    $router->get('/admin/usuarios/lista', array('controller' => 'Admin\AdministratorController', 'action' => '_list'));
    $router->get('/admin/usuarios/novo', array('controller' => 'Admin\AdministratorController', 'action' => '_new'));
    $router->post('/admin/usuarios/novo', array('controller' => 'Admin\AdministratorController', 'action' => 'save'));
    $router->get('/admin/usuarios/:id/alterar', array('controller' => 'Admin\AdministratorController', 'action' => 'edit'));
    $router->post('/admin/usuarios/:id/alterar', array('controller' => 'Admin\AdministratorController', 'action' => 'update'));
    $router->get('/admin/usuarios/:id/remover', array('controller' => 'Admin\AdministratorController', 'action' => 'remove'));

    //rotas para participantes (administração)
    $router->get('/admin/participantes/lista', array('controller' => 'Admin\ParticipantController', 'action' => '_list'));
    $router->get('/admin/participantes/novo', array('controller' => 'Admin\ParticipantController', 'action' => '_new'));
    $router->post('/admin/participantes/novo', array('controller' => 'Admin\ParticipantController', 'action' => 'save'));
    $router->get('/admin/participantes/:id/alterar', array('controller' => 'Admin\ParticipantController', 'action' => 'edit'));
    $router->post('/admin/participantes/:id/alterar', array('controller' => 'Admin\ParticipantController', 'action' => 'update'));
    $router->get('/admin/participantes/:id/remover', array('controller' => 'Admin\ParticipantController', 'action' => 'remove'));

    //rotas para cidades
    $router->get('/admin/cidades/lista', array('controller' => 'Admin\CityController', 'action' => '_list'));
    $router->get('/admin/cidades/nova', array('controller' => 'Admin\CityController', 'action' => '_new'));
    $router->get('/admin/cidades/:id/alterar', array('controller' => 'Admin\CityController', 'action' => 'edit'));

    //rotas para configuracoes
    $router->get('/admin/config/geral', array('controller' => 'Admin\SettingsController', 'action' => 'general'));
    $router->get('/admin/config/geral/manutencao', array('controller' => 'Admin\SettingsController', 'action' => 'maintenance'));
    $router->get('/admin/config/tema', array('controller' => 'Admin\SettingsController', 'action' => 'theme'));
    $router->get('/admin/config/banners', array('controller' => 'Admin\SettingsController', 'action' => 'banners'));
    //forma de pgto
    $router->get('/admin/config/pagamento', array('controller' => 'Admin\PaymentTypeController', 'action' => '_list'));
    $router->get('/admin/config/pagamento/nova', array('controller' => 'Admin\PaymentTypeController', 'action' => '_new'));
    $router->post('/admin/config/pagamento/nova', array('controller' => 'Admin\PaymentTypeController', 'action' => 'create'));
    
    $router->get('/admin/config/pagamento/:id/alterar', array('controller' => 'Admin\PaymentTypeController', 'action' => 'edit'));
    $router->post('/admin/config/pagamento/:id/alterar', array('controller' => 'Admin\PaymentTypeController', 'action' => 'update'));
    $router->get('/admin/config/pagamento/:id/remover', array('controller' => 'Admin\PaymentTypeController', 'action' => 'remove'));
    $router->get('/admin/config/email', array('controller' => 'Admin\SettingsController', 'action' => 'email'));
    $router->get('/admin/config/programador', array('controller' => 'Admin\SettingsController', 'action' => 'developer'));

    $router->post('/admin/config', array('controller' => 'Admin\SettingsController', 'action' => 'update'));

    //rotas para relatorios
    $router->get('/admin/relatorios/inscricoes', array('controller' => 'Admin\ReportsController', 'action' => '_new'));
    $router->post('/admin/relatorios/inscricoes/gerar', array('controller' => 'Admin\ReportsController', 'action' => 'generate'));

 //rotas para tipos de eventos
    $router->get('/admin/patrocinadores/lista', array('controller' => 'Admin\SponsorsController', 'action' => '_list')); 
    $router->get('/admin/patrocinadores/lista/pagina/:p', array('controller' => 'Admin\SponsorsController', 'action' => '_list')); 
    $router->get('/admin/patrocinadores/novo', array('controller' => 'Admin\SponsorsController', 'action' => '_new')); 
    $router->post('/admin/patrocinadores/novo', array('controller' => 'Admin\SponsorsController', 'action' => 'create')); 
    $router->get('/admin/patrocinadores/:id/alterar', array('controller' => 'Admin\SponsorsController', 'action' => 'edit')); 
    $router->post('/admin/patrocinadores/:id/alterar', array('controller' => 'Admin\SponsorsController', 'action' => 'update')); 
    $router->get('/admin/patrocinadores/:id/remover', array('controller' => 'Admin\SponsorsController', 'action' => 'remove')); 
    $router->load();
?>