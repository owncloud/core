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
 * A HttpCommandExecutor that talks to a local driver service instead of
 * a remote server.
 */
class DriverCommandExecutor extends HttpCommandExecutor {

  /**
   * @var DriverService
   */
  private $service;

  public function __construct(DriverService $service) {
    parent::__construct($service->getURL());
    $this->service = $service;
  }

  /**
   * @param WebDriverCommand $command
   * @param array $curl_opts
   *
   * @return mixed
   */
  public function execute(WebDriverCommand $command, $curl_opts = array()) {
    if ($command->getName() === DriverCommand::NEW_SESSION) {
      $this->service->start();
    }

    try {
      $value = parent::execute($command, $curl_opts);
      if ($command->getName() === DriverCommand::QUIT) {
        $this->service->stop();
      }
      return $value;
    } catch (Exception $e) {
      if (!$this->service->isRunning()) {
        throw new WebDriverException('The driver server has died.');
      }
      throw $e;
    }
  }

}
