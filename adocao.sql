create database adocao;
use adocao;

-- Necessário criar um usuario com nome 'tom' e senha '1234'
-- Dar todos os privilégios para o usuario 'tom'

create table estados (
	nome varchar(2) not null,
	constraint pk_estados primary key (nome)
);

create table usuario(
	nome varchar(30) not null,
	rua varchar(25) not null,
	numero integer not null,
	complemento varchar(15) null,
	bairro varchar(20) not null,
	cidade varchar(25) not null,
	estado varchar(2) not null,
	cep varchar(8) not null,
	telefone varchar(11) not null,
	ong boolean not null,
	email VARCHAR(40) not null,
	senha VARCHAR(20) not null,
	constraint pk_usuario primary key (nome),
	constraint fk_usuario_estado foreign key (estado) references estados(nome)
);

create table tipoAnimal(
	nome varchar(30) not null,
	constraint pk_tipoAnimal primary key (nome)
);

create table racas(
	nome varchar (30) not null,
	tipoanimal varchar(30) not null,
	constraint pk_racas primary key (nome),
	constraint fk_racas_tipoAnimal foreign key (tipoanimal) references tipoAnimal(nome)
);

create table animais(
	id integer not null AUTO_INCREMENT,
	idade integer not null,
	porte varchar(15) not null,
	descricao text not null,
	nomeanimal varchar(20) null,
	tipoanimal varchar(30) not null,
	nomeusuario varchar(30) not null,
	raca varchar(30) null,
	constraint pk_animais primary key (id),
	constraint fk_animais_usuario foreign key (nomeusuario) references usuario(nome),
	constraint fk_animais_racas foreign key (raca) references racas(nome),
	constraint fk_animais_tipoAnimal foreign key (tipoanimal) references tipoAnimal(nome)
);
