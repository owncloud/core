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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1PriceTier extends \Google\Model
{
  /**
   * @var int
   */
  public $firstResource;
  /**
   * @var int
   */
  public $lastResource;
  protected $priceType = GoogleCloudChannelV1Price::class;
  protected $priceDataType = '';

  /**
   * @param int
   */
  public function setFirstResource($firstResource)
  {
    $this->firstResource = $firstResource;
  }
  /**
   * @return int
   */
  public function getFirstResource()
  {
    return $this->firstResource;
  }
  /**
   * @param int
   */
  public function setLastResource($lastResource)
  {
    $this->lastResource = $lastResource;
  }
  /**
   * @return int
   */
  public function getLastResource()
  {
    return $this->lastResource;
  }
  /**
   * @param GoogleCloudChannelV1Price
   */
  public function setPrice(GoogleCloudChannelV1Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return GoogleCloudChannelV1Price
   */
  public function getPrice()
  {
    return $this->price;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1PriceTier::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1PriceTier');
