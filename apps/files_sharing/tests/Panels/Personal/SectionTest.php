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
namespace OCA\Files_Sharing\Tests\Panels\Personal;

use OCA\Files_Sharing\Panels\Personal\Section;
use OCP\IL10N;

class SectionTest extends \Test\TestCase {

	/** @var IL10N | \PHPUnit\Framework\MockObject\MockObject $l */
	private $l;

	/** @var Section $section */
	private $section;

	protected function setUp() {
		$this->l = $this->getMockBuilder(IL10N::class)
			->disableOriginalConstructor()
			->getMock();

		$this->section = new Section($this->l);
	}

	public function testGetPriority() {
		$this->assertEquals(40, $this->section->getPriority());
	}

	public function testGetIconName() {
		$this->assertEquals('share', $this->section->getIconName());
	}

	public function testGetID() {
		$this->assertEquals('sharing', $this->section->getID());
	}

	public function testGetName() {
		$this->l->expects($this->once())->method('t')->willReturn('Sharing');
		$this->assertEquals('Sharing', $this->section->getName());
	}
}
