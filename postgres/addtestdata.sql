/* まだ集合が分からないので手打ちデータを入力しています　*/
/* TODO: 変更が容易なデータの作成（関数などを用いる）　*/

insert into category (name) values
    ('Aセット'),
    ('Bセット'),
    ('カレー'),
    ('麺類'),
    ('その他');

insert into menu (category_id, name, price, image) values
    ('1', '北海道グラタンコロッケとサーモンフライ', 420, ''),
    ('1', '肉じゃが', 420, 'https://image.walkerplus.com/lettuce/img/dish/1/S20150225015001A_000.png'),
    ('1', '白身魚と野菜の南蛮漬け', 420, 'https://img.cpcdn.com/recipes/3277941/280/606d4381c955fb6b9f393cf7257621c7.jpg'),
    ('1', 'とんてき', 420, ''),
    ('2', '豚肉の生姜焼き丼', 360, 'https://img.cpcdn.com/recipes/2963792/280/e60fc6c43377b1f8abfe477860186b2d.jpg'),
    ('2', '10品目のビビンバ丼', 360, 'https://image.space.rakuten.co.jp/d/strg/ctrl/3/0a651b92f7a27f1cb8fb5e03c5fdc01d2cc6301f.84.2.3.2.jpg'),
    ('2', 'ソースカツ丼', 360, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkd30YMOEYeM3W_WLjF5VV-tQjKoatOgetxAxy4n800QekqxVh'),
    ('2', '鶏唐マヨ丼', 360, 'https://img.cpcdn.com/recipes/2224480/280/f019f5447219f6fce8a0d5291621172b.jpg'),
    ('3', 'カレーライス', 290, 'https://image.walkerplus.com/lettuce/img/dish/1/S20071125025002A_000.png'),
    ('4', '醤油ラーメン', 210, 'http://www.week.co.jp/matome/wp-content/uploads/2015/08/cd0267c33f1b68503993ef357ff3634c.jpg'),
    ('5', 'ライス', 100, 'https://uds.gnst.jp/rest/img/envdvwew0000/s_0n68.jpg');

insert into evaluation (menu_id, data) values
    ('1', '5'),
    ('9', '2'),
    ('9', '4'),
    ('10', '3'),
    ('11', '2');

insert into daymenu (date, menu_id, sale) values
    ('2018-07-17', '1', true),
    ('2018-07-17', '5', false),
    ('2018-07-17', '9', true),
    ('2018-07-17', '10', true),
    ('2018-07-17', '11', true),
    ('2018-07-18', '2', true),
    ('2018-07-18', '6', true),
    ('2018-07-18', '9', true),
    ('2018-07-18', '10', true),
    ('2018-07-18', '11', true),
    ('2018-07-19', '3', true),
    ('2018-07-19', '7', true),
    ('2018-07-19', '9', true),
    ('2018-07-19', '10', true),
    ('2018-07-19', '11', true),
    ('2018-07-20', '4', true),
    ('2018-07-20', '8', true),
    ('2018-07-20', '9', true),
    ('2018-07-20', '10', true),
    ('2018-07-20', '11', true);

/* 集合で作ってみたかったんです！
insert into "user" (email, password, role) values
select
  format('test%s@example.com', i),
  format('password'),

from
  generate_series(1, 10) as i
;
*/
