## Correção de erros

O sistema simula um controle simples de estoque utilizando arrays armazenados em sessão. A versão inicial apresentava falhas como acesso a índices indefinidos e inconsistência no cálculo do total em estoque.

A lógica inicial utilizava `foreach` de forma inadequada para atualização dos dados, o que não atendia ao fluxo necessário. A solução foi simplificar a abordagem, utilizando validação direta com `if` e o índice recebido via `$_GET['sell']` para manipular corretamente o array `$items`.

Por fim, foi implementada a persistência das alterações na sessão, garantindo que as modificações no estoque fossem mantidas entre requisições, juntamente com o redirecionamento via `header` para evitar reprocessamento da ação.
