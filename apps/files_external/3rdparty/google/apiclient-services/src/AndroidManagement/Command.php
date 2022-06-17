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

class Command extends \Google\Collection
{
  protected $collection_key = 'resetPasswordFlags';
  protected $clearAppsDataParamsType = ClearAppsDataParams::class;
  protected $clearAppsDataParamsDataType = '';
  protected $clearAppsDataStatusType = ClearAppsDataStatus::class;
  protected $clearAppsDataStatusDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $duration;
  /**
   * @var string
   */
  public $errorCode;
  /**
   * @var string
   */
  public $newPassword;
  /**
   * @var string[]
   */
  public $resetPasswordFlags;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $userName;

  /**
   * @param ClearAppsDataParams
   */
  public function setClearAppsDataParams(ClearAppsDataParams $clearAppsDataParams)
  {
    $this->clearAppsDataParams = $clearAppsDataParams;
  }
  /**
   * @return ClearAppsDataParams
   */
  public function getClearAppsDataParams()
  {
    return $this->clearAppsDataParams;
  }
  /**
   * @param ClearAppsDataStatus
   */
  public function setClearAppsDataStatus(ClearAppsDataStatus $clearAppsDataStatus)
  {
    $this->clearAppsDataStatus = $clearAppsDataStatus;
  }
  /**
   * @return ClearAppsDataStatus
   */
  public function getClearAppsDataStatus()
  {
    return $this->clearAppsDataStatus;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
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
  public function setErrorCode($errorCode)
  {
    $this->errorCode = $errorCode;
  }
  /**
   * @return string
   */
  public function getErrorCode()
  {
    return $this->errorCode;
  }
  /**
   * @param string
   */
  public function setNewPassword($newPassword)
  {
    $this->newPassword = $newPassword;
  }
  /**
   * @return string
   */
  public function getNewPassword()
  {
    return $this->newPassword;
  }
  /**
   * @param string[]
   */
  public function setResetPasswordFlags($resetPasswordFlags)
  {
    $this->resetPasswordFlags = $resetPasswordFlags;
  }
  /**
   * @return string[]
   */
  public function getResetPasswordFlags()
  {
    return $this->resetPasswordFlags;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param string
   */
  public function setUserName($userName)
  {
    $this->userName = $userName;
  }
  /**
   * @return string
   */
  public function getUserName()
  {
    return $this->userName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Command::class, 'Google_Service_AndroidManagement_Command');
