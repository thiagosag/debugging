## Correção de erros

O sistema simula um carrinho de compras utilizando arrays em sessão. Inicialmente apresentava problemas ao adicionar produtos, pois a quantidade (`qty`) não era inicializada corretamente, gerando comportamento inconsistente.

A correção consistiu em tratar a existência do item no carrinho antes de incrementar, garantindo que novos itens sejam criados com quantidade inicial e itens existentes sejam apenas atualizados.

Também foi ajustado o fluxo com redirecionamento após ações (`add` e `remove`), evitando reprocessamento. Com isso, o carrinho passou a funcionar de forma estável e previsível.
