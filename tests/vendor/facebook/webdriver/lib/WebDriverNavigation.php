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
 * An abstraction allowing the driver to access the browser's history and to
 * navigate to a given URL.
 *
 * Note that they are all blocking functions until the page is loaded by
 * by default. It could be overridden by 'webdriver.load.strategy' in the
 * FirefoxProfile preferences.
 * https://code.google.com/p/selenium/wiki/DesiredCapabilities#settings
 */
class WebDriverNavigation {

  protected $executor;

  public function __construct(ExecuteMethod $executor) {
    $this->executor = $executor;
  }

  /**
   * Move back a single entry in the browser's history, if possible.
   *
   * @return WebDriverNavigation The instance.
   */
  public function back() {
    $this->executor->execute(DriverCommand::GO_BACK);
    return $this;
  }

  /**
   * Move forward a single entry in the browser's history, if possible.
   *
   * @return WebDriverNavigation The instance.
   */
  public function forward() {
    $this->executor->execute(DriverCommand::GO_FORWARD);
    return $this;
  }

  /**
   * Refresh the current page.
   *
   * @return WebDriverNavigation The instance.
   */
  public function refresh() {
    $this->executor->execute(DriverCommand::REFRESH);
    return $this;
  }

  /**
   * Navigate to the given URL.
   *
   * @param string $url
   * @return WebDriverNavigation The instance.
   */
  public function to($url) {
    $params = array('url' => (string)$url);
    $this->executor->execute(DriverCommand::GET, $params);
    return $this;
  }
}
