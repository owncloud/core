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

class Google_Service_OnDemandScanning_ImageOccurrence extends Google_Collection
{
  protected $collection_key = 'layerInfo';
  public $baseResourceUrl;
  public $distance;
  protected $fingerprintType = 'Google_Service_OnDemandScanning_Fingerprint';
  protected $fingerprintDataType = '';
  protected $layerInfoType = 'Google_Service_OnDemandScanning_Layer';
  protected $layerInfoDataType = 'array';

  public function setBaseResourceUrl($baseResourceUrl)
  {
    $this->baseResourceUrl = $baseResourceUrl;
  }
  public function getBaseResourceUrl()
  {
    return $this->baseResourceUrl;
  }
  public function setDistance($distance)
  {
    $this->distance = $distance;
  }
  public function getDistance()
  {
    return $this->distance;
  }
  /**
   * @param Google_Service_OnDemandScanning_Fingerprint
   */
  public function setFingerprint(Google_Service_OnDemandScanning_Fingerprint $fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return Google_Service_OnDemandScanning_Fingerprint
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Google_Service_OnDemandScanning_Layer[]
   */
  public function setLayerInfo($layerInfo)
  {
    $this->layerInfo = $layerInfo;
  }
  /**
   * @return Google_Service_OnDemandScanning_Layer[]
   */
  public function getLayerInfo()
  {
    return $this->layerInfo;
  }
}
