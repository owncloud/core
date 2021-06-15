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

class Google_Service_MyBusinessLodging_Connectivity extends Google_Model
{
  public $freeWifi;
  public $freeWifiException;
  public $publicAreaWifiAvailable;
  public $publicAreaWifiAvailableException;
  public $publicInternetTerminal;
  public $publicInternetTerminalException;
  public $wifiAvailable;
  public $wifiAvailableException;

  public function setFreeWifi($freeWifi)
  {
    $this->freeWifi = $freeWifi;
  }
  public function getFreeWifi()
  {
    return $this->freeWifi;
  }
  public function setFreeWifiException($freeWifiException)
  {
    $this->freeWifiException = $freeWifiException;
  }
  public function getFreeWifiException()
  {
    return $this->freeWifiException;
  }
  public function setPublicAreaWifiAvailable($publicAreaWifiAvailable)
  {
    $this->publicAreaWifiAvailable = $publicAreaWifiAvailable;
  }
  public function getPublicAreaWifiAvailable()
  {
    return $this->publicAreaWifiAvailable;
  }
  public function setPublicAreaWifiAvailableException($publicAreaWifiAvailableException)
  {
    $this->publicAreaWifiAvailableException = $publicAreaWifiAvailableException;
  }
  public function getPublicAreaWifiAvailableException()
  {
    return $this->publicAreaWifiAvailableException;
  }
  public function setPublicInternetTerminal($publicInternetTerminal)
  {
    $this->publicInternetTerminal = $publicInternetTerminal;
  }
  public function getPublicInternetTerminal()
  {
    return $this->publicInternetTerminal;
  }
  public function setPublicInternetTerminalException($publicInternetTerminalException)
  {
    $this->publicInternetTerminalException = $publicInternetTerminalException;
  }
  public function getPublicInternetTerminalException()
  {
    return $this->publicInternetTerminalException;
  }
  public function setWifiAvailable($wifiAvailable)
  {
    $this->wifiAvailable = $wifiAvailable;
  }
  public function getWifiAvailable()
  {
    return $this->wifiAvailable;
  }
  public function setWifiAvailableException($wifiAvailableException)
  {
    $this->wifiAvailableException = $wifiAvailableException;
  }
  public function getWifiAvailableException()
  {
    return $this->wifiAvailableException;
  }
}
