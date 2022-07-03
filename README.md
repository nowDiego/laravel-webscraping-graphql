# Web Scraping Cotação de Ações
Aplicação utilizando Laravel, GraphQL e Web Scraping 

## COMO RODAR O PROJETO BAIXADO

## composer install 
Instalar todas as dependencias indicada pelo composer.json

## php artisan migrate
Criar as tabelas, alterar a estrutura, definir a ordem de criação de cada tabela e fazer relacionamentos entre elas.

## php artisan queue:work
Utilizar fila de processamento

## php artisan schedule:work
Este comando invocará o agendador a cada minuto até que você encerre o comando

## php artisan serve
Para iniciar o servidor local

## http://localhost:8000/graphql-playground
Ferramenta para interagir com o GraphQL 

## Bibliotecas Utilizadas

## https://lighthouse-php.com/
GraphQL

## https://github.com/dweidner/laravel-goutte
Web scraping PHP

## Exemplos de Query GraphQL

## Exemplo 1:
query{ 
cotacoesPaginator(first:10){
  paginatorInfo{   
    currentPage  
    perPage
    total
  }
  data{
    id
    acao  
  }
}
}

## Exemplo 2:

query{ 
cotacoesFirst{
  acao
  min
  variacao
  created_at
}
}

## Exemplo 3:

query{ 
cotacoesAll{
  acao
  min
  max 
}
}

## Exemplo 4:

query{ 
cotacoesFindById(id:3){
  id
  acao
  min
  max
  variacao
  created_at
  updated_at
}
}