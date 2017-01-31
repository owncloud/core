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

interface WebDriverEventListener {

  /**
   * @param string               $url
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function beforeNavigateTo($url, EventFiringWebDriver $driver);

  /**
   * @param string               $url
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function afterNavigateTo($url, EventFiringWebDriver $driver);

  /**
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function beforeNavigateBack(EventFiringWebDriver $driver);

  /**
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function afterNavigateBack(EventFiringWebDriver $driver);

  /**
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function beforeNavigateForward(EventFiringWebDriver $driver);

  /**
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function afterNavigateForward(EventFiringWebDriver $driver);

  /**
   * @param WebDriverBy          $by
   * @param EventFiringWebElement|null $element
   * @param EventFiringWebDriver  $driver
   * @return void
   */
  public function beforeFindBy(WebDriverBy $by,
                               $element,
                               EventFiringWebDriver $driver);

  /**
   * @param WebDriverBy           $by
   * @param EventFiringWebElement|null $element
   * @param EventFiringWebDriver  $driver
   * @return void
   */
  public function afterFindBy(WebDriverBy $by,
                              $element,
                              EventFiringWebDriver $driver);

  /**
   * @param string               $script
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function beforeScript($script, EventFiringWebDriver $driver);

  /**
   * @param string               $script
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function afterScript($script, EventFiringWebDriver $driver);

  /**
   * @param EventFiringWebElement $element
   * @return void
   */
  public function beforeClickOn(EventFiringWebElement $element);

  /**
   * @param EventFiringWebElement $element
   * @return void
   */
  public function afterClickOn(EventFiringWebElement $element);

  /**
   * @param EventFiringWebElement $element
   * @return void
   */
  public function beforeChangeValueOf(EventFiringWebElement $element);

  /**
   * @param EventFiringWebElement $element
   * @return void
   */
  public function afterChangeValueOf(EventFiringWebElement $element);

  /**
   * @param WebDriverException   $exception
   * @param EventFiringWebDriver $driver
   * @return void
   */
  public function onException(WebDriverException $exception,
                              EventFiringWebDriver $driver = null);

}
