# portal-noticias

Um simples App de Teste que implementa um portal de Notócias!

**IMPORTANTE**

Esse APP contempla tanto a parte WEB (LISTAR, CRIAR, VISUALIZAR, EDITAR, EXCLUIR), quanto a parte de API Rest (LISTAR, CRIAR, VISUALIZAR, EDITAR, EXCLUIR) para provavelmente ser consumido por uma aplicação Mobile.


**SIM, VOCÊ JÁ PODE VER COMO FICOU antes mesmo de executar localmente**

Fiz o DEPLOY da aplicação num servidor da Amazon.

WEB:
ACESSE http://52.55.192.194/ para ter acesso a aplicação WEB e já brincar com as Notícias!

API RESTFUL:

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





