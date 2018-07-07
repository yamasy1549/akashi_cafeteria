/*
  - enum
    - role
  - table
    - user
    - evaluation
    - category
    - menu
    - daymenu
*/

create type role as enum (
    '評価者',
    '管理者'
);

/* userは予約語なのでダブルクォーテーションが必要みたい */
/* TODO; コマンドラインで確認する */

create table "user" (
    user_id     serial primary key,
    email       text not null,
    password    text not null,
    role        role not null
);

create table category (
    category_id serial primary key,
    name        text not null
);

create table menu (
    menu_id     serial primary key,
    category_id integer references category(category_id) on delete cascade not null,
    name        text not null,
    price       integer not null,
    image       text
);

create table evaluation (
    evaluation_id    serial primary key,
    user_id          integer references "user"(user_id) on delete cascade not null,
    menu_id          integer references menu(menu_id) on delete cascade not null,
    data             integer not null
);

/* sale: true...販売中　false...売り切れ　*/
create table daymenu (
    daymenu_id    serial primary key,
    date          date not null,
    menu_id       integer references menu(menu_id) on delete cascade not null,
    sale          boolean default true not null
);
