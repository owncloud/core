<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//   http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * An abstraction allowing the driver to manipulate the javascript alerts
 */
class WebDriverAlert {

  protected $executor;

  public function __construct($executor) {
    $this->executor = $executor;
  }

  /**
   * Accept alert
   *
   * @return WebDriverAlert The instance.
   */
  public function accept() {
    $this->executor->execute(DriverCommand::ACCEPT_ALERT);
    return $this;
  }

  /**
   * Dismiss alert
   *
   * @return WebDriverAlert The instance.
   */
  public function dismiss() {
    $this->executor->execute(DriverCommand::DISMISS_ALERT);
    return $this;
  }

  /**
   * Get alert text
   *
   * @return string
   */
  public function getText() {
    return $this->executor->execute(DriverCommand::GET_ALERT_TEXT);
  }

  /**
   * Send keystrokes to javascript prompt() dialog
   *
   * @param string $value
   * @return WebDriverAlert
   */
  public function sendKeys($value) {
    $this->executor->execute(
      DriverCommand::SET_ALERT_VALUE,
      array('text' => $value)
    );
    return $this;
  }

}
