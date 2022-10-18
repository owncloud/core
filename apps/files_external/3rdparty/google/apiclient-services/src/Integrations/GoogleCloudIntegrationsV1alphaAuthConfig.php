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

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaAuthConfig extends \Google\Collection
{
  protected $collection_key = 'expiryNotificationDuration';
  /**
   * @var string
   */
  public $certificateId;
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $creatorEmail;
  /**
   * @var string
   */
  public $credentialType;
  protected $decryptedCredentialType = GoogleCloudIntegrationsV1alphaCredential::class;
  protected $decryptedCredentialDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $encryptedCredential;
  /**
   * @var string[]
   */
  public $expiryNotificationDuration;
  /**
   * @var string
   */
  public $lastModifierEmail;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $overrideValidTime;
  /**
   * @var string
   */
  public $reason;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $updateTime;
  /**
   * @var string
   */
  public $validTime;
  /**
   * @var string
   */
  public $visibility;

  /**
   * @param string
   */
  public function setCertificateId($certificateId)
  {
    $this->certificateId = $certificateId;
  }
  /**
   * @return string
   */
  public function getCertificateId()
  {
    return $this->certificateId;
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
  public function setCreatorEmail($creatorEmail)
  {
    $this->creatorEmail = $creatorEmail;
  }
  /**
   * @return string
   */
  public function getCreatorEmail()
  {
    return $this->creatorEmail;
  }
  /**
   * @param string
   */
  public function setCredentialType($credentialType)
  {
    $this->credentialType = $credentialType;
  }
  /**
   * @return string
   */
  public function getCredentialType()
  {
    return $this->credentialType;
  }
  /**
   * @param GoogleCloudIntegrationsV1alphaCredential
   */
  public function setDecryptedCredential(GoogleCloudIntegrationsV1alphaCredential $decryptedCredential)
  {
    $this->decryptedCredential = $decryptedCredential;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaCredential
   */
  public function getDecryptedCredential()
  {
    return $this->decryptedCredential;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
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
  public function setEncryptedCredential($encryptedCredential)
  {
    $this->encryptedCredential = $encryptedCredential;
  }
  /**
   * @return string
   */
  public function getEncryptedCredential()
  {
    return $this->encryptedCredential;
  }
  /**
   * @param string[]
   */
  public function setExpiryNotificationDuration($expiryNotificationDuration)
  {
    $this->expiryNotificationDuration = $expiryNotificationDuration;
  }
  /**
   * @return string[]
   */
  public function getExpiryNotificationDuration()
  {
    return $this->expiryNotificationDuration;
  }
  /**
   * @param string
   */
  public function setLastModifierEmail($lastModifierEmail)
  {
    $this->lastModifierEmail = $lastModifierEmail;
  }
  /**
   * @return string
   */
  public function getLastModifierEmail()
  {
    return $this->lastModifierEmail;
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
   * @param string
   */
  public function setOverrideValidTime($overrideValidTime)
  {
    $this->overrideValidTime = $overrideValidTime;
  }
  /**
   * @return string
   */
  public function getOverrideValidTime()
  {
    return $this->overrideValidTime;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param string
   */
  public function setState($state)
  {
    $this->state = $state;
  }
  /**
   * @return string
   */
  public function getState()
  {
    return $this->state;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
  /**
   * @param string
   */
  public function setValidTime($validTime)
  {
    $this->validTime = $validTime;
  }
  /**
   * @return string
   */
  public function getValidTime()
  {
    return $this->validTime;
  }
  /**
   * @param string
   */
  public function setVisibility($visibility)
  {
    $this->visibility = $visibility;
  }
  /**
   * @return string
   */
  public function getVisibility()
  {
    return $this->visibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaAuthConfig::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaAuthConfig');
