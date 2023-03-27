<?php
/**
 * @author Juan Pablo Villafáñez <jvillafanez@solidgear.es>
 *
 * @copyright Copyright (c) 2016, ownCloud GmbH.
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

namespace OCA\User_LDAP\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use OCA\User_LDAP\User_Proxy;
use OCA\User_LDAP\Group_Proxy;

class InvalidateCache extends Command {
	/** @var User_Proxy */
	private $uProxy;
	/** @var Group_Proxy */
	private $gProxy;

	public function __construct(User_Proxy $uProxy, Group_Proxy $gProxy) {
		$this->uProxy = $uProxy;
		$this->gProxy = $gProxy;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('ldap:invalidate-cache')
			->setDescription('invalidates the LDAP cache');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$uProxyBackendsCount = $this->uProxy->getBackendCount() + 1;  // +1 for the proxy itself
		$gProxyBackendsCount = $this->gProxy->getBackendCount() + 1;  // +1 for the proxy itself

		$progressBar = new ProgressBar($output, $uProxyBackendsCount + $gProxyBackendsCount);

		$this->uProxy->clearFullCache(function ($userInterface) use ($progressBar) {
			$progressBar->advance();
		});
		$this->gProxy->clearFullCache(function ($groupInterface) use ($progressBar) {
			$progressBar->advance();
		});
		$progressBar->finish();
		return 0;
	}
}
