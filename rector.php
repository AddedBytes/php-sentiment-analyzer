<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {

    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon.dist');

    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->skip([
        __DIR__ . 'src/Data',
        __DIR__ . 'src/Resources',
        __DIR__ . 'src/Assets',
    ]);

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,
    ]);

    $rectorConfig->parallel(240, 8, 8);


    $rectorConfig->skip([
        ClassPropertyAssignToConstructorPromotionRector::class,
        AddOverrideAttributeToOverriddenMethodsRector::class,
    ]);


    $rectorConfig::configure()->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: false,
        naming: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true,
    );
};
