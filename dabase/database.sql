create database Shoop_master;

use Shoop_master;

create table users(
    id          int(255) auto_increment not null,
    nombre      varchar(100)            not null,
    apellidos   varchar(255)        ,
    email       varchar(255)            not null,
    pass        varchar(255)            not null,
    rol         varchar(20)                     ,
    imagen      varchar(255)                    ,
    constraint pk_users primary key(id),
    constraint uq_email unique (email)
)ENGINE=InnoDb;

create table categories(
    id          int(99) auto_increment not null,
    nombre      varchar(100)    not null,
    constraint pk_categories primary key(id)    
)ENGINE=InnoDb;

create table products(
    id              int(255) auto_increment not null,
    categorie_id    int(99)                 not null,
    nombre          varchar(100)            not null,
    descripcion     text                            ,
    precio          decimal                 not null,
    stock           int(255)                not null,
    oferta          varchar(2)                      , 
    fecha           date                    not null,
    imagen          varchar(255)                    ,

    constraint pk_products primary key (id),
    constraint fk_products_categoria foreign key(categorie_id) references categories(id)
)ENGINE=InnoDb;


create table orders(
    id              int(255) auto_increment not null,
    user_id         int(255)                not null,
    provincia       varchar(100)            not null,
    localidad       varchar(100)            not null,
    direccion       varchar(100)            not null,
    costo           float(200,2)            not null,
    estado          varchar(20)             not null, 
    fecha           date                            ,
    hora            time                            ,

    constraint pk_orders primary key (id),
    constraint fk_orders_user foreign key(user_id) references users(id)
)ENGINE=InnoDb;


create table orders_details(
    id                  int(255)        not null,
    order_id            int(255)        not null,
    product_id          int(255)        not null,

    constraint pk_orders_detail primary key(id),
    constraint fk_oders_detail  foreign key(order_id) references orders(id),
    constraint fk_oders_product foreign key(product_id) references products(id)
)ENGINE=InnoDb;