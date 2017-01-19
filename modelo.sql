create schema udo;
use udo;

create table usuarios(
      id int auto_increment comment 'identificador de usuario',
      username varchar(16) not null comment 'nombre de usuario',
      password varchar(200) not null comment 'contraseña', 

)