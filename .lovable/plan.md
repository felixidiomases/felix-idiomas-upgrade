# Plano: baixar tema do GitHub e entregar zip

## Objetivo
Puxar o repositório `https://github.com/felixidiomases/felix-idiomas-upgrade.git` e gerar o arquivo `.zip` do tema WordPress para download, sem alterar o preview do Lovable.

## Passos
1. Clonar/fetch o repositório do GitHub para um diretório temporário somente leitura.
2. Localizar a pasta do tema WordPress dentro do repo (provavelmente `wordpress-theme/felix-idiomas/`).
3. Compactar essa pasta em um arquivo `.zip` com o nome `felix-idiomas-tema.zip`.
4. Entregar o zip como artefato para download no chat.

## Escopo
- Não modificar arquivos do projeto Lovable atual.
- Não alterar banco de dados, preview ou tema local já existente.
- Apenas ler o repositório remoto e produzir o arquivo de instalação do tema WordPress.

## Entrega
Arquivo `felix-idiomas-tema.zip` pronto para instalar em WordPress em **Aparência → Temas → Adicionar novo → Enviar tema**.
