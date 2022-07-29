<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1DeviceAueCountReport extends \Google\Model
{
  /**
   * @var string
   */
  public $aueMonth;
  /**
   * @var string
   */
  public $aueYear;
  /**
   * @var string
   */
  public $count;
  /**
   * @var bool
   */
  public $expired;
  /**
   * @var string
   */
  public $model;

  /**
   * @param string
   */
  public function setAueMonth($aueMonth)
  {
    $this->aueMonth = $aueMonth;
  }
  /**
   * @return string
   */
  public function getAueMonth()
  {
    return $this->aueMonth;
  }
  /**
   * @param string
   */
  public function setAueYear($aueYear)
  {
    $this->aueYear = $aueYear;
  }
  /**
   * @return string
   */
  public function getAueYear()
  {
    return $this->aueYear;
  }
  /**
   * @param string
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return string
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param bool
   */
  public function setExpired($expired)
  {
    $this->expired = $expired;
  }
  /**
   * @return bool
   */
  public function getExpired()
  {
    return $this->expired;
  }
  /**
   * @param string
   */
  public function setModel($model)
  {
    $this->model = $model;
  }
  /**
   * @return string
   */
  public function getModel()
  {
    return $this->model;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1DeviceAueCountReport::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1DeviceAueCountReport');
