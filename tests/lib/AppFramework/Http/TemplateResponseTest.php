<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @copyright Copyright (c) 2012 Bernhard Posselt <dev@bernhard-posselt.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Test\AppFramework\Http;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\TemplateResponse;
use Test\TestCase;
use OC\AppFramework\Core\API;

/**
 * Class TemplateResponseTest
 *
 * @package Test\AppFramework\Http
 * @group DB
 */
class TemplateResponseTest extends TestCase {
	public function testSetParamsConstructor() {
		$params = ['hi' => 'yo'];
		$tpl = new TemplateResponse('app', 'home', $params);

		$this->assertEquals(['hi' => 'yo'], $tpl->getParams());
	}

	public function testSetRenderAsConstructor() {
		$renderAs = 'myrender';
		$tpl = new TemplateResponse('app', 'home', [], $renderAs);

		$this->assertEquals($renderAs, $tpl->getRenderAs());
	}

	public function testSetParams() {
		$params = ['hi' => 'yo'];
		$tpl = new TemplateResponse('app', 'home');
		$tpl->setParams($params);

		$this->assertEquals(['hi' => 'yo'], $tpl->getParams());
	}

	public function testGetTemplateName() {
		$tpl = new TemplateResponse('app', 'home');
		$this->assertEquals('home', $tpl->getTemplateName());
	}

	public function testGetRenderAs() {
		$render = 'myrender';
		$tpl = new TemplateResponse('app', 'home');
		$tpl->renderAs($render);
		$this->assertEquals($render, $tpl->getRenderAs());
	}

	public function testChainability() {
		$params = ['hi' => 'yo'];
		$tpl = new TemplateResponse('app', 'home');
		$tpl->setParams($params)
			->setStatus(Http::STATUS_NOT_FOUND);

		$this->assertEquals(Http::STATUS_NOT_FOUND, $tpl->getStatus());
		$this->assertEquals(['hi' => 'yo'], $tpl->getParams());
	}

	public function testRender() {
		$tpl = new TemplateResponse('core', '404', [], 'base');
		$data = $tpl->render();
		$this->assertContains('File not found', $data);
		$this->assertContains('The specified document has not been found on the server.', $data);
	}
}
