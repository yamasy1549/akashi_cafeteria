## 開発の流れ

- Gitを使って自分のPCでソースコードを書き、キリのいいタイミングでソースコードをサーバに投入する
  - 複数人で同じファイルを編集してしまうとややこしいので、サーバ内でソースコードを書かないようにしたい……
  - サーバへの投入は役割を決めて誰かがやるか、GitHub の Webhook を使って自動化する
- ソースコードは GitHubで管理する
  - https://github.com/yamasy1549/akashi_cafeteria

### Gitの概要

- ソースコードなど、主にテキストからなるファイルの変更履歴を管理するもの
  - 変更の差分をその都度（commitするごとに）保存していくイメージ
- 誰がいつ何にどんな変更をしたのか、が記録される
- 過去の履歴を改変することができる
  - あんまりやりたくないけど
  - パスワードなど、外部に漏れたらマズい（Git管理すべきでない）情報を間違えて管理してしまっていた場合など
- 自分のPCなど手元で編集して、キリのいいタイミングで他の人に共有できる
  - ref: 分散型

### Gitの使い方

- まとまった機能（チケット）ごとにブランチを作成して作業する
  - `$ git checkout -b ブランチ名`
- ファイルを{編集,新規作成}したら `$ git add ファイル名` する
  - 「ステージングする」と言うこともある。要するに次段階で commit するファイル名を教えてあげる
  - ファイルが add されているかどうかは `$ git status` コマンドでわかる
- 変更の小さなまとまり（「なぜ変更したか？」の観点で見て同じもの）ごとに `$ git commit -m メッセージ` する
  - ステージングされたファイル（複数ファイルあっても良い）を、後で見返しやすいようにまとめる
- GitHub に今いるブランチの最新のソースコードを送る
  - `$ git push origin ブランチ名`
- 最終的に `master` という名前のブランチに、各人の作ったブランチを統合する
  - このブランチのソースコードが、実際にサーバで動かすものになる

## ディレクトリ構成

```
.
├── README.md
├── bin                             // 手元で実行するシェルスクリプトなど
│   └── lint.sh
├── etc                             // 設定ファイルなど
│   └── php.ini
├── postgres                        // DBに関するスクリプトなど
│   ├── addtestdata.sql
│   ├── createdb.sql
│   └── createtable.sql
├── postgres-data                   // PostgreSQLのデータが入る（無視）
├── public_html                     // PHPのファイル群。だいたいここを編集する
│   ├── Dispatcher.php              // リクエストURLに応じてどのコントローラで処理するかを振り分ける
│   ├── Post.php
│   ├── QueryString.php
│   ├── Request.php
│   ├── RequestVariables.php
│   ├── controllers                 // 【MVC:コントローラ】
│   │   └── CategoryController.php
│   ├── index.php                   // 起点。すべて最初はここにアクセスされる
│   ├── models                      // 【MVC:モデル】
│   │   ├── BaseModel.php
│   │   └── Category.php
│   ├── templates_c                 // Smartyのコンパイル後のファイルが入る（無視）
│   └── views                       // 【MVC:ビュー】
│       ├── category
│       │   └── index.tpl
│       ├── smarty                  // Smartyのライブラリ本体のファイル（無視）
│       └── templates               // 共通で使う部分的なView
│           ├── footer.tpl
│           └── header.tpl
├── tests                           // PHPのソースコードのテストを置く
├── .env                            // 環境変数
└── .gitignore                      // Git管理しないファイルのリスト

14 directories, 227 files
```

## MVCぽい感じでやっていきたい

### とは？

デザインパターン（先人たちの編み出した設計ノウハウをまとめたもの）の一つ。

ざっくり言うと、ユーザが直接DBに触ってデータを参照・編集するのを避けたいための構成。

MVCそれぞれの中では、各要素の役割のみに集中して処理を行う。例えば、コントローラ内でDBと直接接続したりしない（これはモデルの責務）。

### 実際の構成

- **モデル(Model)** : DBと接続してデータをやりとりするところ。基本的にDBのテーブルと1対1
- **ビュー(View)** : モデルのデータをユーザに見せるところ。基本的にモデルと1対1になるディレクトリを作って、コントローラのアクション毎にファイル（ページ）を作る
- **コントローラ(Controller)** : ユーザの操作とモデルをつなぐ処理を書くところ。基本的にモデルと1対1

↓は Ruby on Rails での MVC の説明、今回と大きくは変わらない
ref : https://www.rubylife.jp/rails/ini/index7.html

## Lint

コーディングスタイルの統一のため、`php-cs-fixer` を使用します。

インデントや、括弧前後の空白のあるなし、空行の入れ方などを自動整形（ファイルを上書き）してくれます。

好みの問題でもありますが、スタイルを統一することで、ソースコード全体の読みやすさを保ちます。

### 使い方

`public_html` 以下の `*.php` ファイルを書き換えた後、ファイルを `$ git add` する前に以下を実行してください。

```
$ ./bin/lint.sh
```

また、オプション `--diff --diff-format udiff` を付ければ、自動整形される前後のソースコードを比較できます。

`--dry-run` を付けると実際にはファイルを上書きせず、自動整形するとどうなるかを表示するだけになります。確認用に使ってください。

```
$ ./bin/lint.sh --diff --diff-format udiff --dry-run
```

### Tips

現在はデフォルトのルールを使用していますが、`.php_cs.dist` ファイルに独自のルールを書いて適用することも可能です。

ref: http://fivestar.hatenablog.com/entry/2017/03/30/233744

## PostgreSQL

インストールしたら、環境にもよるけど大体こんな感じで初期設定をします。

```
$ initdb /usr/local/var/postgres -E utf8

# 起動
$ postgres &

# 本番サーバと同じ初期状態にする
$ export $(cat .env) && psql -d postgres -f postgres/createdb.sql
```

```
# テーブルを作る
$ export $(cat .env) && psql -d $DB_NAME -f ./postgres/createtable.sql
```

```
# テストデータを追加する
$ export $(cat .env) && psql -d $DB_NAME -f ./postgres/addtestdata.sql
```

## PHP

```
# 起動
$ export $(cat .env) &&  php -S 127.0.0.1:8080 -t public_html

# ブラウザで localhost:8080 を開く
```
