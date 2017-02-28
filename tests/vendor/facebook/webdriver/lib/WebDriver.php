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
 * The interface for WebDriver.
 */
interface WebDriver extends WebDriverSearchContext {

  /**
   * Close the current window.
   *
   * @return WebDriver The current instance.
   */
  public function close();

  /**
   * Load a new web page in the current browser window.
   *
   * @param string $url
   * @return WebDriver The current instance.
   */
  public function get($url);

  /**
   * Get a string representing the current URL that the browser is looking at.
   *
   * @return string The current URL.
   */
  public function getCurrentURL();

  /**
   * Get the source of the last loaded page.
   *
   * @return string The current page source.
   */
  public function getPageSource();

  /**
   * Get the title of the current page.
   *
   * @return string The title of the current page.
   */
  public function getTitle();

  /**
   * Return an opaque handle to this window that uniquely identifies it within
   * this driver instance.
   *
   * @return string The current window handle.
   */
  public function getWindowHandle();

  /**
   * Get all window handles available to the current session.
   *
   * @return array An array of string containing all available window handles.
   */
  public function getWindowHandles();

  /**
   * Quits this driver, closing every associated window.
   *
   * @return void
   */
  public function quit();

  /**
   * Take a screenshot of the current page.
   *
   * @param string $save_as The path of the screenshot to be saved.
   * @return string The screenshot in PNG format.
   */
  public function takeScreenshot($save_as = null);

  /**
   * Construct a new WebDriverWait by the current WebDriver instance.
   * Sample usage:
   *
   *   $driver->wait(20, 1000)->until(
   *     WebDriverExpectedCondition::titleIs('WebDriver Page')
   *   );
   *
   * @param int $timeout_in_second
   * @param int $interval_in_millisecond
   * @return WebDriverWait
   */
  public function wait(
      $timeout_in_second = 30,
      $interval_in_millisecond = 250);

  /**
   * An abstraction for managing stuff you would do in a browser menu. For
   * example, adding and deleting cookies.
   *
   * @return WebDriverOptions
   */
  public function manage();

  /**
   * An abstraction allowing the driver to access the browser's history and to
   * navigate to a given URL.
   *
   * @return WebDriverNavigation
   * @see WebDriverNavigation
   */
  public function navigate();

  /**
   * Switch to a different window or frame.
   *
   * @return WebDriverTargetLocator
   * @see WebDriverTargetLocator
   */
  public function switchTo();

  /**
   * @param string $name
   * @param array $params
   * @return mixed
   */
  public function execute($name, $params);
}
