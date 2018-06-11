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
/* TODO: 一意制約などをつける */
create table "user" (
    id          serial,
    email       text,
    password    text,
    role        role
);

/* TODO: create table evaluation */
/* TODO: create table category */
/* TODO: create table menu */
/* TODO: create table daymenu */
