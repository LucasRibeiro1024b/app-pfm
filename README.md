# Gestão Financeira de Projetos

**Gestão Financeira de Projetos** é uma aplicação web desenvolvida para oferecer um gerenciamento completo de projetos com foco em suas movimentações financeiras. O sistema foi idealizado para empresas que precisam acompanhar atividades, receitas, despesas e lucros (previstos e reais) de cada projeto de forma prática e eficiente.

## ✨ Funcionalidades

- Cadastro de clientes e projetos
- Gerenciamento de usuários e suas permissões
- Acompanhamento de atividades por projeto
- Lançamento de receitas e despesas
- Visualização de fluxo de caixa por projeto
- Comparativo entre lucro previsto e lucro real
- Dashboards para melhor visualização das receitas e despesas

## 🛠️ Tecnologias Utilizadas

- **PHP**: 8.2 – 8.4  
- **Laravel**: 11  
- **Bootstrap**: 5.3.3  
- **MySQL**: 8

## 🚀 Instalação

Siga os passos abaixo para rodar o projeto localmente:

1. Clone o repositório
```
git clone https://github.com/mateusaraujo1/app-pfm.git
```

2. Acesse o diretório do projeto
```
cd app-pfm
```

3. Instale as dependências PHP
```
composer install
```

4. Copie o arquivo de exemplo do .env
```
cp .env.example .env
```

5. Gere a chave da aplicação
```
php artisan key:generate
```

6. Configure seu banco de dados no .env
```
DB_DATABASE=pfm
DB_USERNAME=root
DB_PASSWORD=
```

7. Execute as migrações
```
php artisan migrate
```

8. Instale as dependências front-end
```
npm install && npm run build
```

9. Se desejar iniciar a aplicação sem dados, rode o comando 9.1 <br>
   Se desejar popular com vários dados para melhor visualização, rode o comando 9.2

    9.1
   ```
   php artisan db:seed --class=UsersSeeder
   ```
   9.2
   ```
   php artisan migrate --seed
   ```

10. Inicie o servidor
```
php artisan serve
```

11. Use os dados abaixo para fazer login <br>
email:```admin@mail.com``` <br>
senha:```12345678```

## 🌆 Imagens

![image](https://github.com/user-attachments/assets/c75502dd-183c-4344-8ddf-8e47cb6d99f2) <br>
![image](https://github.com/user-attachments/assets/a1f413a0-1c01-4c55-b3f4-36e7200bfa92) <br>
![image](https://github.com/user-attachments/assets/853a2236-615f-4026-ab57-3c3890d2066e) <br>
![image](https://github.com/user-attachments/assets/20381569-2fd5-4b3f-913d-12b290eaa033) <br>
![image](https://github.com/user-attachments/assets/1f71b426-b65a-4f60-984e-6e29b04f8a0f) <br>
![image](https://github.com/user-attachments/assets/c3d154a7-a6c9-4eb0-b397-3e02b622a697) <br>
![image](https://github.com/user-attachments/assets/39593eb4-f02a-4626-b360-f82cb7d233c5) <br>
![image](https://github.com/user-attachments/assets/fb21bd23-1c20-4050-922d-c6b1f7a3b9e3) <br>
![image](https://github.com/user-attachments/assets/e7fe4a28-041e-4228-8ea4-218903f7ab8e) <br>
