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

namespace Oander\CronjobOptimization\Cron;

use Magento\Framework\Setup\SchemaSetupInterface;
use Oander\CronjobOptimization\Helper\Config as ConfigHelper;
use Zend_Db_Statement_Exception;

class CleanCronjobTable
{
    /**
     * The cron_schedule table.
     */
    const CRON_SCHEDULE_TABLE = 'cron_schedule';

    /**
     * @var ConfigHelper
     */
    protected $configHelper;

    /**
     * @var SchemaSetupInterface
     */
    private $setup;

    /**
     * TurnOffModule constructor.
     */
    public function __construct(
        ConfigHelper         $configHelper,
        SchemaSetupInterface $setup
    )
    {
        $this->configHelper = $configHelper;
        $this->setup = $setup;
    }

    /**
     * Execute cron.
     *
     * @return void
     * @throws Zend_Db_Statement_Exception
     */
    public function execute()
    {
        if ($this->configHelper->isEnabled()) {
            $lineCount = $this->setup->getConnection()
                ->query('SELECT COUNT(*) FROM `' . self::CRON_SCHEDULE_TABLE . '`')
                ->fetchColumn();
            if ($lineCount >= $this->configHelper->numberOfLines()) {
                $this->setup->getConnection()
                    ->query('TRUNCATE TABLE `' . self::CRON_SCHEDULE_TABLE . '`');
            }
        }
    }
}
