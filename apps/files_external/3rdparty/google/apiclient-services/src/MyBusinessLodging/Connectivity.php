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

namespace Google\Service\MyBusinessLodging;

class Connectivity extends \Google\Model
{
  /**
   * @var bool
   */
  public $freeWifi;
  /**
   * @var string
   */
  public $freeWifiException;
  /**
   * @var bool
   */
  public $publicAreaWifiAvailable;
  /**
   * @var string
   */
  public $publicAreaWifiAvailableException;
  /**
   * @var bool
   */
  public $publicInternetTerminal;
  /**
   * @var string
   */
  public $publicInternetTerminalException;
  /**
   * @var bool
   */
  public $wifiAvailable;
  /**
   * @var string
   */
  public $wifiAvailableException;

  /**
   * @param bool
   */
  public function setFreeWifi($freeWifi)
  {
    $this->freeWifi = $freeWifi;
  }
  /**
   * @return bool
   */
  public function getFreeWifi()
  {
    return $this->freeWifi;
  }
  /**
   * @param string
   */
  public function setFreeWifiException($freeWifiException)
  {
    $this->freeWifiException = $freeWifiException;
  }
  /**
   * @return string
   */
  public function getFreeWifiException()
  {
    return $this->freeWifiException;
  }
  /**
   * @param bool
   */
  public function setPublicAreaWifiAvailable($publicAreaWifiAvailable)
  {
    $this->publicAreaWifiAvailable = $publicAreaWifiAvailable;
  }
  /**
   * @return bool
   */
  public function getPublicAreaWifiAvailable()
  {
    return $this->publicAreaWifiAvailable;
  }
  /**
   * @param string
   */
  public function setPublicAreaWifiAvailableException($publicAreaWifiAvailableException)
  {
    $this->publicAreaWifiAvailableException = $publicAreaWifiAvailableException;
  }
  /**
   * @return string
   */
  public function getPublicAreaWifiAvailableException()
  {
    return $this->publicAreaWifiAvailableException;
  }
  /**
   * @param bool
   */
  public function setPublicInternetTerminal($publicInternetTerminal)
  {
    $this->publicInternetTerminal = $publicInternetTerminal;
  }
  /**
   * @return bool
   */
  public function getPublicInternetTerminal()
  {
    return $this->publicInternetTerminal;
  }
  /**
   * @param string
   */
  public function setPublicInternetTerminalException($publicInternetTerminalException)
  {
    $this->publicInternetTerminalException = $publicInternetTerminalException;
  }
  /**
   * @return string
   */
  public function getPublicInternetTerminalException()
  {
    return $this->publicInternetTerminalException;
  }
  /**
   * @param bool
   */
  public function setWifiAvailable($wifiAvailable)
  {
    $this->wifiAvailable = $wifiAvailable;
  }
  /**
   * @return bool
   */
  public function getWifiAvailable()
  {
    return $this->wifiAvailable;
  }
  /**
   * @param string
   */
  public function setWifiAvailableException($wifiAvailableException)
  {
    $this->wifiAvailableException = $wifiAvailableException;
  }
  /**
   * @return string
   */
  public function getWifiAvailableException()
  {
    return $this->wifiAvailableException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Connectivity::class, 'Google_Service_MyBusinessLodging_Connectivity');
