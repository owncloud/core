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

namespace Google\Service\ManagedServiceforMicrosoftActiveDirectoryConsumerAPI;

class LDAPSSettings extends \Google\Model
{
  protected $certificateType = Certificate::class;
  protected $certificateDataType = '';
  public $certificatePassword;
  public $certificatePfx;
  public $name;
  public $state;
  public $updateTime;

  /**
   * @param Certificate
   */
  public function setCertificate(Certificate $certificate)
  {
    $this->certificate = $certificate;
  }
  /**
   * @return Certificate
   */
  public function getCertificate()
  {
    return $this->certificate;
  }
  public function setCertificatePassword($certificatePassword)
  {
    $this->certificatePassword = $certificatePassword;
  }
  public function getCertificatePassword()
  {
    return $this->certificatePassword;
  }
  public function setCertificatePfx($certificatePfx)
  {
    $this->certificatePfx = $certificatePfx;
  }
  public function getCertificatePfx()
  {
    return $this->certificatePfx;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LDAPSSettings::class, 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_LDAPSSettings');
