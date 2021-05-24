<?php

declare(strict_types=1);

namespace Deployer;

require('recipe/yii2-app-basic.php');

set('application', 'fetusjp');
set('repository', 'git@github.com:fetus-hina/fetus.jp.git');
set('composer_options', implode(' ', [
    'install',
    '--no-interaction',
    '--no-plugins',
    '--no-progress',
    '--optimize-autoloader',
    '--prefer-dist',
    '--verbose',
]));
set('git_tty', true);
add('shared_files', [
    'webapp/config/cookie-secret.php',
]);
add('shared_dirs', [
    'webapp/runtime',
]);
add('writable_dirs', [
    'webapp/runtime',
    'webapp/web/assets',
]);
set('writable_mode', 'chmod');
set('writable_chmod_recursive', false);
set('softwarecollections', []);

set('bin/php', function () {
    if ($scl = get('softwarecollections')) {
        return vsprintf('scl enable %s -- php', [
            implode(' ', array_map(
                'escapeshellarg',
                $scl
            )),
        ]);
    }

    return locateBinaryPath('php');
});

set('bin/npm', function () {
    if ($scl = get('softwarecollections')) {
        return vsprintf('scl enable %s -- npm', [
            implode(' ', array_map(
                'escapeshellarg',
                $scl
            )),
        ]);
    }

    return locateBinaryPath('npm');
});

host('ayanami.single-quote.com')
    ->user('fetusjp')
    ->stage('production')
    ->roles('app')
    ->set('deploy_path', '~/app')
    ->set('softwarecollections', [
        'php80',
        'rh-nodejs14',
    ]);

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:git_config',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:production',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'deploy:run_migrations',
    'deploy:build',
    'deploy:symlink',
    'deploy:clear_opcache',
    'deploy:clear_proxy',
    'deploy:unlock',
    'cleanup',
])->desc('Deploy the project');

task('deploy:git_config', function () {
    run('git config --global advice.detachedHead false');
});

task('deploy:production', function () {
    within('{{release_path}}/webapp', function () {
        run('touch .production');
    });
});

task('deploy:vendors', function () {
    within('{{release_path}}/webapp', function () {
        run('ln -s {{release_path}}/composer.phar composer.phar');
        run('{{bin/composer}} {{composer_options}} --no-dev');
        run('{{bin/npm}} clean-install --only=prod');
    });
});

task('deploy:run_migrations', function () {
    within('{{release_path}}/webapp', function () {
        run('{{bin/php}} ./yii migrate up --interactive=0');
    });
});

task('deploy:build', function () {
    within('{{release_path}}/webapp', function () {
        if ($scl = get('softwarecollections')) {
            run(vsprintf('scl enable %s -- make', [
                implode(' ', array_map(
                    'escapeshellarg',
                    $scl
                )),
            ]));
        } else {
            run('make');
        }
    });
});

task('deploy:clear_opcache', function () {
    run('curl -f --insecure --resolve fetus.jp:443:127.0.0.1 https://fetus.jp/site/clear-opcache');
});

task('deploy:clear_proxy', function () {
});

after('deploy:failed', 'deploy:unlock');
