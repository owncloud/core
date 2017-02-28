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
 * A utility class, designed to help the user to wait until a condition turns
 * true.
 *
 * @see WebDriverExpectedCondition.
 */
class WebDriverWait {

  protected $driver;
  protected $timeout;
  protected $interval;

  public function __construct(
      WebDriver $driver,
      $timeout_in_second = null,
      $interval_in_millisecond = null) {
    $this->driver = $driver;
    $this->timeout = $timeout_in_second ?: 30;
    $this->interval = $interval_in_millisecond ?: 250;
  }

  /**
   * Calls the function provided with the driver as an argument until the return
   * value is not falsey.
   *
   * @param (closure|WebDriverExpectedCondition)
   * @param string $message
   * @return mixed The return value of $func_or_ec
   */
  public function until($func_or_ec, $message = "") {
    $end = microtime(true) + $this->timeout;
    $last_exception = null;

    while ($end > microtime(true)) {
      try {
        if ($func_or_ec instanceof WebDriverExpectedCondition) {
          $ret_val = call_user_func($func_or_ec->getApply(), $this->driver);
        } else {
          $ret_val = call_user_func($func_or_ec, $this->driver);
        }
        if ($ret_val) {
          return $ret_val;
        }
      } catch (NoSuchElementException $e) {
        $last_exception = $e;
      }
      usleep($this->interval * 1000);
    }

    if ($last_exception) {
      throw $last_exception;
    }
    throw new TimeOutException($message);
  }
}
