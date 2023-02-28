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

namespace Oander\CronjobOptimization\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Oander\CronjobOptimization\Enum\SystemConfig as ConfigEnum;

/**
 * Class Config
 * @package Oander\CronjobOptimization\Config
 */
class Config extends AbstractHelper
{
    /**
     * @return int
     */
    public function numberOfLines(): int
    {
        return (int)$this->scopeConfig->getValue(
            ConfigEnum::GENERAL_NUMBER_OF_LINES,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue(
            ConfigEnum::GENERAL_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }
}
