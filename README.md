## Requisitos

- PHP
- Composer
- Apache

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/thiagoesAdapti/desafio_dc.git
    ```

2. Acesse o diretório:

    ```bash
    cd desafio_dc
    ```

3. Instale as dependências:

    ```bash
    composer install
    ```

4. Copie o arquivo `.env.example` para `.env`:

    ```bash
    cp .env.example .env
    ```

5. Gere a chave de aplicação:

    ```bash
    php artisan key:generate
    ```

6. Crie um banco de dados MySQL com o nome:

    ```bash
    desafio_dc
    ```

7. Execute:

    ```bash
    php artisan migrate
    ```

8. Inicie o servidor:

    ```bash
    php artisan serve
    ```

9. Acesse:

    ```bash
    http://localhost:8000
    ```