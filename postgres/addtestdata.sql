/* まだ集合が分からないので手打ちデータを入力しています　*/
/* TODO: 変更が容易なデータの作成（関数などを用いる）　*/
/* TODO; コマンドラインで確認する */

insert into "user" (email, password, role) values
    ('test1@example.com', 'password', '管理者'),
    ('test2@example.com', 'password', '管理者'),
    ('test3@example.com', 'password', '評価者');

insert into category (name) values
    ('麺類'),
    ('Aセット'),
    ('Bセット');

insert into menu (category_id, name, price, image) values
    ('1', '醤油ラーメン', 210, 'https://akashi_cafeteria/image/056'),
    ('2', '親子丼', 360, 'https://akashi_cafeteria/image/023'),
    ('3', 'タコライス', 360, 'https://akashi_cafeteria/image/034');

insert into evaluation (user_id, menu_id, data) values
    ('1', '1', '5'),
    ('2', '2', '4'),
    ('3', '3', '5');

insert into daymenu (date, menu_id, sale, evaluation_id) values
    ('2018-06-12', '1', true, '1'),
    ('2018-06-13', '2', true, '2'),
    ('2018-06-14', '3', false, '3');

/* 集合で作ってみたかったんです！
insert into "user" (email, password, role) values
select
  format('test%s@example.com', i),
  format('password'),

from
  generate_series(1, 10) as i
;
*/
