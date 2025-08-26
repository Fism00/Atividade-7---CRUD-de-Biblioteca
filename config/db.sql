Create database biblioteca_crud;

use biblioteca_crud;

create table autores(
    id int auto_increment primary key,
    nome varchar(100) not null,
    nacionalidade varchar(100),
    ano_nascimento date not null
);


create table livros (
    id int auto_increment primary key,
    titulo varchar(100) not null,
    genero varchar(100) not null,
    ano_publicacao date not null,
    autor_id int,
    foreign key (autor_id) references autores(id)
);

create table leitores(
    id int auto_increment primary key,
    nome varchar(100) not null,
    email varchar(100),
    telefone int
);

create table emprestimos(
    id int auto_increment primary key,
    livro_id int,
    leitor_id int,
    data_emprestimo date not null,
    data_devolucao date not null,
    foreign key (livro_id) references livros(id),
    foreign key (leitor_id) references leitores(id)
);

