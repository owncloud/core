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

namespace Google\Service\IdentityToolkit;

class UserInfoProviderUserInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $email;
  /**
   * @var string
   */
  public $federatedId;
  /**
   * @var string
   */
  public $phoneNumber;
  /**
   * @var string
   */
  public $photoUrl;
  /**
   * @var string
   */
  public $providerId;
  /**
   * @var string
   */
  public $rawId;
  /**
   * @var string
   */
  public $screenName;

  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
  /**
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }
  /**
   * @param string
   */
  public function setFederatedId($federatedId)
  {
    $this->federatedId = $federatedId;
  }
  /**
   * @return string
   */
  public function getFederatedId()
  {
    return $this->federatedId;
  }
  /**
   * @param string
   */
  public function setPhoneNumber($phoneNumber)
  {
    $this->phoneNumber = $phoneNumber;
  }
  /**
   * @return string
   */
  public function getPhoneNumber()
  {
    return $this->phoneNumber;
  }
  /**
   * @param string
   */
  public function setPhotoUrl($photoUrl)
  {
    $this->photoUrl = $photoUrl;
  }
  /**
   * @return string
   */
  public function getPhotoUrl()
  {
    return $this->photoUrl;
  }
  /**
   * @param string
   */
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  /**
   * @return string
   */
  public function getProviderId()
  {
    return $this->providerId;
  }
  /**
   * @param string
   */
  public function setRawId($rawId)
  {
    $this->rawId = $rawId;
  }
  /**
   * @return string
   */
  public function getRawId()
  {
    return $this->rawId;
  }
  /**
   * @param string
   */
  public function setScreenName($screenName)
  {
    $this->screenName = $screenName;
  }
  /**
   * @return string
   */
  public function getScreenName()
  {
    return $this->screenName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserInfoProviderUserInfo::class, 'Google_Service_IdentityToolkit_UserInfoProviderUserInfo');
