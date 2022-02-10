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
  /**
   * @var string
   */
  public $companyName;
  /**
   * @var string
   */
  public $configurationId;
  /**
   * @var string
   */
  public $configurationName;
  /**
   * @var string
   */
  public $contactEmail;
  /**
   * @var string
   */
  public $contactPhone;
  /**
   * @var string
   */
  public $customMessage;
  /**
   * @var string
   */
  public $dpcExtras;
  /**
   * @var string
   */
  public $dpcResourcePath;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var string
   */
  public $name;

  /**
   * @param string
   */
  public function setCompanyName($companyName)
  {
    $this->companyName = $companyName;
  }
  /**
   * @return string
   */
  public function getCompanyName()
  {
    return $this->companyName;
  }
  /**
   * @param string
   */
  public function setConfigurationId($configurationId)
  {
    $this->configurationId = $configurationId;
  }
  /**
   * @return string
   */
  public function getConfigurationId()
  {
    return $this->configurationId;
  }
  /**
   * @param string
   */
  public function setConfigurationName($configurationName)
  {
    $this->configurationName = $configurationName;
  }
  /**
   * @return string
   */
  public function getConfigurationName()
  {
    return $this->configurationName;
  }
  /**
   * @param string
   */
  public function setContactEmail($contactEmail)
  {
    $this->contactEmail = $contactEmail;
  }
  /**
   * @return string
   */
  public function getContactEmail()
  {
    return $this->contactEmail;
  }
  /**
   * @param string
   */
  public function setContactPhone($contactPhone)
  {
    $this->contactPhone = $contactPhone;
  }
  /**
   * @return string
   */
  public function getContactPhone()
  {
    return $this->contactPhone;
  }
  /**
   * @param string
   */
  public function setCustomMessage($customMessage)
  {
    $this->customMessage = $customMessage;
  }
  /**
   * @return string
   */
  public function getCustomMessage()
  {
    return $this->customMessage;
  }
  /**
   * @param string
   */
  public function setDpcExtras($dpcExtras)
  {
    $this->dpcExtras = $dpcExtras;
  }
  /**
   * @return string
   */
  public function getDpcExtras()
  {
    return $this->dpcExtras;
  }
  /**
   * @param string
   */
  public function setDpcResourcePath($dpcResourcePath)
  {
    $this->dpcResourcePath = $dpcResourcePath;
  }
  /**
   * @return string
   */
  public function getDpcResourcePath()
  {
    return $this->dpcResourcePath;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Configuration::class, 'Google_Service_AndroidProvisioningPartner_Configuration');
