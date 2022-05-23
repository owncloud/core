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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1Organization extends \Google\Collection
{
  protected $collection_key = 'environments';
  protected $addonsConfigType = GoogleCloudApigeeV1AddonsConfig::class;
  protected $addonsConfigDataType = '';
  /**
   * @var string
   */
  public $analyticsRegion;
  /**
   * @var string
   */
  public $apigeeProjectId;
  /**
   * @var string[]
   */
  public $attributes;
  /**
   * @var string
   */
  public $authorizedNetwork;
  /**
   * @var string
   */
  public $billingType;
  /**
   * @var string
   */
  public $caCertificate;
  /**
   * @var string
   */
  public $createdAt;
  /**
   * @var string
   */
  public $customerName;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string[]
   */
  public $environments;
  /**
   * @var string
   */
  public $expiresAt;
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $name;
  /**
   * @var bool
   */
  public $portalDisabled;
  /**
   * @var string
   */
  public $projectId;
  protected $propertiesType = GoogleCloudApigeeV1Properties::class;
  protected $propertiesDataType = '';
  /**
   * @var string
   */
  public $runtimeDatabaseEncryptionKeyName;
  /**
   * @var string
   */
  public $runtimeType;
  /**
   * @var string
   */
  public $state;
  /**
   * @var string
   */
  public $subscriptionType;
  /**
   * @var string
   */
  public $type;

  /**
   * @param GoogleCloudApigeeV1AddonsConfig
   */
  public function setAddonsConfig(GoogleCloudApigeeV1AddonsConfig $addonsConfig)
  {
    $this->addonsConfig = $addonsConfig;
  }
  /**
   * @return GoogleCloudApigeeV1AddonsConfig
   */
  public function getAddonsConfig()
  {
    return $this->addonsConfig;
  }
  /**
   * @param string
   */
  public function setAnalyticsRegion($analyticsRegion)
  {
    $this->analyticsRegion = $analyticsRegion;
  }
  /**
   * @return string
   */
  public function getAnalyticsRegion()
  {
    return $this->analyticsRegion;
  }
  /**
   * @param string
   */
  public function setApigeeProjectId($apigeeProjectId)
  {
    $this->apigeeProjectId = $apigeeProjectId;
  }
  /**
   * @return string
   */
  public function getApigeeProjectId()
  {
    return $this->apigeeProjectId;
  }
  /**
   * @param string[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return string[]
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param string
   */
  public function setAuthorizedNetwork($authorizedNetwork)
  {
    $this->authorizedNetwork = $authorizedNetwork;
  }
  /**
   * @return string
   */
  public function getAuthorizedNetwork()
  {
    return $this->authorizedNetwork;
  }
  /**
   * @param string
   */
  public function setBillingType($billingType)
  {
    $this->billingType = $billingType;
  }
  /**
   * @return string
   */
  public function getBillingType()
  {
    return $this->billingType;
  }
  /**
   * @param string
   */
  public function setCaCertificate($caCertificate)
  {
    $this->caCertificate = $caCertificate;
  }
  /**
   * @return string
   */
  public function getCaCertificate()
  {
    return $this->caCertificate;
  }
  /**
   * @param string
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  /**
   * @return string
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  /**
   * @param string
   */
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  /**
   * @return string
   */
  public function getCustomerName()
  {
    return $this->customerName;
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
   * @param string[]
   */
  public function setEnvironments($environments)
  {
    $this->environments = $environments;
  }
  /**
   * @return string[]
   */
  public function getEnvironments()
  {
    return $this->environments;
  }
  /**
   * @param string
   */
  public function setExpiresAt($expiresAt)
  {
    $this->expiresAt = $expiresAt;
  }
  /**
   * @return string
   */
  public function getExpiresAt()
  {
    return $this->expiresAt;
  }
  /**
   * @param string
   */
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  /**
   * @return string
   */
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
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
  public function setPortalDisabled($portalDisabled)
  {
    $this->portalDisabled = $portalDisabled;
  }
  /**
   * @return bool
   */
  public function getPortalDisabled()
  {
    return $this->portalDisabled;
  }
  /**
   * @param string
   */
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  /**
   * @return string
   */
  public function getProjectId()
  {
    return $this->projectId;
  }
  /**
   * @param GoogleCloudApigeeV1Properties
   */
  public function setProperties(GoogleCloudApigeeV1Properties $properties)
  {
    $this->properties = $properties;
  }
  /**
   * @return GoogleCloudApigeeV1Properties
   */
  public function getProperties()
  {
    return $this->properties;
  }
  /**
   * @param string
   */
  public function setRuntimeDatabaseEncryptionKeyName($runtimeDatabaseEncryptionKeyName)
  {
    $this->runtimeDatabaseEncryptionKeyName = $runtimeDatabaseEncryptionKeyName;
  }
  /**
   * @return string
   */
  public function getRuntimeDatabaseEncryptionKeyName()
  {
    return $this->runtimeDatabaseEncryptionKeyName;
  }
  /**
   * @param string
   */
  public function setRuntimeType($runtimeType)
  {
    $this->runtimeType = $runtimeType;
  }
  /**
   * @return string
   */
  public function getRuntimeType()
  {
    return $this->runtimeType;
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
  public function setSubscriptionType($subscriptionType)
  {
    $this->subscriptionType = $subscriptionType;
  }
  /**
   * @return string
   */
  public function getSubscriptionType()
  {
    return $this->subscriptionType;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Organization::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Organization');
