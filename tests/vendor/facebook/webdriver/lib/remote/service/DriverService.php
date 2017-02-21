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

class DriverService {

  /**
   * @var string
   */
  private $executable;

  /**
   * @var string
   */
  private $url;

  /**
   * @var array
   */
  private $args;

  /**
   * @var array
   */
  private $environment;

  /**
   * @var resource
   */
  private $process;

  /**
   * @param string $executable
   * @param int $port The given port the service should use.
   * @param array $args
   * @param array|null $environment Use the system environment if it is null
   */
  public function __construct(
    $executable,
    $port,
    $args = array(),
    $environment = null
  ) {
    $this->executable = self::checkExecutable($executable);
    $this->url = sprintf('http://localhost:%d', $port);
    $this->args = $args;
    $this->environment = $environment ?: $_ENV;
  }

  /**
   * @return string
   */
  public function getURL() {
    return $this->url;
  }

  /**
   * @return DriverService
   */
  public function start() {
    if ($this->process !== null) {
      return $this;
    }

    $pipes = array();
    $this->process = proc_open(
      sprintf("%s %s", $this->executable, implode(' ', $this->args)),
      $descriptorspec = array(
        0 => array('pipe', 'r'), // stdin
        1 => array('pipe', 'w'), // stdout
        2 => array('pipe', 'a'), // stderr
      ),
      $pipes,
      null,
      $this->environment
    );

    $checker = new URLChecker();
    $checker->waitUntilAvailable(20 * 1000, $this->url.'/status');

    return $this;
  }

  /**
   * @return DriverService
   */
  public function stop() {
    if ($this->process === null) {
      return $this;
    }

    proc_terminate($this->process);
    $this->process = null;

    $checker = new URLChecker();
    $checker->waitUntilUnAvailable(3 * 1000, $this->url.'/shutdown');

    return $this;
  }

  /**
   * @return bool
   */
  public function isRunning() {
    if ($this->process === null) {
      return false;
    }

    $status = proc_get_status($this->process);
    return $status['running'];
  }

  /**
   * Check if the executable is executable.
   *
   * @param string $executable
   * @return string
   * @throws Exception
   */
  protected static function checkExecutable($executable) {
    if (!is_file($executable)) {
      throw new Exception("'$executable' is not a file.");
    }

    if (!is_executable($executable)) {
      throw new Exception("'$executable' is not executable.");
    }

    return $executable;
  }
}
