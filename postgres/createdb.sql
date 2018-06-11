/*
  本番サーバでは既に実行済み

  - user作成
  - DB作成
  - userのDBへの紐づけ
*/

\set db_name `echo "$DB_NAME"`
\set db_user `echo "$DB_USER"`
\set db_pass `echo "$DB_PASS"`

create user :db_user login password :'db_pass';
create database :db_name;
grant all privileges on database :db_name to :db_user;
