<?php
/**
 * @author Julian Müller <julimueller1998@gmail.com>
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
namespace OCA\DAV\Command;

use Sabre\VObject;
use OCA\DAV\CalDAV\CalDavBackend;
use OCA\DAV\CardDAV\CardDavBackend;
use OCP\IUserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RepairVObjects extends Command {
	/** @var IUserManager */
	protected $userManager;

	/** @var CardDavBackend */
	private $cardDavBackend;

	/** @var CalDavBackend */
	private $calDavBackend;

	/**
	 * @param IUserManager $userManager
	 * @param CardDavBackend $cardDavBackend
	 * @param CalDavBackend $calDavBackend
	 */
	function __construct(IUserManager $userManager, CardDavBackend $cardDavBackend,
						 CalDavBackend $calDavBackend) {
		parent::__construct();
		$this->userManager = $userManager;
		$this->cardDavBackend = $cardDavBackend;
		$this->calDavBackend = $calDavBackend;
	}

	protected function configure() {
		$this
			->setName('dav:repair-vobjects')
			->setDescription('Repairs vObjects if necessary')
			->addArgument('user', InputArgument::IS_ARRAY,
				'Users whose vObjects should be repaired');
	}

	protected function execute(InputInterface $input, OutputInterface $output) {
		$users = $input->getArgument('user');
		foreach ($users as $user) {
			if (!$this->userManager->userExists($user)) {
				throw new \InvalidArgumentException("User <$user> in unknown.");
			}
		}

		if(!empty($users)) {
			foreach ($users as $user) {
				$addressbooks = $this->cardDavBackend->getAddressBooksForUser("principals/users/$user");
				foreach ($addressbooks as $addressbook) {
					$cards = $this->cardDavBackend->getCards($addressbook['id']);
					foreach ($cards as $card) {
						VObject\Reader::read($card['carddata'])->validate(VObject\Node::REPAIR);
					}
				}

				$calendars = $this->calDavBackend->getCalendarsForUser("principals/users/$user");
				foreach ($calendars as $calendar) {
					$calendarobjects = $this->calDavBackend->getCalendarObjects($calendar['id']);
					$uris = [];
					foreach ($calendarobjects as $calendarobject) {
						VObject\Reader::read($this->calDavBackend->getCalendarObject($calendar['id'],
							$calendarobject['uri'])['calendardata'])->validate(VObject\Node::REPAIR);
					}
				}
			}
		}
	}
}
