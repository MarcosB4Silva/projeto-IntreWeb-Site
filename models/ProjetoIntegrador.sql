drop database if exists dbIntre;

create database dbIntre;

use dbIntre;

create table tbFuncionarios(
codFunc int not null auto_increment,
nomeFunc varchar(50) not null,
cpfFunc char(11) not null,
dataNasc date not null,
rgFunc char(11) not null,
dataExp date not null,
UF char(2) not null,
primary key(codFunc)
);

create table tbUsuarios(
codUsu int not null auto_increment,
nomeUsu varchar(50) not null,
login char(8) not null,
senha char(8) not null,
primary key(codUsu)
);

create table tbClientes(
codCli int not null auto_increment,
nomeCli varchar(50) not null,
emailCli varchar(50) not null unique,
telCli char(11) not null,
primary key(codCli)
);

create table tbAmbientes(
codAmb int not null auto_increment,
nomeAmb varchar(100) not null,
primary key(codAmb)
);

create table tbProjetos(
codProj int not null auto_increment,
formaContato varchar(50) not null, 
logradouro varchar(100) not null,
bairro varchar(50) not null,
estado char(2) not null, 
cidade varchar(50) not null, 
complemento varchar(50) not null,
tipoImovel varchar(50) not null, 
tipoServico varchar(50) not null,
metragem decimal(9,2) not null,
revestimentos varchar(50) not null,
marcenaria varchar(50) not null,
descricaoAmbiente text not null,
codCli int not null,
codAmb int not null,
primary key(codProj),
foreign key(codCli) references tbClientes(codCli),
foreign key(codAmb) references tbAmbientes(codAmb)
);

create table tbTipoOrcamento(
codTipo int not null auto_increment,
descricao varchar(255) not null,
primary key(codTipo)
);

-- INSERTs fixos para a tabela TipoOrcamento:
insert into tbTipoOrcamento(descricao) values ("BÁSICO"); -- cod 1
insert into tbTipoOrcamento(descricao) values ("PL + 3D"); -- cod 2
insert into tbTipoOrcamento(descricao) values ("COMPLETO + 3D"); -- cod 3

create table tbMetragens(
codMetr int not null auto_increment,	
codTipo int not null,
descricao varchar(255) not null,
metragemMin decimal,
metragemMax decimal,
valor decimal(9, 2),
primary key (codMetr),
foreign key(codTipo) references tbTipoOrcamento(codTipo)
);

-- INSERTs fixos para a tabela Metragens:

-- Para o tipo de Orçamento: BÁSICO:
insert into tbMetragens(codTipo, descricao, metragemMin, metragemMax, valor) values (1, "Um cômodo", 15, 15, 225.00);
insert into tbMetragens(codTipo, descricao, metragemMin, metragemMax, valor) values (1, "Até 30m²", 16, 30, 450.00);
insert into tbMetragens(codTipo, descricao, metragemMin, metragemMax, valor) values (1, "De 30 40m²", 15, 15, 225.00);	

-- Para o tipo de Orçamento: PL + 3D:
insert into tbMetragens(codTipo, descricao, metragemMin, metragemMax, valor) values (2, "Um cômodo", 15, 15, 725.00);

-- Para o tipo de Orçamento: COMPLETO + 3D:
insert into tbMetragens(codTipo, descricao, metragemMin, metragemMax, valor) values (3, "Um cômodo", 15, 15, 1500.00);


-- Tabelas que terão INSERTs fixos:
create table tbExtras(
codExtra int not null auto_increment,
descricao varchar(255) not null,
valor decimal(9, 2),
primary key(codExtra)
);

-- INSERTs fixos para a tabela Extras:
insert into tbExtras(descricao, valor) values ('Pasta de entrega', 10.00);
insert into tbExtras(descricao, valor) values ('Plotagens', 15.00);
insert into tbExtras(descricao, valor) values ('Overdelivery', 0.0);
insert into tbExtras(descricao, valor) values ('Visitas técnicas avulsas', 150.00);
insert into tbExtras(descricao, valor) values ('Taxas de Prefeitura', 0.0);
insert into tbExtras(descricao, valor) values ('RRT', 150.00);
insert into tbExtras(descricao, valor) values ('Papelaria', 0.0);
insert into tbExtras(descricao, valor) values ('Deslocamento', 0.0);
 
create table tbOrcamentos(
codOrc int not null auto_increment,
valorInicial decimal(9,2) not null,
valorTotal decimal(9,2) not null,
codProj int not null,
codUsu int not null,
codMetr int not null,
codExtra int not null,
primary key(codOrc),
foreign key(codProj) references tbProjetos(codProj),
foreign key(codUsu) references tbUsuarios(codUsu),
foreign key(codMetr) references tbMetragens(codMetr),
foreign key(codExtra) references tbExtras(codExtra)
);
 
create table tbGaleria(
codGal int not null auto_increment,
tituloGal varchar (50) not null,
descricaoGal text not null,
fotosGaleria blob not null,
primary key(codGal)
);


 
desc tbFuncionarios;
desc tbUsuarios;
desc tbClientes;
desc tbProjetos;
desc tbOrcamentos;
desc tbAmbientes;
desc tbGaleria;
