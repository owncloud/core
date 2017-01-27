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

class RemoteWebDriver implements WebDriver, JavaScriptExecutor {
  /**
   * @var HttpCommandExecutor
   */
  protected $executor;
  /**
   * @var string
   */
  protected $sessionID;
  /**
   * @var RemoteMouse
   */
  protected $mouse;
  /**
   * @var RemoteKeyboard
   */
  protected $keyboard;
  /**
   * @var RemoteTouchScreen
   */
  protected $touch;
  /**
   * @var RemoteExecuteMethod
   */
  protected $executeMethod;

  protected function __construct() {}

  /**
   * Construct the RemoteWebDriver by a desired capabilities.
   *
   * @param string $url The url of the remote server
   * @param DesiredCapabilities $desired_capabilities The desired capabilities
   * @param int|null $connection_timeout_in_ms
   * @param int|null $request_timeout_in_ms
   * @return RemoteWebDriver
   */
  public static function create(
    $url = 'http://localhost:4444/wd/hub',
    $desired_capabilities = null,
    $connection_timeout_in_ms = null,
    $request_timeout_in_ms = null
  ) {
    $url = preg_replace('#/+$#', '', $url);

    // Passing DesiredCapabilities as $desired_capabilities is encourged but
    // array is also accepted for legacy reason.
    if ($desired_capabilities instanceof DesiredCapabilities) {
      $desired_capabilities = $desired_capabilities->toArray();
    }

    $executor = new HttpCommandExecutor($url);
    if ($connection_timeout_in_ms !== null) {
      $executor->setConnectionTimeout($connection_timeout_in_ms);
    }
    if ($request_timeout_in_ms !== null) {
      $executor->setRequestTimeout($request_timeout_in_ms);
    }

    $command = new WebDriverCommand(
      null,
      DriverCommand::NEW_SESSION,
      array('desiredCapabilities' => $desired_capabilities)
    );

    $response = $executor->execute($command);

    $driver = new static();
    $driver->setSessionID($response->getSessionID())
           ->setCommandExecutor($executor);
    return $driver;
  }

  /**
   * [Experimental] Construct the RemoteWebDriver by an existing session.
   *
   * This constructor can boost the performance a lot by reusing the same
   * browser for the whole test suite. You do not have to pass the desired
   * capabilities because the session was created before.
   *
   * @param string $url The url of the remote server
   * @param string $session_id The existing session id
   * @return RemoteWebDriver
   */
  public static function createBySessionID(
    $session_id,
    $url = 'http://localhost:4444/wd/hub'
  ) {
    $driver = new static();
    $driver->setSessionID($session_id)
           ->setCommandExecutor(new HttpCommandExecutor($url));
    return $driver;
  }

  /**
   * Close the current window.
   *
   * @return RemoteWebDriver The current instance.
   */
  public function close() {
    $this->execute(DriverCommand::CLOSE, array());

    return $this;
  }

  /**
   * Find the first WebDriverElement using the given mechanism.
   *
   * @param WebDriverBy $by
   * @return RemoteWebElement NoSuchElementException is thrown in
   *    HttpCommandExecutor if no element is found.
   * @see WebDriverBy
   */
  public function findElement(WebDriverBy $by) {
    $params = array('using' => $by->getMechanism(), 'value' => $by->getValue());
    $raw_element = $this->execute(
      DriverCommand::FIND_ELEMENT,
      $params
    );

    return $this->newElement($raw_element['ELEMENT']);
  }

  /**
   * Find all WebDriverElements within the current page using the given
   * mechanism.
   *
   * @param WebDriverBy $by
   * @return RemoteWebElement[] A list of all WebDriverElements, or an empty
   *    array if nothing matches
   * @see WebDriverBy
   */
  public function findElements(WebDriverBy $by) {
    $params = array('using' => $by->getMechanism(), 'value' => $by->getValue());
    $raw_elements = $this->execute(
      DriverCommand::FIND_ELEMENTS,
      $params
    );

    $elements = array();
    foreach ($raw_elements as $raw_element) {
      $elements[] = $this->newElement($raw_element['ELEMENT']);
    }
    return $elements;
  }

    /**
     * Load a new web page in the current browser window.
     *
     * @param string $url
     *
     * @return RemoteWebDriver The current instance.
     */
  public function get($url) {
    $params = array('url' => (string)$url);
    $this->execute(DriverCommand::GET, $params);

    return $this;
  }

  /**
   * Get a string representing the current URL that the browser is looking at.
   *
   * @return string The current URL.
   */
  public function getCurrentURL() {
    return $this->execute(DriverCommand::GET_CURRENT_URL);
  }

  /**
   * Get the source of the last loaded page.
   *
   * @return string The current page source.
   */
  public function getPageSource() {
    return $this->execute(DriverCommand::GET_PAGE_SOURCE);
  }

  /**
   * Get the title of the current page.
   *
   * @return string The title of the current page.
   */
  public function getTitle() {
    return $this->execute(DriverCommand::GET_TITLE);
  }

  /**
   * Return an opaque handle to this window that uniquely identifies it within
   * this driver instance.
   *
   * @return string The current window handle.
   */
  public function getWindowHandle() {
    return $this->execute(
      DriverCommand::GET_CURRENT_WINDOW_HANDLE,
      array()
    );
  }

  /**
   * Get all window handles available to the current session.
   *
   * @return array An array of string containing all available window handles.
   */
  public function getWindowHandles() {
    return $this->execute(DriverCommand::GET_WINDOW_HANDLES, array());
  }

  /**
   * Quits this driver, closing every associated window.
   *
   * @return void
   */
  public function quit() {
    $this->execute(DriverCommand::QUIT);
    $this->executor = null;
  }

  /**
   * Prepare arguments for JavaScript injection
   *
   * @param array $arguments
   * @return array
   */
  private function prepareScriptArguments(array $arguments) {
    $args = array();
    foreach ($arguments as $key => $value) {
      if ($value instanceof WebDriverElement) {
        $args[$key] = array('ELEMENT'=>$value->getID());
      } else {
        if (is_array($value)) {
          $value = $this->prepareScriptArguments($value);
        }
        $args[$key] = $value;
      }
    }
    return $args;
  }

  /**
   * Inject a snippet of JavaScript into the page for execution in the context
   * of the currently selected frame. The executed script is assumed to be
   * synchronous and the result of evaluating the script will be returned.
   *
   * @param string $script The script to inject.
   * @param array $arguments The arguments of the script.
   * @return mixed The return value of the script.
   */
  public function executeScript($script, array $arguments = array()) {
    $params = array(
      'script' => $script,
      'args' => $this->prepareScriptArguments($arguments),
    );
    return $this->execute(DriverCommand::EXECUTE_SCRIPT, $params);
  }

  /**
   * Inject a snippet of JavaScript into the page for asynchronous execution in
   * the context of the currently selected frame.
   *
   * The driver will pass a callback as the last argument to the snippet, and
   * block until the callback is invoked.
   *
   * @see WebDriverExecuteAsyncScriptTestCase
   *
   * @param string $script The script to inject.
   * @param array $arguments The arguments of the script.
   * @return mixed The value passed by the script to the callback.
   */
  public function executeAsyncScript($script, array $arguments = array()) {
    $params = array(
      'script' => $script,
      'args' => $this->prepareScriptArguments($arguments),
    );
    return $this->execute(
      DriverCommand::EXECUTE_ASYNC_SCRIPT,
      $params
    );
  }

  /**
   * Take a screenshot of the current page.
   *
   * @param string $save_as The path of the screenshot to be saved.
   * @return string The screenshot in PNG format.
   */
  public function takeScreenshot($save_as = null) {
    $screenshot = base64_decode(
      $this->execute(DriverCommand::SCREENSHOT)
    );
    if ($save_as) {
      file_put_contents($save_as, $screenshot);
    }
    return $screenshot;
  }

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
   *
   * @return WebDriverWait
   */
  public function wait(
      $timeout_in_second = 30,
      $interval_in_millisecond = 250) {
    return new WebDriverWait(
      $this, $timeout_in_second, $interval_in_millisecond
    );
  }

  /**
   * An abstraction for managing stuff you would do in a browser menu. For
   * example, adding and deleting cookies.
   *
   * @return WebDriverOptions
   */
  public function manage() {
    return new WebDriverOptions($this->getExecuteMethod());
  }

  /**
   * An abstraction allowing the driver to access the browser's history and to
   * navigate to a given URL.
   *
   * @return WebDriverNavigation
   * @see WebDriverNavigation
   */
  public function navigate() {
    return new WebDriverNavigation($this->getExecuteMethod());
  }

  /**
   * Switch to a different window or frame.
   *
   * @return RemoteTargetLocator
   * @see RemoteTargetLocator
   */
  public function switchTo() {
    return new RemoteTargetLocator($this->getExecuteMethod(), $this);
  }

  /**
   * @return RemoteMouse
   */
  public function getMouse() {
    if (!$this->mouse) {
      $this->mouse = new RemoteMouse($this->getExecuteMethod());
    }
    return $this->mouse;
  }

  /**
   * @return RemoteKeyboard
   */
  public function getKeyboard() {
    if (!$this->keyboard) {
      $this->keyboard = new RemoteKeyboard($this->getExecuteMethod());
    }
    return $this->keyboard;
  }

  /**
   * @return RemoteTouchScreen
   */
  public function getTouch() {
    if (!$this->touch) {
      $this->touch = new RemoteTouchScreen($this->getExecuteMethod());
    }
    return $this->touch;
  }

  protected function getExecuteMethod() {
    if (!$this->executeMethod) {
      $this->executeMethod = new RemoteExecuteMethod($this);
    }
    return $this->executeMethod;
  }

  /**
   * Construct a new action builder.
   *
   * @return WebDriverActions
   */
  public function action() {
    return new WebDriverActions($this);
  }

  /**
   * Return the WebDriverElement with the given id.
   *
   * @param string $id The id of the element to be created.
   * @return RemoteWebElement
   */
  private function newElement($id) {
    return new RemoteWebElement($this->getExecuteMethod(), $id);
  }

  /**
   * Set the command executor of this RemoteWebdriver
   *
   * @param WebDriverCommandExecutor $executor
   * @return RemoteWebDriver
   */
  public function setCommandExecutor(WebDriverCommandExecutor $executor) {
    $this->executor = $executor;
    return $this;
  }

  /**
   * Set the command executor of this RemoteWebdriver
   *
   * @return HttpCommandExecutor
   */
  public function getCommandExecutor() {
    return $this->executor;
  }

  /**
   * Set the session id of the RemoteWebDriver.
   *
   * @param string $session_id
   * @return RemoteWebDriver
   */
  public function setSessionID($session_id) {
    $this->sessionID = $session_id;
    return $this;
  }

  /**
   * Get current selenium sessionID
   *
   * @return string sessionID
   */
  public function getSessionID() {
    return $this->sessionID;
  }

  /**
   * Get all selenium sessions.
   *
   * @param string $url The url of the remote server
   * @param int $timeout_in_ms
   * @return array
   */
  public static function getAllSessions(
    $url = 'http://localhost:4444/wd/hub',
    $timeout_in_ms = 30000
  ) {
    $executor = new HttpCommandExecutor($url);
    $executor->setConnectionTimeout($timeout_in_ms);

    $command = new WebDriverCommand(
      null,
      DriverCommand::GET_ALL_SESSIONS,
      array()
    );

    return $executor->execute($command)->getValue();
  }

  public function execute($command_name, $params = array()) {
    $command = new WebDriverCommand(
      $this->sessionID,
      $command_name,
      $params
    );

    $response = $this->executor->execute($command);
    return $response->getValue();
  }
}
