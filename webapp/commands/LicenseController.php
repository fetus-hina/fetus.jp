<?php

/**
 * @copyright Copyright (C) 2015-2021 AIZAWA Hina
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\commands;

use Yii;
use app\commands\license\LicenseExtractTrait;
use yii\console\Controller;

class LicenseController extends Controller
{
    use LicenseExtractTrait;

    public $defaultAction = 'extract';
}
