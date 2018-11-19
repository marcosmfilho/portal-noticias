# portal-noticias

Um simples App de Teste que implementa um portal de Notócias!

**IMPORTANTE**

Esse APP contempla tanto a parte WEB (LISTAR, CRIAR, VISUALIZAR, EDITAR, EXCLUIR), quanto a parte de API Rest (LISTAR, CRIAR, VISUALIZAR, EDITAR, EXCLUIR) para provavelmente ser consumido por uma aplicação Mobile.


**SIM, VOCÊ JÁ PODE VER COMO FICOU antes mesmo de executar localmente**

Fiz o DEPLOY da aplicação num servidor da Amazon.

Web:
ACESSE http://52.55.192.194/ para ter acesso a aplicação WEB e já brincar com as Notícias!

API Rest:

```
Listar todas as notícias

GET http://52.55.192.194/notice-api/
http://52.55.192.194/notice-api/
Headers
Content-Type	application/json
```

```
Ver notícia específica

GET http://52.55.192.194/notice-api/view?id=1
http://52.55.192.194/notice-api/view?id=1
Headers
Content-Type	application/json
```

```
Criar uma notícia

POST http://52.55.192.194/notice-api/create
http://52.55.192.194/notice-api/create
Headers
Content-Type	application/json
Body (application/json)
{
	"author": "Novo autor,
	"title": "Novo título",
	"body": "Novo Corpo"
}
```

```
Alterar uma notícia

PUT http://52.55.192.194/notice-api/update
http://52.55.192.194/notice-api/update
Headers
Content-Type	application/json
Body (application/json)
{
	"id": 1,
	"author": "Alterando autor",
	"title": "Alterando título",
	"body": "Alterando corpo"
}
```

```
Deletar uma notícia

DELETE http://52.55.192.194/notice-api/delete
http://52.55.192.194/notice-api/delete
Headers
Content-Type	application/json
Body (application/json)
{
	"id": 1
}
```


**COMO RODAR LOCALMENTE? É bem simples!**
1. Requisitos: PHP7, MySQL, Composer
2. Crie seu banco de dados! Na pasta config tem o arquivo *schema.sql*, copie, cole no seu MySQLWorkbench e pronto seu banco ta criado.
3. Dentro da aplicação execute o comando *composer install* para que as dependências possam ser instaladas.
4. Depois, dentro da pasta da aplicação execute o comando *php yii serve --port=8888*, seu servidor estará rodando!
5. Basta acessar http://localhost:8888 e sua aplicação estará rodando!

**O que foi utilizado nessa aplicação?**
1. Framework Yii2 PHP (PHP OO)
2. Banco de dados Mysql
3. JavaScript (jQuery, ajax, etc)
4. Bootstrap, HTML e CSS.
5. Api Rest




