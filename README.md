Estrutura do Framework

app/ - Arquivos da aplicação
	app/resources/ - Recursos (assets) da aplicação (css, javascript, imagens do template, etc).
	app/models/ - Modelos da aplicação
	app/views/ - Visões da aplicação
	app/controllers - Controladores da aplicação
	app/classes - Outras classes

config/ - Arquivos de configuração

lib/ - Biblioteca do framework (validações, testes e funções do tipo)

main/ - Arquivos do framework
	main/resources - Recursos (assets) do framework
	main/models/ - Modelos do framework
	main/views/ - Visões do framework
	main/controllers/ - Controladores do framework
	main/classes - Outras classes

----------------------------------
.htaccess - Regra direciona todas as requisições para o /config/routers.php
na sequencia main.php é iniciado, criado as constantes
----------------------------------

Arquivos .php - Arquivos com código PHP em geral
Arquivos .phtml - Arquivos com código PHP e HTML
Arquivos .html - Arquivos apenas com HTML
Arquivos .class.php - Arquivos de classes
