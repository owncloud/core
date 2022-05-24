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

namespace Google\Service\AndroidManagement;

class NetworkInfo extends \Google\Collection
{
  protected $collection_key = 'telephonyInfos';
  /**
   * @var string
   */
  public $imei;
  /**
   * @var string
   */
  public $meid;
  /**
   * @var string
   */
  public $networkOperatorName;
  protected $telephonyInfosType = TelephonyInfo::class;
  protected $telephonyInfosDataType = 'array';
  /**
   * @var string
   */
  public $wifiMacAddress;

  /**
   * @param string
   */
  public function setImei($imei)
  {
    $this->imei = $imei;
  }
  /**
   * @return string
   */
  public function getImei()
  {
    return $this->imei;
  }
  /**
   * @param string
   */
  public function setMeid($meid)
  {
    $this->meid = $meid;
  }
  /**
   * @return string
   */
  public function getMeid()
  {
    return $this->meid;
  }
  /**
   * @param string
   */
  public function setNetworkOperatorName($networkOperatorName)
  {
    $this->networkOperatorName = $networkOperatorName;
  }
  /**
   * @return string
   */
  public function getNetworkOperatorName()
  {
    return $this->networkOperatorName;
  }
  /**
   * @param TelephonyInfo[]
   */
  public function setTelephonyInfos($telephonyInfos)
  {
    $this->telephonyInfos = $telephonyInfos;
  }
  /**
   * @return TelephonyInfo[]
   */
  public function getTelephonyInfos()
  {
    return $this->telephonyInfos;
  }
  /**
   * @param string
   */
  public function setWifiMacAddress($wifiMacAddress)
  {
    $this->wifiMacAddress = $wifiMacAddress;
  }
  /**
   * @return string
   */
  public function getWifiMacAddress()
  {
    return $this->wifiMacAddress;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkInfo::class, 'Google_Service_AndroidManagement_NetworkInfo');
