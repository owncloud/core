<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

class BaseTest extends WebDriverTestCase {
  
  public function testGetTitle() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'php-webdriver test page',
      $this->driver->getTitle()
    );
  }
  
  public function testGetText() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Welcome to the facebook/php-webdriver testing page.',
      $this->driver->findElement(WebDriverBy::id('welcome'))->getText()
    );
  }

  public function testGetById() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Test by ID',
      $this->driver->findElement(WebDriverBy::id('id_test'))->getText()
    );
  }

  public function testGetByClassName() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Test by Class',
      $this->driver->findElement(WebDriverBy::className('test_class'))->getText()
    );
  }

  public function testGetByCssSelector() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
     'Test by Class',
     $this->driver->findElement(WebDriverBy::cssSelector('.test_class'))->getText()
    );
  }

  public function testGetByLinkText() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Click here',
      $this->driver->findElement(WebDriverBy::linkText('Click here'))->getText()
    );
  }

  public function testGetByName() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Test Value',
      $this->driver->findElement(WebDriverBy::name('test_name'))->getAttribute('value')
    );
  }

  public function testGetByXpath() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Test Value',
      $this->driver->findElement(WebDriverBy::xpath('//input[@name="test_name"]'))->getAttribute('value')
    );
  }

  public function testGetByPartialLinkText() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Click here',
      $this->driver->findElement(WebDriverBy::partialLinkText('Click'))->getText()
    );
  }

  public function testGetByTagName() {
    $this->driver->get($this->getTestPath('index.html'));
    self::assertEquals(
      'Test Value',
      $this->driver->findElement(WebDriverBy::tagName('input'))->getAttribute('value')
    );
  }
}