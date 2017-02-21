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

class ChromeDriver extends RemoteWebDriver {

  public static function start(
    DesiredCapabilities $desired_capabilities = null,
    ChromeDriverService $service = null
  ) {
    if ($desired_capabilities === null) {
      $desired_capabilities = DesiredCapabilities::chrome();
    }
    if ($service === null) {
      $service = ChromeDriverService::createDefaultService();
    }
    $executor = new DriverCommandExecutor($service);
    $driver = new static();
    $driver->setCommandExecutor($executor)
           ->startSession($desired_capabilities);
    return $driver;
  }

  public function startSession($desired_capabilities) {
    $command = new WebDriverCommand(
      null,
      DriverCommand::NEW_SESSION,
      array(
        'desiredCapabilities' => $desired_capabilities->toArray(),
      )
    );
    $response = $this->executor->execute($command);
    $this->setSessionID($response->getSessionID());
  }

  /**
   * @param string $url The url of the remote server
   * @param DesiredCapabilities $desired_capabilities The desired capabilities
   * @param int|null $connection_timeout_in_ms
   * @param int|null $request_timeout_in_ms
   */
  public static function create(
    $url = 'http://localhost:4444/wd/hub',
    $desired_capabilities = null,
    $timeout_in_ms = null,
    $request_timeout_in_ms = null
  ) {
    throw new WebDriverException('Please use ChromeDriver::start() instead.');
  }

  public static function createBySessionID(
    $session_id,
    $url = 'http://localhost:4444/wd/hub'
  ) {
    throw new WebDriverException('Please use ChromeDriver::start() instead.');
  }
}
