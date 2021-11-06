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

namespace Google\Service\HangoutsChat;

class CommonEventObject extends \Google\Model
{
  protected $formInputsType = Inputs::class;
  protected $formInputsDataType = 'map';
  public $hostApp;
  public $invokedFunction;
  public $parameters;
  public $platform;
  protected $timeZoneType = TimeZone::class;
  protected $timeZoneDataType = '';
  public $userLocale;

  /**
   * @param Inputs[]
   */
  public function setFormInputs($formInputs)
  {
    $this->formInputs = $formInputs;
  }
  /**
   * @return Inputs[]
   */
  public function getFormInputs()
  {
    return $this->formInputs;
  }
  public function setHostApp($hostApp)
  {
    $this->hostApp = $hostApp;
  }
  public function getHostApp()
  {
    return $this->hostApp;
  }
  public function setInvokedFunction($invokedFunction)
  {
    $this->invokedFunction = $invokedFunction;
  }
  public function getInvokedFunction()
  {
    return $this->invokedFunction;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setPlatform($platform)
  {
    $this->platform = $platform;
  }
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param TimeZone
   */
  public function setTimeZone(TimeZone $timeZone)
  {
    $this->timeZone = $timeZone;
  }
  /**
   * @return TimeZone
   */
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setUserLocale($userLocale)
  {
    $this->userLocale = $userLocale;
  }
  public function getUserLocale()
  {
    return $this->userLocale;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommonEventObject::class, 'Google_Service_HangoutsChat_CommonEventObject');
