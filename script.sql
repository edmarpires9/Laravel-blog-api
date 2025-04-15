-- Criar o banco de dados blog_api.
CREATE DATABASE blog_api;

-- Selecionar o banco de dados criado.
USE blog_api;

-- Criar a tabela posts no MySQL.
CREATE TABLE posts (
-- Banco de dados responsável por gerenciar as chaves primárias
    id INT AUTO_INCREMENT PRIMARY KEY,
-- O titulo do post não poder ser vazio mas também não pode ser acimar de 255 caracteres.
    title VARCHAR(255) NOT NULL,
-- O conteúdo do post não pode ser vazio
    content VARCHAR(500) NOT NULL,
-- O banco de dados fica resposável por armazenar a data e horário da criação do post
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO posts (title, content) 
VALUES 
    ('Post 1', 'Este é o conteúdo do primeiro post, contendo informações relevantes para o tema proposto.'),
    ('Post 2', 'Conteúdo do segundo post, com ideias diferentes para engajar mais leitores e discussões.'),
    ('Post 3', 'No terceiro post, abordamos a importância de compartilhar conhecimento e experiências.'),
    ('Post 4', 'Este é o quarto post, explorando novas abordagens de tópicos populares e atuais no cenário digital.'),
    ('Post 5', 'Por fim, o quinto post, refletindo sobre tendências emergentes e como elas impactam a tecnologia.');
