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

namespace Google\Service\Calendar;

class EntryPoint extends \Google\Collection
{
  protected $collection_key = 'entryPointFeatures';
  /**
   * @var string
   */
  public $accessCode;
  /**
   * @var string[]
   */
  public $entryPointFeatures;
  /**
   * @var string
   */
  public $entryPointType;
  /**
   * @var string
   */
  public $label;
  /**
   * @var string
   */
  public $meetingCode;
  /**
   * @var string
   */
  public $passcode;
  /**
   * @var string
   */
  public $password;
  /**
   * @var string
   */
  public $pin;
  /**
   * @var string
   */
  public $regionCode;
  /**
   * @var string
   */
  public $uri;

  /**
   * @param string
   */
  public function setAccessCode($accessCode)
  {
    $this->accessCode = $accessCode;
  }
  /**
   * @return string
   */
  public function getAccessCode()
  {
    return $this->accessCode;
  }
  /**
   * @param string[]
   */
  public function setEntryPointFeatures($entryPointFeatures)
  {
    $this->entryPointFeatures = $entryPointFeatures;
  }
  /**
   * @return string[]
   */
  public function getEntryPointFeatures()
  {
    return $this->entryPointFeatures;
  }
  /**
   * @param string
   */
  public function setEntryPointType($entryPointType)
  {
    $this->entryPointType = $entryPointType;
  }
  /**
   * @return string
   */
  public function getEntryPointType()
  {
    return $this->entryPointType;
  }
  /**
   * @param string
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }
  /**
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }
  /**
   * @param string
   */
  public function setMeetingCode($meetingCode)
  {
    $this->meetingCode = $meetingCode;
  }
  /**
   * @return string
   */
  public function getMeetingCode()
  {
    return $this->meetingCode;
  }
  /**
   * @param string
   */
  public function setPasscode($passcode)
  {
    $this->passcode = $passcode;
  }
  /**
   * @return string
   */
  public function getPasscode()
  {
    return $this->passcode;
  }
  /**
   * @param string
   */
  public function setPassword($password)
  {
    $this->password = $password;
  }
  /**
   * @return string
   */
  public function getPassword()
  {
    return $this->password;
  }
  /**
   * @param string
   */
  public function setPin($pin)
  {
    $this->pin = $pin;
  }
  /**
   * @return string
   */
  public function getPin()
  {
    return $this->pin;
  }
  /**
   * @param string
   */
  public function setRegionCode($regionCode)
  {
    $this->regionCode = $regionCode;
  }
  /**
   * @return string
   */
  public function getRegionCode()
  {
    return $this->regionCode;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EntryPoint::class, 'Google_Service_Calendar_EntryPoint');
