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

namespace Google\Service\Contentwarehouse;

class LocalsearchProtoInternalFoodOrderingActionMetadataServiceInfo extends \Google\Collection
{
  protected $collection_key = 'availablePartnerInfo';
  protected $availablePartnerInfoType = LocalsearchProtoInternalFoodOrderingActionMetadataAvailablePartnerInfo::class;
  protected $availablePartnerInfoDataType = 'array';
  /**
   * @var string
   */
  public $maxWaitTimeSec;
  protected $minDeliveryFeeType = GoogleTypeMoney::class;
  protected $minDeliveryFeeDataType = '';
  /**
   * @var string
   */
  public $minWaitTimeSec;
  /**
   * @var string
   */
  public $serviceType;

  /**
   * @param LocalsearchProtoInternalFoodOrderingActionMetadataAvailablePartnerInfo[]
   */
  public function setAvailablePartnerInfo($availablePartnerInfo)
  {
    $this->availablePartnerInfo = $availablePartnerInfo;
  }
  /**
   * @return LocalsearchProtoInternalFoodOrderingActionMetadataAvailablePartnerInfo[]
   */
  public function getAvailablePartnerInfo()
  {
    return $this->availablePartnerInfo;
  }
  /**
   * @param string
   */
  public function setMaxWaitTimeSec($maxWaitTimeSec)
  {
    $this->maxWaitTimeSec = $maxWaitTimeSec;
  }
  /**
   * @return string
   */
  public function getMaxWaitTimeSec()
  {
    return $this->maxWaitTimeSec;
  }
  /**
   * @param GoogleTypeMoney
   */
  public function setMinDeliveryFee(GoogleTypeMoney $minDeliveryFee)
  {
    $this->minDeliveryFee = $minDeliveryFee;
  }
  /**
   * @return GoogleTypeMoney
   */
  public function getMinDeliveryFee()
  {
    return $this->minDeliveryFee;
  }
  /**
   * @param string
   */
  public function setMinWaitTimeSec($minWaitTimeSec)
  {
    $this->minWaitTimeSec = $minWaitTimeSec;
  }
  /**
   * @return string
   */
  public function getMinWaitTimeSec()
  {
    return $this->minWaitTimeSec;
  }
  /**
   * @param string
   */
  public function setServiceType($serviceType)
  {
    $this->serviceType = $serviceType;
  }
  /**
   * @return string
   */
  public function getServiceType()
  {
    return $this->serviceType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LocalsearchProtoInternalFoodOrderingActionMetadataServiceInfo::class, 'Google_Service_Contentwarehouse_LocalsearchProtoInternalFoodOrderingActionMetadataServiceInfo');
