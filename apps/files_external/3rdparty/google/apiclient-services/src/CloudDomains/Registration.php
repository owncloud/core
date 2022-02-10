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

namespace Google\Service\CloudDomains;

class Registration extends \Google\Collection
{
  protected $collection_key = 'supportedPrivacy';
  protected $contactSettingsType = ContactSettings::class;
  protected $contactSettingsDataType = '';
  /**
   * @var string
   */
  public $createTime;
  protected $dnsSettingsType = DnsSettings::class;
  protected $dnsSettingsDataType = '';
  /**
   * @var string
   */
  public $domainName;
  /**
   * @var string
   */
  public $expireTime;
  /**
   * @var string[]
   */
  public $issues;
  /**
   * @var string[]
   */
  public $labels;
  protected $managementSettingsType = ManagementSettings::class;
  protected $managementSettingsDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $pendingContactSettingsType = ContactSettings::class;
  protected $pendingContactSettingsDataType = '';
  /**
   * @var string
   */
  public $state;
  /**
   * @var string[]
   */
  public $supportedPrivacy;

  /**
   * @param ContactSettings
   */
  public function setContactSettings(ContactSettings $contactSettings)
  {
    $this->contactSettings = $contactSettings;
  }
  /**
   * @return ContactSettings
   */
  public function getContactSettings()
  {
    return $this->contactSettings;
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
   * @param DnsSettings
   */
  public function setDnsSettings(DnsSettings $dnsSettings)
  {
    $this->dnsSettings = $dnsSettings;
  }
  /**
   * @return DnsSettings
   */
  public function getDnsSettings()
  {
    return $this->dnsSettings;
  }
  /**
   * @param string
   */
  public function setDomainName($domainName)
  {
    $this->domainName = $domainName;
  }
  /**
   * @return string
   */
  public function getDomainName()
  {
    return $this->domainName;
  }
  /**
   * @param string
   */
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  /**
   * @return string
   */
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  /**
   * @param string[]
   */
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  /**
   * @return string[]
   */
  public function getIssues()
  {
    return $this->issues;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param ManagementSettings
   */
  public function setManagementSettings(ManagementSettings $managementSettings)
  {
    $this->managementSettings = $managementSettings;
  }
  /**
   * @return ManagementSettings
   */
  public function getManagementSettings()
  {
    return $this->managementSettings;
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
   * @param ContactSettings
   */
  public function setPendingContactSettings(ContactSettings $pendingContactSettings)
  {
    $this->pendingContactSettings = $pendingContactSettings;
  }
  /**
   * @return ContactSettings
   */
  public function getPendingContactSettings()
  {
    return $this->pendingContactSettings;
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
   * @param string[]
   */
  public function setSupportedPrivacy($supportedPrivacy)
  {
    $this->supportedPrivacy = $supportedPrivacy;
  }
  /**
   * @return string[]
   */
  public function getSupportedPrivacy()
  {
    return $this->supportedPrivacy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Registration::class, 'Google_Service_CloudDomains_Registration');
