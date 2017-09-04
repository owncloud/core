<?php
/**
 * @author Jörn Friedrich Dreyer <jfd@butonic.de>
 *
 * @copyright Copyright (c) 2017, ownCloud GmbH
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

namespace OC\Core\Command\Security;

use OC\Core\Command\Base;
use OC\Route\Router;
use OCP\ICertificate;
use OCP\Route\IRouter;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListRoutes extends Base {

	/**
	 * @var Router
	 */
	protected $router;

	public function __construct(IRouter $router) {
		$this->router = $router;
		parent::__construct();
	}

	protected function configure() {
		$this
			->setName('security:routes')
			->setDescription('list used routes');
		parent::configure();
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$outputType = $input->getOption('output');

		\OC_App::loadApps();
		$this->router->loadRoutes();

		$rows = [];

		foreach ($this->router->getCollections() as $routeCollection) {
			foreach ($routeCollection as $route) {
				$path = $route->getPath();
				if (isset($rows[$path])) {
					$rows[$path]['methods'] = array_unique(array_merge($rows[$path]['methods'], $route->getMethods()));
				} else {
					$rows[$path] = [
						'path' => $path,
						'methods' => $route->getMethods()
					];
				}
				sort ($rows[$path]['methods']);
			}
		}

		usort($rows, function ($a, $b) {
			return strcmp($a['path'], $b['path']);
		});

		if ($outputType === self::OUTPUT_FORMAT_JSON ) {
			$output->write(json_encode($rows));
		} else if ($outputType === self::OUTPUT_FORMAT_JSON_PRETTY) {
			$output->writeln(json_encode($rows, JSON_PRETTY_PRINT));
		} else {
			$table = new Table($output);
			$table->setHeaders([
				'Path',
				'Methods',
			]);

			foreach ($rows as $row) {
				$table->addRow([$row['path'], join(',', $row['methods'])]);
			}
			$table->render();
		}
	}
}
