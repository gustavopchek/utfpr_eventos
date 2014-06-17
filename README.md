Estrutura do Framework

app/ - Arquivos da aplicação
	app/resources/ - Recursos da aplicação (css, javascript, imagens do template, etc).
	app/models/ - Modelos da aplicação
	app/views/ - Visões da aplicação
	app/controllers - Controladores da aplicação

config/ - Arquivos de configuração

lib/ - Biblioteca do framework (validações, testes e funções do tipo)

main/ - Arquivos do framework
	main/models/ - Modelos do framework
	main/views/ - Visões do framework
	main/controllers/ - Controladores do framework

----------------------------------
.htaccess - Regra direciona todas as requisições para o /config/routers.php
