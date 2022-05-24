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

class EnrollmentToken extends \Google\Model
{
  /**
   * @var string
   */
  public $additionalData;
  /**
   * @var string
   */
  public $allowPersonalUsage;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $expirationTimestamp;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $oneTimeOnly;
  /**
   * @var string
   */
  public $policyName;
  /**
   * @var string
   */
  public $qrCode;
  protected $userType = User::class;
  protected $userDataType = '';
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setAdditionalData($additionalData)
  {
    $this->additionalData = $additionalData;
  }
  /**
   * @return string
   */
  public function getAdditionalData()
  {
    return $this->additionalData;
  }
  /**
   * @param string
   */
  public function setAllowPersonalUsage($allowPersonalUsage)
  {
    $this->allowPersonalUsage = $allowPersonalUsage;
  }
  /**
   * @return string
   */
  public function getAllowPersonalUsage()
  {
    return $this->allowPersonalUsage;
  }
  /**
   * @param string
   */
  public function setDuration($duration)
  {
    $this->duration = $duration;
  }
  /**
   * @return string
   */
  public function getDuration()
  {
    return $this->duration;
  }
  /**
   * @param string
   */
  public function setExpirationTimestamp($expirationTimestamp)
  {
    $this->expirationTimestamp = $expirationTimestamp;
  }
  /**
   * @return string
   */
  public function getExpirationTimestamp()
  {
    return $this->expirationTimestamp;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param bool
   */
  public function setOneTimeOnly($oneTimeOnly)
  {
    $this->oneTimeOnly = $oneTimeOnly;
  }
  /**
   * @return bool
   */
  public function getOneTimeOnly()
  {
    return $this->oneTimeOnly;
  }
  /**
   * @param string
   */
  public function setPolicyName($policyName)
  {
    $this->policyName = $policyName;
  }
  /**
   * @return string
   */
  public function getPolicyName()
  {
    return $this->policyName;
  }
  /**
   * @param string
   */
  public function setQrCode($qrCode)
  {
    $this->qrCode = $qrCode;
  }
  /**
   * @return string
   */
  public function getQrCode()
  {
    return $this->qrCode;
  }
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnrollmentToken::class, 'Google_Service_AndroidManagement_EnrollmentToken');
