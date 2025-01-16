# 📌 Protótipo de sistema web com inteligência artificial para auxílio a advogados em atividades jurídicas

## 📝 Sobre o Projeto
A ausência de ferramentas especializadas para automação de processos impacta diretamente a produtividade dos profissionais do Direito. Este projeto busca preencher essa lacuna por meio do desenvolvimento de um sistema baseado em Inteligência Artificial (**IA**) para auxiliar na elaboração de alegações finais, reduzindo erros e otimizando a rotina dos advogados.

## 🚀 Tecnologias Utilizadas
- **Laravel**: Framework PHP utilizado para o backend, garantindo robustez e escalabilidade.
- **MySQL 8**: Banco de dados relacional utilizado para armazenamento de informações processuais.
- **OpenAI API**: Responsável pela geração de textos estruturados com base nos dados fornecidos.
- **Vue.js 3 + InertiaJS**: Frameworks utilizados no frontend para criar uma interface interativa e eficiente.
- **TailwindCSS**: Framework CSS utilizado para estilização do frontend.
## 📂 Estrutura do Sistema
### 🔹 Backend
O backend foi desenvolvido em **Laravel**, seguindo o padrão MVC. Ele inclui:
- Controladores responsáveis pela gestão de alegações finais.
- Integração com a **OpenAI API** para processamento de linguagem natural.
- Armazenamento seguro de arquivos anexados pelo usuário.

### 🔹 Frontend
O frontend utiliza **Vue.js 3** e **InertiaJS**, garantindo uma experiência fluida. Algumas funcionalidades incluem:
- Formulário dinâmico para preenchimento de informações processuais.
- Upload e gestão de documentos anexados.
- Exibição do documento gerado com opção de revisão antes da exportação.

## 🛠 Funcionalidades Principais
✅ Cadastro de informações processuais como endereçamento e partes envolvidas.  
✅ Upload de documentos em formato **PDF**.  
✅ Geração automática de alegações finais com base nos dados inseridos.  
✅ Exibição e revisão da peça gerada.  
✅ Integração com **OpenAI API** para geração de textos estruturados.  

## 📌 Como Executar o Projeto
### 🔧 Requisitos
Antes de iniciar, você precisará ter instalado em sua máquina:
- PHP 8+
- Composer
- Node.js e NPM
- MySQL 8

### 🛠 Instalação e Execução
```bash
# Clone o repositório
git clone https://github.com/seuusuario/seu-repositorio.git

# Acesse o diretório do projeto
cd seu-repositorio

# Instale as dependências do backend
composer install

# Instale as dependências do frontend
npm install

# Copie o arquivo .env de exemplo
cp .env.example .env

# Configure as variáveis de ambiente
nano .env

# Gere a chave do Laravel
php artisan key:generate

# Rode as migrações do banco de dados
php artisan migrate

# Inicie o servidor backend
php artisan serve

# Inicie o servidor frontend
npm run dev
```

Acesse o sistema em **http://localhost:8000**.

## 📜 Licença
Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

---

Feito com ❤️ por [Seu Nome](https://github.com/seuusuario)