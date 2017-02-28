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

class WebDriverResponse {

  /**
   * @var int
   */
  private $status;

  /**
   * @var mixed
   */
  private $value;

  /**
   * @var string
   */
  private $sessionID;

  /**
   * @param null|string $session_id
   */
  public function __construct($session_id = null) {
    $this->sessionID = $session_id;
  }

  /**
   * @return null|int
   */
  public function getStatus() {
    return $this->status;
  }

  /**
   * @param int $status
   * @return WebDriverResponse
   */
  public function setStatus($status) {
    $this->status = $status;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * @param mixed $value
   * @return WebDriverResponse
   */
  public function setValue($value) {
    $this->value = $value;
    return $this;
  }

  /**
   * @return null|string
   */
  public function getSessionID() {
    return $this->sessionID;
  }

  /**
   * @param mixed $session_id
   * @return WebDriverResponse
   */
  public function setSessionID($session_id) {
    $this->sessionID = $session_id;
    return $this;
  }
}
