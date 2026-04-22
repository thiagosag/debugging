## Correção de erros

O sistema consiste em um contador simples utilizando sessões para persistência de estado. Inicialmente apresentava falhas relacionadas à atualização do valor, onde as ações não eram refletidas corretamente após interação do usuário.

A correção foi baseada na sincronização adequada entre a variável local e a sessão, garantindo que toda modificação fosse persistida imediatamente. Também foi aplicado redirecionamento após cada ação, evitando reprocessamento da requisição.

Como melhoria, foi adicionada uma nova funcionalidade de multiplicação do valor, mantendo o mesmo padrão de atualização e consistência do sistema.
