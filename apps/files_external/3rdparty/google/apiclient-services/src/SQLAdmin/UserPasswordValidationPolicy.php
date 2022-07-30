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

namespace Google\Service\SQLAdmin;

class UserPasswordValidationPolicy extends \Google\Model
{
  /**
   * @var int
   */
  public $allowedFailedAttempts;
  /**
   * @var bool
   */
  public $enableFailedAttemptsCheck;
  /**
   * @var bool
   */
  public $enablePasswordVerification;
  /**
   * @var string
   */
  public $passwordExpirationDuration;
  protected $statusType = PasswordStatus::class;
  protected $statusDataType = '';

  /**
   * @param int
   */
  public function setAllowedFailedAttempts($allowedFailedAttempts)
  {
    $this->allowedFailedAttempts = $allowedFailedAttempts;
  }
  /**
   * @return int
   */
  public function getAllowedFailedAttempts()
  {
    return $this->allowedFailedAttempts;
  }
  /**
   * @param bool
   */
  public function setEnableFailedAttemptsCheck($enableFailedAttemptsCheck)
  {
    $this->enableFailedAttemptsCheck = $enableFailedAttemptsCheck;
  }
  /**
   * @return bool
   */
  public function getEnableFailedAttemptsCheck()
  {
    return $this->enableFailedAttemptsCheck;
  }
  /**
   * @param bool
   */
  public function setEnablePasswordVerification($enablePasswordVerification)
  {
    $this->enablePasswordVerification = $enablePasswordVerification;
  }
  /**
   * @return bool
   */
  public function getEnablePasswordVerification()
  {
    return $this->enablePasswordVerification;
  }
  /**
   * @param string
   */
  public function setPasswordExpirationDuration($passwordExpirationDuration)
  {
    $this->passwordExpirationDuration = $passwordExpirationDuration;
  }
  /**
   * @return string
   */
  public function getPasswordExpirationDuration()
  {
    return $this->passwordExpirationDuration;
  }
  /**
   * @param PasswordStatus
   */
  public function setStatus(PasswordStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return PasswordStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserPasswordValidationPolicy::class, 'Google_Service_SQLAdmin_UserPasswordValidationPolicy');
