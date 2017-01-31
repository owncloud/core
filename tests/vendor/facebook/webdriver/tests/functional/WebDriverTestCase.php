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

/**
 * The base class for test cases.
 */
class WebDriverTestCase extends PHPUnit_Framework_TestCase {

  /** @var RemoteWebDriver $driver */
  protected $driver;

  protected function setUp() {
    $this->driver = RemoteWebDriver::create(
      'http://localhost:4444/wd/hub',
      array(
        WebDriverCapabilityType::BROWSER_NAME
          //=> WebDriverBrowserType::FIREFOX,
          => WebDriverBrowserType::HTMLUNIT,
      )
    );
  }
  
  protected function tearDown() {
    $this->driver->quit();
  }

  /**
   * Get the URL of the test html.
   *
   * @param $path
   * @return string
   */
  protected function getTestPath($path) {
    return 'file:///'.dirname(__FILE__).'/html/'.$path;
  }
}
