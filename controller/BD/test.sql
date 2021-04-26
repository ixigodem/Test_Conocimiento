
use test;

create table perfil(
    id_perfil int auto_increment not null,
    perfil varchar(50) not null,
    primary key (id_perfil)
);

create table usuario(
    id_usuario int auto_increment not null,
    usuario varchar(100) not null,
    clave varchar(100) not null,
    nombres varchar(100) not null,
    ap_paterno varchar(100) not null,
    ap_materno varchar(100) not null,
    email varchar(100) not null,
    estado int not null,
    id_perfil int not null,
    primary key(id_usuario),
    foreign key (id_perfil) references perfil(id_perfil)
);

insert into perfil values(null,'Administrador');
insert into perfil values(null,'Supervisor');
insert into perfil values(null,'Usuario Normal');

insert into usuario values(null,'dvidal','123456','Demis Adamo','Vidal','Arriaza','dvidal@test.cl',1,1);
insert into usuario values(null,'mruz','123456','Maria Jose','Ruz','Videla','mruz@test.cl',1,1);
insert into usuario values(null,'avidal','123456','Anahís Isabella','Vidal','Ruz','avidal@test.cl',1,1);

select * from perfil;
select * from usuario;
