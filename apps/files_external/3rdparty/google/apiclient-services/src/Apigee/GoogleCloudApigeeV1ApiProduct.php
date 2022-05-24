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

class GoogleCloudApigeeV1ApiProduct extends \Google\Collection
{
  protected $collection_key = 'scopes';
  /**
   * @var string[]
   */
  public $apiResources;
  /**
   * @var string
   */
  public $approvalType;
  protected $attributesType = GoogleCloudApigeeV1Attribute::class;
  protected $attributesDataType = 'array';
  /**
   * @var string
   */
  public $createdAt;
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
  protected $graphqlOperationGroupType = GoogleCloudApigeeV1GraphQLOperationGroup::class;
  protected $graphqlOperationGroupDataType = '';
  /**
   * @var string
   */
  public $lastModifiedAt;
  /**
   * @var string
   */
  public $name;
  protected $operationGroupType = GoogleCloudApigeeV1OperationGroup::class;
  protected $operationGroupDataType = '';
  /**
   * @var string[]
   */
  public $proxies;
  /**
   * @var string
   */
  public $quota;
  /**
   * @var string
   */
  public $quotaInterval;
  /**
   * @var string
   */
  public $quotaTimeUnit;
  /**
   * @var string[]
   */
  public $scopes;

  /**
   * @param string[]
   */
  public function setApiResources($apiResources)
  {
    $this->apiResources = $apiResources;
  }
  /**
   * @return string[]
   */
  public function getApiResources()
  {
    return $this->apiResources;
  }
  /**
   * @param string
   */
  public function setApprovalType($approvalType)
  {
    $this->approvalType = $approvalType;
  }
  /**
   * @return string
   */
  public function getApprovalType()
  {
    return $this->approvalType;
  }
  /**
   * @param GoogleCloudApigeeV1Attribute[]
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return GoogleCloudApigeeV1Attribute[]
   */
  public function getAttributes()
  {
    return $this->attributes;
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
   * @param GoogleCloudApigeeV1GraphQLOperationGroup
   */
  public function setGraphqlOperationGroup(GoogleCloudApigeeV1GraphQLOperationGroup $graphqlOperationGroup)
  {
    $this->graphqlOperationGroup = $graphqlOperationGroup;
  }
  /**
   * @return GoogleCloudApigeeV1GraphQLOperationGroup
   */
  public function getGraphqlOperationGroup()
  {
    return $this->graphqlOperationGroup;
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
   * @param GoogleCloudApigeeV1OperationGroup
   */
  public function setOperationGroup(GoogleCloudApigeeV1OperationGroup $operationGroup)
  {
    $this->operationGroup = $operationGroup;
  }
  /**
   * @return GoogleCloudApigeeV1OperationGroup
   */
  public function getOperationGroup()
  {
    return $this->operationGroup;
  }
  /**
   * @param string[]
   */
  public function setProxies($proxies)
  {
    $this->proxies = $proxies;
  }
  /**
   * @return string[]
   */
  public function getProxies()
  {
    return $this->proxies;
  }
  /**
   * @param string
   */
  public function setQuota($quota)
  {
    $this->quota = $quota;
  }
  /**
   * @return string
   */
  public function getQuota()
  {
    return $this->quota;
  }
  /**
   * @param string
   */
  public function setQuotaInterval($quotaInterval)
  {
    $this->quotaInterval = $quotaInterval;
  }
  /**
   * @return string
   */
  public function getQuotaInterval()
  {
    return $this->quotaInterval;
  }
  /**
   * @param string
   */
  public function setQuotaTimeUnit($quotaTimeUnit)
  {
    $this->quotaTimeUnit = $quotaTimeUnit;
  }
  /**
   * @return string
   */
  public function getQuotaTimeUnit()
  {
    return $this->quotaTimeUnit;
  }
  /**
   * @param string[]
   */
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  /**
   * @return string[]
   */
  public function getScopes()
  {
    return $this->scopes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1ApiProduct::class, 'Google_Service_Apigee_GoogleCloudApigeeV1ApiProduct');
