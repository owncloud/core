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
  public $analyticsRegion;
  public $attributes;
  public $authorizedNetwork;
  public $billingType;
  public $caCertificate;
  public $createdAt;
  public $customerName;
  public $description;
  public $displayName;
  public $environments;
  public $expiresAt;
  public $lastModifiedAt;
  public $name;
  public $projectId;
  protected $propertiesType = GoogleCloudApigeeV1Properties::class;
  protected $propertiesDataType = '';
  public $runtimeDatabaseEncryptionKeyName;
  public $runtimeType;
  public $state;
  public $subscriptionType;
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
  public function setAnalyticsRegion($analyticsRegion)
  {
    $this->analyticsRegion = $analyticsRegion;
  }
  public function getAnalyticsRegion()
  {
    return $this->analyticsRegion;
  }
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setAuthorizedNetwork($authorizedNetwork)
  {
    $this->authorizedNetwork = $authorizedNetwork;
  }
  public function getAuthorizedNetwork()
  {
    return $this->authorizedNetwork;
  }
  public function setBillingType($billingType)
  {
    $this->billingType = $billingType;
  }
  public function getBillingType()
  {
    return $this->billingType;
  }
  public function setCaCertificate($caCertificate)
  {
    $this->caCertificate = $caCertificate;
  }
  public function getCaCertificate()
  {
    return $this->caCertificate;
  }
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }
  public function getCreatedAt()
  {
    return $this->createdAt;
  }
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  public function getCustomerName()
  {
    return $this->customerName;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setEnvironments($environments)
  {
    $this->environments = $environments;
  }
  public function getEnvironments()
  {
    return $this->environments;
  }
  public function setExpiresAt($expiresAt)
  {
    $this->expiresAt = $expiresAt;
  }
  public function getExpiresAt()
  {
    return $this->expiresAt;
  }
  public function setLastModifiedAt($lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;
  }
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
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
  public function setRuntimeDatabaseEncryptionKeyName($runtimeDatabaseEncryptionKeyName)
  {
    $this->runtimeDatabaseEncryptionKeyName = $runtimeDatabaseEncryptionKeyName;
  }
  public function getRuntimeDatabaseEncryptionKeyName()
  {
    return $this->runtimeDatabaseEncryptionKeyName;
  }
  public function setRuntimeType($runtimeType)
  {
    $this->runtimeType = $runtimeType;
  }
  public function getRuntimeType()
  {
    return $this->runtimeType;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setSubscriptionType($subscriptionType)
  {
    $this->subscriptionType = $subscriptionType;
  }
  public function getSubscriptionType()
  {
    return $this->subscriptionType;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1Organization::class, 'Google_Service_Apigee_GoogleCloudApigeeV1Organization');
