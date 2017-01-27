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

class EventFiringWebDriver implements WebDriver, JavaScriptExecutor {

  /**
   * @var WebDriver
   */
  protected $driver;

  /**
   * @var WebDriverDispatcher
   */
  protected $dispatcher;

  /**
   * @param WebDriver $driver
   * @param WebDriverDispatcher $dispatcher
   */
  public function __construct(WebDriver $driver,
                              WebDriverDispatcher $dispatcher = null) {
    $this->dispatcher = $dispatcher ?: new WebDriverDispatcher();
    if (!$this->dispatcher->getDefaultDriver()) {
      $this->dispatcher->setDefaultDriver($this);
    }
    $this->driver = $driver;
    return $this;
  }

  /**
   * @return WebDriverDispatcher
   */
  public function getDispatcher() {
    return $this->dispatcher;
  }

  /**
   * @param mixed $method
   * @return void
   */
  protected function dispatch($method) {
    if (!$this->dispatcher) {
      return;
    }

    $arguments = func_get_args();
    unset($arguments[0]);
    $this->dispatcher->dispatch($method, $arguments);
  }

  /**
   * @return WebDriver
   */
  public function getWebDriver() {
    return $this->driver;
  }

  /**
   * @param WebDriverElement $element
   * @return EventFiringWebElement
   */
  private function newElement(WebDriverElement $element) {
    return new EventFiringWebElement($element, $this->getDispatcher());
  }

  /**
   * @param mixed $url
   * @return $this
   * @throws WebDriverException
   */
  public function get($url) {
    $this->dispatch('beforeNavigateTo', $url, $this);
    try {
      $this->driver->get($url);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterNavigateTo', $url, $this);
    return $this;
  }

  /**
   * @param WebDriverBy $by
   * @return array
   * @throws WebDriverException
   */
  public function findElements(WebDriverBy $by) {
    $this->dispatch('beforeFindBy', $by, null, $this);
    try {
      $elements = array();
      foreach ($this->driver->findElements($by) as $element) {
        $elements[] = $this->newElement($element);
      }
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterFindBy', $by, null, $this);
    return $elements;

  }

  /**
   * @param WebDriverBy $by
   * @return EventFiringWebElement
   * @throws WebDriverException
   */
  public function findElement(WebDriverBy $by) {
    $this->dispatch('beforeFindBy', $by, null, $this);
    try {
      $element = $this->newElement($this->driver->findElement($by));
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterFindBy', $by, null, $this);
    return $element;
  }

  /**
   * @param       $script
   * @param array $arguments
   * @return mixed
   * @throws WebDriverException
   */
  public function executeScript($script, array $arguments = array()) {
    if (!$this->driver instanceof JavaScriptExecutor) {
      throw new UnsupportedOperationException(
        'driver does not implement JavaScriptExecutor'
      );
    }

    $this->dispatch('beforeScript', $script, $this);
    try {
      $result = $this->driver->executeScript($script, $arguments);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterScript', $script, $this);
    return $result;
  }

  /**
   * @param       $script
   * @param array $arguments
   * @return mixed
   * @throws WebDriverException
   */
  public function executeAsyncScript($script, array $arguments = array()) {
    if (!$this->driver instanceof JavaScriptExecutor) {
      throw new UnsupportedOperationException(
        'driver does not implement JavaScriptExecutor'
      );
    }

    $this->dispatch('beforeScript', $script, $this);
    try {
      $result = $this->driver->executeAsyncScript($script, $arguments);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
    $this->dispatch('afterScript', $script, $this);
    return $result;
  }

  /**
   * @return $this
   * @throws WebDriverException
   */
  public function close() {
    try {
      $this->driver->close();
      return $this;
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getCurrentURL() {
    try {
      return $this->driver->getCurrentURL();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getPageSource() {
    try {
      return $this->driver->getPageSource();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getTitle() {
    try {
      return $this->driver->getTitle();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return string
   * @throws WebDriverException
   */
  public function getWindowHandle() {
    try {
      return $this->driver->getWindowHandle();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return array
   * @throws WebDriverException
   */
  public function getWindowHandles() {
    try {
      return $this->driver->getWindowHandles();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @throws WebDriverException
   */
  public function quit() {
    try {
      $this->driver->quit();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @param null|string $save_as
   * @return string
   * @throws WebDriverException
   */
  public function takeScreenshot($save_as = null) {
    try {
      return $this->driver->takeScreenshot($save_as);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @param int $timeout_in_second
   * @param int $interval_in_millisecond
   * @return WebDriverWait
   * @throws WebDriverException
   */
  public function wait($timeout_in_second = 30,
                       $interval_in_millisecond = 250) {
    try {
      return $this->driver->wait($timeout_in_second, $interval_in_millisecond);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return WebDriverOptions
   * @throws WebDriverException
   */
  public function manage() {
    try {
      return $this->driver->manage();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return EventFiringWebDriverNavigation
   * @throws WebDriverException
   */
  public function navigate() {
    try {
      return new EventFiringWebDriverNavigation(
        $this->driver->navigate(),
        $this->getDispatcher()
      );
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return WebDriverTargetLocator
   * @throws WebDriverException
   */
  public function switchTo() {
    try {
      return $this->driver->switchTo();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  /**
   * @return WebDriverTouchScreen
   * @throws WebDriverException
   */
  public function getTouch() {
    try {
      return $this->driver->getTouch();
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }

  private function dispatchOnException($exception) {
    $this->dispatch('onException', $exception, $this);
    throw $exception;
  }

  public function execute($name, $params) {
    try {
      return $this->driver->execute($name, $params);
    } catch (WebDriverException $exception) {
      $this->dispatchOnException($exception);
    }
  }
}
