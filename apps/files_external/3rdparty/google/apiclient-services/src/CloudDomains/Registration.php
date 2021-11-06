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
  public $createTime;
  protected $dnsSettingsType = DnsSettings::class;
  protected $dnsSettingsDataType = '';
  public $domainName;
  public $expireTime;
  public $issues;
  public $labels;
  protected $managementSettingsType = ManagementSettings::class;
  protected $managementSettingsDataType = '';
  public $name;
  protected $pendingContactSettingsType = ContactSettings::class;
  protected $pendingContactSettingsDataType = '';
  public $state;
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
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
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
  public function setDomainName($domainName)
  {
    $this->domainName = $domainName;
  }
  public function getDomainName()
  {
    return $this->domainName;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setIssues($issues)
  {
    $this->issues = $issues;
  }
  public function getIssues()
  {
    return $this->issues;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
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
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSupportedPrivacy($supportedPrivacy)
  {
    $this->supportedPrivacy = $supportedPrivacy;
  }
  public function getSupportedPrivacy()
  {
    return $this->supportedPrivacy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Registration::class, 'Google_Service_CloudDomains_Registration');
