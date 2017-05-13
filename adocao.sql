drop database if exists adocao;
create database adocao;
ALTER DATABASE adocao CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use adocao;

-- Necessário criar um usuario com nome 'tom' e senha '1234'
-- Dar todos os privilégios para o usuario 'tom'

create table estados (
	id integer not null AUTO_INCREMENT,
	nome varchar(2) not null,
	constraint pk_estados primary key (id)
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
	constraint pk_usuario primary key (nome)
	-- constraint fk_usuario_estado foreign key (estado) references estados(nome)
);

create table tipoAnimal(
	id integer not null AUTO_INCREMENT,
	nome varchar(30) not null,
	constraint pk_tipoAnimal primary key (id)
);

create table racas(
	id integer not null AUTO_INCREMENT,
	nome varchar (30) not null,
	tipoanimal integer not null,
	constraint pk_racas primary key (id),
	constraint fk_racas_tipoAnimal foreign key (tipoanimal) references tipoAnimal(id)
);

create table animais(
	id integer not null AUTO_INCREMENT,
	idade integer not null,
	porte varchar(15) not null,
	descricao text not null,
	nomeanimal varchar(20) null,
	tipoanimal integer not null,
	nomeusuario varchar(30) not null,
	raca varchar(30) null,
	constraint pk_animais primary key (id),
	constraint fk_animais_usuario foreign key (nomeusuario) references usuario(nome),
	-- constraint fk_animais_racas foreign key (raca) references racas(nome),
	constraint fk_animais_tipoAnimal foreign key (tipoanimal) references tipoAnimal(id)
);

insert into estados (nome) values ('SC'), ('SP'), ('BA'), ('RS'), ('PR');
insert into usuario values ('japa', 'blablbala', 3, 'apto 12', 'centro', 'Chapecó', 'SC', '5522456', '(49)555555', FALSE, 'balbalaba@haushyausha', 'oi123');
insert into tipoAnimal (nome) values ('gato'), ('cachorro'), ('tartaruga');
insert into racas (nome, tipoanimal) values ('pit bull', 2), ('siames', 1);
insert into animais (idade, porte, descricao, nomeanimal, tipoanimal, nomeusuario, raca) values (5, 'pequeno', 'ooooo', 'Murphy', 1, 'japa', 2);
