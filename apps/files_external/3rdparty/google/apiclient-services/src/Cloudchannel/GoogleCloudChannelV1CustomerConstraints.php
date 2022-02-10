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

class GoogleCloudChannelV1CustomerConstraints extends \Google\Collection
{
  protected $collection_key = 'promotionalOrderTypes';
  /**
   * @var string[]
   */
  public $allowedCustomerTypes;
  /**
   * @var string[]
   */
  public $allowedRegions;
  /**
   * @var string[]
   */
  public $promotionalOrderTypes;

  /**
   * @param string[]
   */
  public function setAllowedCustomerTypes($allowedCustomerTypes)
  {
    $this->allowedCustomerTypes = $allowedCustomerTypes;
  }
  /**
   * @return string[]
   */
  public function getAllowedCustomerTypes()
  {
    return $this->allowedCustomerTypes;
  }
  /**
   * @param string[]
   */
  public function setAllowedRegions($allowedRegions)
  {
    $this->allowedRegions = $allowedRegions;
  }
  /**
   * @return string[]
   */
  public function getAllowedRegions()
  {
    return $this->allowedRegions;
  }
  /**
   * @param string[]
   */
  public function setPromotionalOrderTypes($promotionalOrderTypes)
  {
    $this->promotionalOrderTypes = $promotionalOrderTypes;
  }
  /**
   * @return string[]
   */
  public function getPromotionalOrderTypes()
  {
    return $this->promotionalOrderTypes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1CustomerConstraints::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1CustomerConstraints');
