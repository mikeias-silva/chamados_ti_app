# Chamados TI app

Sistema de gestão de chamados de TI, nele é possível abrir chamados alémd e visualizar indicadores de resolução destes chamados.

## pré-requisitos
- php 8.1
- Laravel 10
- banco de dados mysql

## Instalação

1. Para instalar o Sumério após clonar o repositório no ambiente, instalar as dependencias do php na raiz do projeto com
   o comando composer abaixo.
   ### composer
    ```sh
    composer install
    ```

2. Após rodar o composer, deve instalar as dependencias do npm com o comando:
   ### npm
    ```zsh
    npm install
    ```
   Obs: caso encontre erros ao instalar o npm, apagar a pasta node_modules/ e o arquivo package-lock.json. Tentar
   novamente com npm:
   ### npm audit fix
    ```bash
    npm audit fix
    ```

3. Por último compilar os assets do projeto:
   ### npm run dev
    ```shell
   npm run build
    ```
   Obs: caso este comando der erro, corrigir com a opção 2 e tentar novamente.


4. Rodar o comando para criar as tabelas necessárias do projeto:  
    ### php artisan migrate
    ```shell
    php artisan migrate
    ```
## .env

Não esquecer de configurar o .env para o ambiente desejado produção/desenvolvimento. Na raiz há um exemplo no arquivo .env-sample
