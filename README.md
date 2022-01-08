#API em Laravel para cadastro de produtos e movimentações

###Tecnologias utilizadas:

- **PHP** 7.4
- **Laravel** 8.75

### Instalação do projeto
**1. Clonar o projeto:**

`git clone https://github.com/sergyomsilva/app-s3rg10ms.git`

**2. Instalar dependências:**

`composer install`

**3. Efetuar migrações:**

`php artisan migrate`

**3. Iniciar projeto:**

`php artisan serve`

------------
###Documentação de uso da API

- #### Módulo de produtos:

**GET** Listar produtos:

`http://127.0.0.1:8000/api/products`

**Headers**

Content-Type : application/json

accept : application/json

------------


**POST** - Criar Produto

`http://127.0.0.1:8000/api/products`

**Headers**

Content-Type : application/json

accept : application/json

>** Atenção!!!!** a quantidade deverá ser inserina através do endpoint `/products/{ids}/transaction`

**Body** json
```json
{
  "name": "Notebook 1",
  "sku": "NOT-12345"
}
```
------------
**PUT** - Editar Produto

`http://127.0.0.1:8000/api/products/{id_produto}`

**Headers**

Content-Type : application/json

accept : application/json

**Body** json

```json
{
  "name": "Notebook 2",
  "sku": "NOT-12345"
}
```
```
------------
**DELETE** - Deletar produto

`http://127.0.0.1:8000/api/products/{id_produto}`

**Headers**

Content-Type : application/json

accept : application/json

------------


- ####Módulo de movimentações de produtos:

**GET** -  Listar transações por ID produto

`http://127.0.0.1:8000/api/products/{id_produto}/transactions`

**Headers**

Content-Type : application/json

accept : application/json

------------

**POST** - Criar transações por ID produto

`http://127.0.0.1:8000/api/products/{id_produto}/transactions`

**Headers**

Content-Type : application/json

accept : application/json

> **Atenção!!** O campo *"type"* é um enum e aceita somente duas opções: "in" para entradas de produtos ou "out" para saídad e produtos.

> **Atenção!!²** Caso você esteja realizando a saída de algum produto e não estiver a quantidade solicitada em estoque a transação não será efetivada!! :)

**Body** json
```json
{
  "type": "out",
  "quantity": 2,
  "product_id": 1
}
```

------------

**GET** - Report

`http://127.0.0.1:8000/api/products/transactions`
