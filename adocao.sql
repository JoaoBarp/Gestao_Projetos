drop database if exists adocao;
create database adocao;
ALTER DATABASE adocao CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use adocao;

-- Necessário criar um usuario com nome 'tom' e senha '1234'
-- Dar todos os privilégios para o usuario 'tom'

CREATE TABLE IF NOT EXISTS `ong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `link` varchar(40) NULL,
  `rua` varchar(30) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(15) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(2)  NOT NULL,
  `cep` varchar(10) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nome_representante` varchar(40) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `fundacao` varchar(10) NOT NULL,
  `senha` varchar(40)  NOT NULL,
  PRIMARY KEY (`id`)
);

create table usuario(
	nome varchar(30) not null,
	nome_completo varchar (50) not null,
	rua varchar(25) not null,
	numero varchar(15) not null,
	complemento varchar(15) null,
	bairro varchar(20) not null,
	cidade varchar(25) not null,
	estado varchar(2) not null,
	cep varchar(10) not null,
	telefone varchar(11) not null,
	email VARCHAR(40) not null,
	data_nascimento VARCHAR(10) NOT NULL,
	cpf VARCHAR(20) NOT NULL,
	rg VARCHAR(20) NOT NULL,
	senha VARCHAR(40) not null,
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
	descricao text null,
	nomeanimal varchar(20) not null,
	imagem varchar(100) null,
	castrado BOOLEAN NULL,
	amigavel BOOLEAN NOT NULL,
	v8v10 BOOLEAN NULL,
	raiva BOOLEAN NULL,
	tipoanimal integer not null,
	nomeusuario varchar(30) not null,
	raca varchar(30) null,
	constraint pk_animais primary key (id),
	constraint fk_animais_usuario foreign key (nomeusuario) references usuario(nome),
	-- constraint fk_animais_racas foreign key (raca) references racas(nome),
	constraint fk_animais_tipoAnimal foreign key (tipoanimal) references tipoAnimal(id)
);

--insert into estados (nome) values ('SC'), ('SP'), ('BA'), ('RS'), ('PR');
--insert into usuario values ('japa', 'blablbala', 3, 'apto 12', 'centro', 'Chapecó', 'SC', '5522456', '(49)555555', FALSE, 'balbalaba@haushyausha', 'oi123');
--insert into tipoAnimal (nome) values ('Gato'), ('Cachorro'), ('Tartaruga');
--insert into racas (nome, tipoanimal) values ('Pit bull', 2), ('Siames', 1);
--insert into animais (idade, porte, descricao, nomeanimal, tipoanimal, nomeusuario, raca) values (5, 'pequeno', 'ooooo', 'Murphy', 1, 'japa', 2);
