# ead_php_alura_doctrine

> Projeto referente a [este](https://cursos.alura.com.br/course/php-doctrine-mapeamento-objeto-relacional) curso.

## Setup inicial

1. Habilite as extensões necessárias
```sh
php -r "var_dump([
    'postgresql' => extension_loaded('pgsql'),
    'pdo' => extension_loaded('pdo'),
    'integração postgresql-pdo' => extension_loaded('pdo_pgsql')
]);"

# caso precise habilitar alguma, edite seu php.ini que se encontra em:
# php --ini
```
2. Instale as dependências: ``composer i``
3. Crie o banco de dados
```sh
createdb -U postgres ead_php_alura_doctrine

# dicas do postgresql no terminal:
# Entrar
psql -U postgres -d ead_php_alura_doctrine

# \?                    exibe ajuda
# \q                    sai
# \l                    lista databases
# \c <databasename>     conecta uma database
# \dt                   lista tables da database
# \d <tablename>        descreve uma tabela
```
> Caso queira outro sgbd, banco, usuário, senha e etc veja o arquivo [env.ini](env.ini)
4. Crie as tabelas que as entidades refletem
```sh
composer doctrine orm:schema-tool:create
# ou
composer doctrine:migrations migrations:migrate 
```

## Execução dos scripts

- Terminal com `php nomedoarquivo.php`
- Vim com `:!php %`
- Browser com servidor embutido
    1. Levantar servidor pelo terminal com `php -S localhost:8001`
    2. Acessar em `localhost:8001/nomedoarquivo.php`

## Migrations

Comandos uteis

### Gerar nova

```sh
composer doctrine:migrations migrations:diff
```

### Status

```sh
composer doctrine:migrations migrations:status
```

### Reverter

```sh
# rollback para anterior
composer doctrine:migrations migrate prev
# psql está com problemas qnt isso:
# https://github.com/doctrine/migrations/issues/494
# https://github.com/doctrine/dbal/issues/1188
# https://github.com/doctrine/dbal/issues/1110
# solução: deletar manualmente as versões que não quer mais e gerar novamente com:
# 1) drop database:
#   composer doctrine orm:schema-tool:drop -- --force
# 2) Apagar arquivo da versão
# 3) Apagar histórico da versão:
#   delete from doctrine_migration_versions where version = 'Alura\Doctrine\Migrations\Version20210305010330';
```
