<?php
/**
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
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

namespace OC\Core\Command\User;

use InvalidArgumentException;
use OC\Files\Filesystem;
use OC\Files\ObjectStore\ObjectStoreStorage;
use OCP\IUser;
use OCP\IUserManager;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MoveHome extends Command {

	/**
	 * @var IUserManager
	 */
	private $userManager;

	public function __construct(
		IUserManager $userManager
	) {
		parent::__construct();
		$this->userManager = $userManager;
	}

	protected function configure() {
		$this->setName('user:move-home')
			->setDescription('Move a user\'s home folder to a new location.')
			->addArgument('user_id', InputArgument::REQUIRED, 'Id of the user whose home folder is to be moved. ')
			->addArgument('new_location', InputArgument::REQUIRED, 'Absolute path to the parent folder of the new location of the home folder.')
			;
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$user = $this->getUser($input);
		$userId = $user->getUID();
		$oldHome = $user->getHome();

		$storage = Filesystem::getStorage($userId);
		if ($storage->instanceOfStorage(ObjectStoreStorage::class)) {
			$output->writeln('<error>This command is not supported on an S3 primary object storage</error>');
			return 1;
		}

		$newLocation = $this->getNewLocationForUser($input, $user);
		$output->writeln("Move $userId from $oldHome to $newLocation");

		# disable user
		$output->writeln("Disabling user ....");
		$user->setEnabled(false);

		# copy files
		$output->writeln("Syncing files from $oldHome/ to $newLocation ...");
		$this->rsync($oldHome, $newLocation);

		# set new home folder
		$output->writeln("Updating user home path ....");
		$user->setHome($newLocation);

		# enable user
		$output->writeln("Enabling user ....");
		$user->setEnabled(true);

		# notify admin about necessary LDAP change
		$output->writeln('');
		$output->writeln("Files for user $userId have been moved to $newLocation");
		$output->writeln("In case you are using LDAP Home Folder please update the property in your LDAP directory for this user");
		$output->writeln('');

		$output->writeln('');
		$output->writeln("The old home folder can now be deleted (rm -rf $oldHome)");
		$output->writeln('');

		return 0;
	}

	protected function getUser(InputInterface $input): IUser {
		$userId = $input->getArgument('user_id');
		$user = $this->userManager->get($userId);
		if ($user === null) {
			throw new InvalidArgumentException('User is not known.');
		}

		return $user;
	}

	protected function getNewLocationForUser(InputInterface $input, IUser $user): string {
		$newLocation = $input->getArgument('new_location');
		if (!is_dir($newLocation)) {
			throw new InvalidArgumentException('New root location has to exist');
		}

		$oldHome = $user->getHome();
		if (!is_dir($oldHome)) {
			throw new InvalidArgumentException("Current user home $oldHome does not exist. Not mounted? Non local storage?");
		}
		$userFolder = basename($oldHome);
		$newLocation .= "/$userFolder";

		mkdir($newLocation);
		if ($this->is_dir_empty($newLocation) !== true) {
			throw new InvalidArgumentException("New user folder $newLocation is either not readable or not empty");
		}

		return realpath($newLocation);
	}

	private function is_dir_empty($dir): ?bool {
		if (!is_readable($dir)) {
			return null;
		}
		return (\count(scandir($dir)) === 2);
	}

	private function rsync(string $oldHome, string $newLocation): void {
		exec("rsync -aAX $oldHome/ $newLocation", $output, $return_var);
		if ($return_var !== 0) {
			throw new RuntimeException("Copying files failed: \n $output");
		}
	}
}
