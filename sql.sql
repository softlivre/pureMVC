
-- database tables and cloumns

--CREATE DATABASE puremvc;

CREATE TABLE if not exists depoimentos(
   id SERIAL PRIMARY KEY,
   nome TEXT,
   mensagem TEXT,
   data TIMESTAMP
);
