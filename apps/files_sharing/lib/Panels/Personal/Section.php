<?php
/**
 * @author Semih Serhat Karakaya <karakayasemi@itu.edu.tr>
 *
 * @copyright Copyright (c) 2019, ownCloud GmbH
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
namespace OCA\Files_Sharing\Panels\Personal;

use OCP\IL10N;
use OCP\Settings\ISection;

class Section implements ISection {
	/** @var IL10N  $l*/
	protected $l;

	public function __construct(IL10N $l) {
		$this->l = $l;
	}

	public function getPriority() {
		return 40;
	}

	public function getIconName() {
		return 'shared';
	}

	public function getID() {
		return 'sharing';
	}

	public function getName() {
		return $this->l->t('Sharing');
	}
}
