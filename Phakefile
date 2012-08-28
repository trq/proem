<?php

require_once 'lib/Proem/Autoloader.php';

(new \Proem\Autoloader)
    ->attachNamespace('Proem', 'lib')
    ->register();

group('proem', function() {
    desc('Get curreent version of proem');
    task('version', function() {
        echo Proem\Proem::VERSION . "\n";
    });
});

group('dev', function() {

    desc('Run the unit tests');
    task('tests', function($args) {
        $report = ' ';
        if (isset($args['coverage'])) {
            if (!is_dir('tests/coverage')) {
                mkdir('tests/coverage');
            }
            $report = ' --coverage-html tests/coverage ';
        }
        if (isset($args['verbose'])) {
            system('vendor/bin/phpunit' . $report . '--colors --debug --verbose --configuration tests/phpunit.xml');
        } else {
            system('vendor/bin/phpunit' . $report . '--colors --configuration tests/phpunit.xml');
        }
    });

    desc('Build the Phar archive');
    task('build', 'tests', function($args) {
        if (!is_dir('build')) {
            mkdir('build');
        }
        chdir('lib');
        $phar = new Phar('proem.phar');
        $phar->buildFromDirectory('.');
        $phar->setStub("<?php
        Phar::mapPhar('proem.phar');
        require_once 'phar://proem.phar/Proem/Autoloader.php';
        (new Proem\Autoloader())->attachNamespaces(['Proem' => 'phar://proem.phar'])->register();
        __HALT_COMPILER();
        ?>");
        rename('proem.phar', '../build/proem.phar');
        chdir('../');
        if (isset($args['runtests'])) {
            system('vendor/bin/phpunit --colors tests/phar-test.php');
        }
    });

    desc('Bump the version number');
    task('bump', function($args) {
        $file = file_get_contents('lib/Proem/Api/Proem.php');
        preg_match('/VERSION = \'([0-9]?)\.([0-9]?)\.([a-z0-9])\';/', $file, $matches);
        list($all, $major, $minor, $incr) = $matches;
        if (isset($args['major'])) {
            $major = (string) ++$major;
            $minor = '0';
            $incr = '0';
        } elseif (isset($args['minor'])) {
            $minor = (string) ++$minor;
            $incr = '0';
        } elseif (isset($args['incr'])) {
            if ($args['incr'] === 'true') {
                $incr = (string) ++$incr;
            } else {
                $incr = $args['incr'];
            }
        }
        $version = "$major.$minor.$incr";
        echo "VERSION = '$version'\n";
        if (isset($args['write'])) {
            $file = preg_replace('/VERSION = \'(.*)\';/', "VERSION = '$version';", $file);
            file_put_contents('lib/Proem/Api/Proem.php', $file);
        }
    });
});

task('default', 'dev:tests');
