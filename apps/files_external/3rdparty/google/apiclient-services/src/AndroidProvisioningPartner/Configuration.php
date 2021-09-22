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

namespace Google\Service\AndroidProvisioningPartner;

class Configuration extends \Google\Model
{
  public $companyName;
  public $configurationId;
  public $configurationName;
  public $contactEmail;
  public $contactPhone;
  public $customMessage;
  public $dpcExtras;
  public $dpcResourcePath;
  public $isDefault;
  public $name;

  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }
  public function getCompanyName()
  {
    return $this->companyName;
  }
  public function setConfigurationId($configurationId)
  {
    $this->configurationId = $configurationId;
  }
  public function getConfigurationId()
  {
    return $this->configurationId;
  }
  public function setConfigurationName($configurationName)
  {
    $this->configurationName = $configurationName;
  }
  public function getConfigurationName()
  {
    return $this->configurationName;
  }
  public function setContactEmail($contactEmail)
  {
    $this->contactEmail = $contactEmail;
  }
  public function getContactEmail()
  {
    return $this->contactEmail;
  }
  public function setContactPhone($contactPhone)
  {
    $this->contactPhone = $contactPhone;
  }
  public function getContactPhone()
  {
    return $this->contactPhone;
  }
  public function setCustomMessage($customMessage)
  {
    $this->customMessage = $customMessage;
  }
  public function getCustomMessage()
  {
    return $this->customMessage;
  }
  public function setDpcExtras($dpcExtras)
  {
    $this->dpcExtras = $dpcExtras;
  }
  public function getDpcExtras()
  {
    return $this->dpcExtras;
  }
  public function setDpcResourcePath($dpcResourcePath)
  {
    $this->dpcResourcePath = $dpcResourcePath;
  }
  public function getDpcResourcePath()
  {
    return $this->dpcResourcePath;
  }
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Configuration::class, 'Google_Service_AndroidProvisioningPartner_Configuration');
