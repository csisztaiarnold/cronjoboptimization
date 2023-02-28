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

namespace Oander\CronjobOptimization\Controller\Index;

use Magento\Framework\App\Action\Context;
use Oander\CronjobOptimization\Cron\CleanCronjobTable;

/**
 * Class Index
 * @package Oander\CronjobOptimization\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var CleanCronjobTable
     */
    private $cleanCronjobTable;

    /**
     * Index constructor.
     * @param Context $context
     * @param CleanCronjobTable $cleanCronjobTable
     */
    public function __construct(
        Context           $context,
        CleanCronjobTable $cleanCronjobTable
    )
    {
        $this->cleanCronjobTable = $cleanCronjobTable;
        parent::__construct($context);
    }

    /**
     * @return ResultInterface|ResponseInterface|void|null
     * @throws Exception
     */
    public function execute()
    {
        return $this->cleanCronjobTable->execute();
    }
}
