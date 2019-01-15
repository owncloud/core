<?php
/**
 * @author Joas Schilling <coding@schilljs.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author Robin Appelman <icewind@owncloud.com>
 * @author Vincent Petry <pvince81@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OC\Core\Command\App;

use OCP\App\IAppManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Enable extends Command
{

    /** @var IAppManager */
    protected $manager;

    /**
     * @param IAppManager $manager
     */
    public function __construct(IAppManager $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    protected function configure()
    {
        $this
            ->setName('app:enable')
            ->setDescription('Enable an app.')
            ->addArgument(
                'app-id',
                InputArgument::REQUIRED | InputArgument::IS_ARRAY,
                'Enable the specified app.'
            )
            ->addOption(
                'groups',
                'g',
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Enable the app only for a specific list of groups.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $appIds = $input->getArgument('app-id');
        $groups = $input->getOption('groups');

        return $this->enableApps($appIds, $groups, $output);
    }

    /**
     * Enable a list of apps
     * @param array $appIds
     * @param array $groups
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return int 1 when one or more apps not found, 0 when everything went successfully
     * @throws \Exception
     */
    private function enableApps(array $appIds, array $groups, OutputInterface $output): int
    {
        $errorFlag = 0;
        foreach ($appIds as $appId) {
            if (!\OC_App::getAppPath($appId)) {
                $output->writeln($appId . ' not found');
                $errorFlag = 1;
                continue;
            }

            if (empty($groups)) {
                \OC_App::enable($appId);
                $output->writeln($appId . ' enabled');
            } else {
                \OC_App::enable($appId, $groups);
                $output->writeln($appId . ' enabled for groups: ' . \implode(', ', $groups));
            }

        }

        return $errorFlag;
    }

}
