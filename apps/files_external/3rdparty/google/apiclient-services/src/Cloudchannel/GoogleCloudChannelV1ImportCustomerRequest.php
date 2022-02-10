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

class GoogleCloudChannelV1ImportCustomerRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $authToken;
  /**
   * @var string
   */
  public $channelPartnerId;
  /**
   * @var string
   */
  public $cloudIdentityId;
  /**
   * @var string
   */
  public $customer;
  /**
   * @var string
   */
  public $domain;
  /**
   * @var bool
   */
  public $overwriteIfExists;

  /**
   * @param string
   */
  public function setAuthToken($authToken)
  {
    $this->authToken = $authToken;
  }
  /**
   * @return string
   */
  public function getAuthToken()
  {
    return $this->authToken;
  }
  /**
   * @param string
   */
  public function setChannelPartnerId($channelPartnerId)
  {
    $this->channelPartnerId = $channelPartnerId;
  }
  /**
   * @return string
   */
  public function getChannelPartnerId()
  {
    return $this->channelPartnerId;
  }
  /**
   * @param string
   */
  public function setCloudIdentityId($cloudIdentityId)
  {
    $this->cloudIdentityId = $cloudIdentityId;
  }
  /**
   * @return string
   */
  public function getCloudIdentityId()
  {
    return $this->cloudIdentityId;
  }
  /**
   * @param string
   */
  public function setCustomer($customer)
  {
    $this->customer = $customer;
  }
  /**
   * @return string
   */
  public function getCustomer()
  {
    return $this->customer;
  }
  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param bool
   */
  public function setOverwriteIfExists($overwriteIfExists)
  {
    $this->overwriteIfExists = $overwriteIfExists;
  }
  /**
   * @return bool
   */
  public function getOverwriteIfExists()
  {
    return $this->overwriteIfExists;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1ImportCustomerRequest::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1ImportCustomerRequest');
