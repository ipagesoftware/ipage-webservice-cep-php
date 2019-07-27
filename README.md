# ipage-webservice-cep-php
Busca por CEP em PHP  Jquery utilizando webservice da Empresa Ipage Software

Como funciona um Webservice?
Webservice é uma solução utilizada na integração de sistemas e na comunicação entre aplicações diferentes. Com esta tecnologia é possível que novas aplicações possam interagir com aquelas que já existem e que sistemas desenvolvidos em plataformas diferentes sejam compatíveis.

A que se destina este Webservice?
Este Webservice tem por finalidade consultar Códigos de endereçamento Postal (CEP) de todo o Brasil de forma simples e descomplicada.
As informações retornadas após a consulta ao Webservice possui diversos formatos, são eles: XML, JSON, JavaScript, formato texto PIPED, formato texto Querty.
Definição dos parâmetros.
O CEP informado deve conter apenas números com até 08 (oito caracateres), em caso de valores inválidos passados ao Webservice o mesmo realizará automaticamente um filtro, deixando passar apenas números. Se mesmo assim o valor do CEP informado não satisfazer o critério uma mensagem de erro será reportada.

O formato a ser retornado pela consulta deve ser passado na URL junto com o CEP e deve ser compatível com o esperado pelo Webservice.
Os valores válidos são: XML, JSON, JavaScript, formato texto PIPED, formato texto Querty.

A chave de acesso ao Webservice é obrigatória e deve ser passada na URL junto com o CEP, formato de retorno e deve ser compatível com o esperado pelo Webservice. Caso não possua uma chave de acesso, solicite no nosso web site: https://www.ipage.com.br/ipage/wskey/index.php#formulario

Pesquisa por CEP.

Exemplo de pesquisa por CEP com retorno em JSON.
https://www.ipage.com.br/ws/v1/cep/54315-570/json/2e3da304a5e311e98df5289a8be9ede8/

Exemplo de pesquisa por CEP com retorno em XML.
https://www.ipage.com.br/ws/v1/cep/04548-005/xml/2e3da304a5e311e98df5289a8be9ede8/

Exemplo de pesquisa por CEP com retorno em Javascript.
https://www.ipage.com.br/ws/v1/cep/04548-005/javascript/2e3da304a5e311e98df5289a8be9ede8/

Exemplo de pesquisa por CEP com retorno em QUERTY.
https://www.ipage.com.br/ws/v1/cep/04548-005/querty/2e3da304a5e311e98df5289a8be9ede8/

Exemplo de pesquisa por CEP com retorno em PIPED.
https://www.ipage.com.br/ws/v1/cep/04548-005/piped/2e3da304a5e311e98df5289a8be9ede8/
