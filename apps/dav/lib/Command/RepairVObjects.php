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
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Question\Question;

class RepairVObjects extends Command {
	/** @var IUserManager */
	protected $userManager;

	/** @var CardDavBackend */
	private $cardDavBackend;

	/** @var CalDavBackend */
	private $calDavBackend;

	/** @var boolean */
	private $changes;

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
				$helper = $this->getHelper('question');
				$addressbooks = $this->cardDavBackend->getAddressBooksForUser("principals/users/$user");
				foreach ($addressbooks as $addressbook) {
					$cards = $this->cardDavBackend->getCards($addressbook['id']);
					foreach ($cards as $card) {
						$vcard = $this->repair(VObject\Reader::read($card['carddata']), $input, $output);
						if($this->changes) {
							$question = new ConfirmationQuestion('Shall the change be written in the database? ', false);
							if ($helper->ask($input, $output, $question)) {
								$this->cardDavBackend->updateCard($addressbook['id'], $vcard->UID.'.vcf', $vcard->serialize());
							}
						}
					}
				}
				$calendars = $this->calDavBackend->getCalendarsForUser("principals/users/$user");
				foreach ($calendars as $calendar) {
					$calendarobjects = $this->calDavBackend->getCalendarObjects($calendar['id']);
					foreach ($calendarobjects as $calendarobject) {
						$vcalendar = $this->repair(VObject\Reader::read($this->calDavBackend->getCalendarObject($calendar['id'],
							$calendarobject['uri'])['calendardata']), $input, $output);
						if($this->changes) {
							$question = new ConfirmationQuestion('Shall the change be written in the database? ', false);
							if ($helper->ask($input, $output, $question)) {
								$this->calDavBackend->updateCalendarObject($calendarobject['calendarid'],
									$calendarobject['uri'], $vcalendar->serialize());
							}
						}
					}
				}
			}
		}
	}

	/**
	 * @param VObject\Component $vobject
	 * @param InputInterface $input
	 * @param OutputInterface $output
	 *
	 * @return VObject\Component
	 *
 	 * Level 1 -> Error occurred and has automatically be repaired
 	 * Level 3 -> Error occurred and could not automatically be repaired
 	*/
	function repair(VObject\Component $vobject, InputInterface $input, OutputInterface $output) {
		$validations = $vobject->validate(VObject\Node::REPAIR);
		$this->changes = false;
		foreach ($validations as $validation) {
			if (!empty($validation)) {
				$helper = $this->getHelper('question');
				if ($validation['level'] === 3) {
					$output->writeln($validation['node']->name . ': ' . $validation['message']);
					//Ask user if he wants to change the value
					$question = new ConfirmationQuestion('Do you want to change the invalid value manually? ', false);
					if ($helper->ask($input, $output, $question)) {
						do {
							$question = new Question('Please enter a correct value: ');
							$newValue = $helper->ask($input, $output, $question);
							if ($vobject->name == 'VCARD') {
								$vobject->{$validation['node']->name} = $newValue;
							}
							else if ($vobject->name == 'VCALENDAR') {
								if(property_exists($vobject->{$validation['node']->name})) {
									$vobject->{$validation['node']->name} = $newValue;
								}
								else if(property_exists($vobject->VEVENT->{$validation['node']->name})){
									$vobject->VEVENT->{$validation['node']->name} = $newValue;
								}
								else if(property_exists($vobject->VTODO->{$validation['node']->name})) {
									$vobject->VTODO->{$validation['node']->name} = $newValue;
								}
							}

							$output->writeln(print_r($validations));
						} while ($vobject->validate() != null);
						$this->changes = true;
					}
				}
				else if ($validation['level'] === 1) {
					$output->writeln($validation['node']->name . ': ' . $validation['message']);
					$this->changes = true;
				}
			}
		}

		return $vobject;
	}
}