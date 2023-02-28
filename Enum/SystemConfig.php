<?php
/**
 *    ____  _ _       _____  _
 *   |  _ \(_) |     |  __ \| |
 *   | |_) |_| |_ ___| |__) | | ___  __ _ ___  ___
 *   |  _ <| | __/ __|  ___/| |/ _ \/ _` / __|/ _ \
 *   | |_) | | |_\__ \ |    | |  __/ (_| \__ \  __/
 *   |____/|_|\__|___/_|    |_|\___|\__,_|___/\___|
 *
 * Oander_CronjobOptimization
 *
 * @author Arnold Csisztai <arnold.csisztai@oander.hu>
 * @license Oander Media Kft. (https://www.oander.hu)
 */

declare(strict_types=1);

namespace Oander\CronjobOptimization\Enum;

/**
 * Class SystemConfig
 * @package Oander\CronjobOptimization\Enum
 */
final class SystemConfig
{
    const SETTINGS_PATH = 'oander_cronjob_optimization/general/';

    const GENERAL_ENABLED = self::SETTINGS_PATH . 'enabled';
    const GENERAL_NUMBER_OF_LINES = self::SETTINGS_PATH . 'number_of_lines';
}
