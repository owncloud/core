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

namespace Google\Service\ContainerAnalysis;

class Derived extends \Google\Collection
{
  protected $collection_key = 'layerInfo';
  public $baseResourceUrl;
  public $distance;
  protected $fingerprintType = Fingerprint::class;
  protected $fingerprintDataType = '';
  protected $layerInfoType = Layer::class;
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
   * @param Fingerprint
   */
  public function setFingerprint(Fingerprint $fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  /**
   * @return Fingerprint
   */
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  /**
   * @param Layer[]
   */
  public function setLayerInfo($layerInfo)
  {
    $this->layerInfo = $layerInfo;
  }
  /**
   * @return Layer[]
   */
  public function getLayerInfo()
  {
    return $this->layerInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Derived::class, 'Google_Service_ContainerAnalysis_Derived');
