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

class Google_Service_Cloudchannel_GoogleCloudChannelV1CustomerConstraints extends Google_Collection
{
  protected $collection_key = 'promotionalOrderTypes';
  public $allowedCustomerTypes;
  public $allowedRegions;
  public $promotionalOrderTypes;

  public function setAllowedCustomerTypes($allowedCustomerTypes)
  {
    $this->allowedCustomerTypes = $allowedCustomerTypes;
  }
  public function getAllowedCustomerTypes()
  {
    return $this->allowedCustomerTypes;
  }
  public function setAllowedRegions($allowedRegions)
  {
    $this->allowedRegions = $allowedRegions;
  }
  public function getAllowedRegions()
  {
    return $this->allowedRegions;
  }
  public function setPromotionalOrderTypes($promotionalOrderTypes)
  {
    $this->promotionalOrderTypes = $promotionalOrderTypes;
  }
  public function getPromotionalOrderTypes()
  {
    return $this->promotionalOrderTypes;
  }
}
