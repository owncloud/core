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

class Google_Service_Cloudchannel_GoogleCloudChannelV1CloudIdentityCustomerAccount extends Google_Model
{
  public $customerCloudIdentityId;
  public $customerName;
  public $existing;
  public $owned;

  public function setCustomerCloudIdentityId($customerCloudIdentityId)
  {
    $this->customerCloudIdentityId = $customerCloudIdentityId;
  }
  public function getCustomerCloudIdentityId()
  {
    return $this->customerCloudIdentityId;
  }
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  public function getCustomerName()
  {
    return $this->customerName;
  }
  public function setExisting($existing)
  {
    $this->existing = $existing;
  }
  public function getExisting()
  {
    return $this->existing;
  }
  public function setOwned($owned)
  {
    $this->owned = $owned;
  }
  public function getOwned()
  {
    return $this->owned;
  }
}
