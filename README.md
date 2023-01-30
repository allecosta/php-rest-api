## O que é uma API?

*Application Programming Interface (Interface de Programação de Aplicativos). É um conjunto<br>
de rotinas, protocolos e ferramentas para criar aplicações de software. Uma interface API<br>
possibilita a comunicação entre vários componentes de software.*

## O que é REST API?

*Representational State Transfer (Transfêrencia de Estado Representacional). É um estilo de arquitetura<br>
de software que define um conjunto de restrições a serem usadas para criação de Web Services (Serviços Web).<br>
Os Web Services que estão em conformidade com o estilo de arquitetura REST, chamados de Web Services RESTful,<br>
fornecem interoperabilidade entre sistemas na internet. Os Web Services RESTful permitem que os sistemas<br> solicitantes acessem e manipulem representações textuais de recursos da web usando um conjunto uniforme e<br> predefinido de operações sem estado.*

## PHP REST API - Projeto 

### Instale o projeto

```
git clone https://github.com/allecosta/php-rest-api.git

```
- OBS: Antes de rodar o comando acima, caso ainda não tenha o git instalado, baixe em:

- Download: [https://git-scm.com/downloads](https://git-scm.com/downloads)


*Navegue até o diretório onde está localizado o projeto*

```
cd php-rest-api

```

*Quando estiver na pasta do projeto, execute o comando para iniciar o servidor PHP*

```
php -S localhost:8000

```

*Crie um banco de dados. Após concluir a criação do banco, execute o script SQL para criar a tabela.*

```
CREATE TABLE associates (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    designation VARCHAR(255) NOT NULL,
    create_at DATETIME NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

```
- GET - http://localhost:8000/api/v1/read.php Busca todos os registros
- GET - http://localhost:8000/api/v1/single.php Busca um único registro
- POST - http://localhost:8000/api/v1/create.php Cria registros
- PUT - http://localhost:8000/api/v1/update.php Atualiza registros
- DELETE - http://localhost:8000/api/v1/delete.php Exclui registros








