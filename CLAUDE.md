# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## 重要: 開発は TDD で進める

今後の機能追加・修正はすべて TDD（テスト駆動開発）で行う。失敗するテストを先に書き、それを通す最小の実装を加え、その後リファクタリングする、というサイクルを守ること。

- テストは**本質的な振る舞い**に対して書く。境界値（空・1件・最大件数、ゼロ・負値・オーバーフロー、先頭／末尾、閏年など）、異常系、表裏の対称性といった、実装の意図を検証する観点を重視する。
- **テストを通すためだけのテスト**を書いてはならない。実装に合わせて期待値を後付けしたり、入力をそのまま返すだけのアサーションを置いたり、カバレッジを稼ぐだけのテストは禁止。テストが落ちたときに、実装のどこが間違っているかが読み取れることを基準にする。
- バグ修正の際も、まずそのバグを再現する失敗テストを書いてから修正する。
- Codeception の unit / web スイート（`make test`）に追加することを原則とし、対象が純粋ロジックなら `tests/unit/`、Yii の HTTP レイヤーを含むなら web スイートを使う。

## プロジェクト概要

fetus.jp は Yii 2 basic application template をベースにした個人サイト（PHP ≥ 8.4、PostgreSQL を `ext-pdo_pgsql` 経由で使用）。実体は `webapp/` 配下にあり、リポジトリルートには Deployer のレシピ（`deploy.php`）と `webapp/` へ処理を委譲するだけのトップレベル `Makefile` しか置かれていない。

## コマンドを実行する場所

日常的に使うツールはすべて `webapp/`（リポジトリルートではなく）で動かす。`webapp/Makefile` が正規のエントリポイントであり、ツールを直接呼び出すよりも優先される。必要な生成ファイル（`.browserslistrc`、`config/cookie-secret.php`、`config/deploy-id.php`）を用意し、`vendor/` と `node_modules/` も必要に応じてインストールしてくれるため。

## よく使うコマンド

`webapp/` で実行する：

- `make` — フルビルド。composer/npm の依存解決、cookie secret と deploy id の生成、SCSS→CSS、Babel ES→JS、CSS/JS のミニファイ、SVG 最適化、favicon のコピーまで行う。
- `make clean` — 生成済みリソースと `web/assets/*` を削除。
- `make check-style` — すべての linter（PHPCS、PHPStan、semistandard、stylelint）を実行。
  - 個別に動かすなら `make check-style-phpcs` / `make check-style-phpstan` / `make check-style-js` / `make check-style-css`。
- `make test` — `test-unit`（Codeception unit スイート）と `test-web`（`tests/bin/yii test/web` で走る functional スイート）を実行。
- `./vendor/bin/codecept run unit` — unit テストのみ。単一ケースを指定するときはクラス／メソッドを付ける（例：`unit ExampleTest:testFoo`）。
- `./yii <route>` — Yii のコンソールエントリポイント（例：`./yii license/extract`、`./yii config/generate-deploy-id`）。`config/console.php` を使い、`yii` と同じ階層に `.production` マーカーファイルが存在しない限り dev モードで起動する。

PHPStan は Yii2 設定として `config/test.php` を使い（`phpstan.neon` を参照）、`runtime/phpstan` に書き込み権限が必要。`level: max` に設定されているが、CI 上では `continue-on-error` 扱い。

## 全体アーキテクチャ

`webapp/` 配下は Yii 2 basic の標準レイアウトだが、プロジェクト固有の工夫がいくつかある：

- **エントリポイント**: `web/index.php`（HTTP。`config/web.php` を使用）と `yii`（コンソール。`config/console.php` を使用）。どちらも `config/di.php` を通してブートストラップし、`.production` ファイルの有無で `YII_DEBUG` / `YII_ENV` を切り替える。
- **Web ルーティング**（`config/web.php`）: pretty URL 有効、`showScriptName=false`。キャッチオールルール `<_c:[a-z0-9-]+> => /<_c>/index` により、`/about` のようなパスはそのまま `AboutController::actionIndex()` にマッピングされる。`BootstrapAsset` / `BootstrapPluginAsset` のバンドルは Yii 標準の代わりに `@npm/@jp3cki/fetus.css` と `@npm/bootstrap` から読み込むよう上書きされている。
- **コントローラ**（`controllers/`）はジェネリクス付きで型付けされている：`class FooController extends Controller<Application>`。新しいコントローラを追加するときもこのパターンを維持すること。コミット `fd190c2` で導入された慣習で、PHPStan を max レベルで通すために必要。
- **コンソールコマンド**は `commands/` に置く（`ConfigController`、`LicenseController`、`TestController` など）。`license/` はサブディレクトリ構成で独自のアクションを持ち、`composer post-install-cmd` / `post-update-cmd` からサードパーティライセンスファイルの抽出と同梱のために呼ばれる。
- **フロントエンドアセットのフロー**: `resource/css/*.scss` → `.css` → `.min.css`（sass + postcss/autoprefixer + cssnano）、`resource/js/*.es` → `.js` → `.min.js`（Babel + terser）。`make` のターゲットがファイル単位で定義されているため、ソースファイルと生成物の両方がコミットされている。新しいアセットを追加する際は `webapp/Makefile` 内の `RESOURCES` リストが正であり、ここにソースを追記する必要がある。
- **アセットバンドル**（`assets/`）が生成ファイルを Yii の asset manager に接続する。`.babelrc`、`.browserslistrc`、`.stylelintrc`、`.svgo.config.js` がツールチェインの設定。`.browserslistrc` はビルド時に upstream の Bootstrap から取得する。
- **ヘルパーとウィジェット**: `helpers/` にプロジェクト全体で使うユーティリティ（`Html`、`Icon`、`IconSource`、`Unicode`）、`widgets/` に再利用可能な Yii ウィジェット（`JapaneseFlag`、`Twemoji`、`Youtube`、`R18Dialog` など）。

## コーディングスタイル

- PHP: `.phpcs.xml` による JP3CKI coding standard（Slevomat ベースだが、パラメータ／プロパティ／戻り値の型ヒント sniff とスーパーグローバル禁止は無効化）。すべての PHP ファイルで `declare(strict_types=1);` を使う。
- JS（`resource/**/*.es`）: `semistandard`。env は `browser` + `jquery`、グローバルは `bootstrap` と `jQuery`（`package.json` で設定）。
- CSS/SCSS: `stylelint-config-sass-guidelines` を使った `stylelint` を `resource/**/*.scss` に対して実行。

## デプロイ

本番デプロイは Deployer 6.8.0（ルートの `Makefile` が取得する `bin/dep`）と `deploy.php` のレシピで行う。デプロイ先は IPv6 アドレスのホスト（`ayanami3`）。デプロイ時に `webapp/` へ `.production` マーカーを置くことで Yii のブートストラップが prod モードを選び、リリースディレクトリ内で `make` を実行したあと、`SiteController::behaviors` でループバックに制限されている `/site/clear-opcache` を叩いて OPcache をフラッシュする。
