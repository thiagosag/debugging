## Correção de erros

A versão inicial do sistema de login possuía diversos bugs de lógica e sintaxe, como uso incorreto de operadores de atribuição em condições, falhas na validação do método HTTP e problemas na verificação de sessão. Esses erros faziam com que o fluxo de autenticação não funcionasse corretamente e gerassem comportamentos inesperados.

Na versão final, os problemas foram corrigidos e o sistema foi aprimorado com separação entre login e logout, validação correta com operadores estritos, uso de `htmlspecialchars` para maior segurança e melhor organização do fluxo de sessão. O resultado é um sistema funcional, mais seguro e com estrutura mais próxima de aplicações reais.
