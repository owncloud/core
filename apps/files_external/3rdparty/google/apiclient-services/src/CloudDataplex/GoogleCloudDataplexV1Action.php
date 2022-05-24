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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Action extends \Google\Collection
{
  protected $collection_key = 'dataLocations';
  /**
   * @var string
   */
  public $asset;
  /**
   * @var string
   */
  public $category;
  /**
   * @var string[]
   */
  public $dataLocations;
  /**
   * @var string
   */
  public $detectTime;
  protected $failedSecurityPolicyApplyType = GoogleCloudDataplexV1ActionFailedSecurityPolicyApply::class;
  protected $failedSecurityPolicyApplyDataType = '';
  protected $incompatibleDataSchemaType = GoogleCloudDataplexV1ActionIncompatibleDataSchema::class;
  protected $incompatibleDataSchemaDataType = '';
  protected $invalidDataFormatType = GoogleCloudDataplexV1ActionInvalidDataFormat::class;
  protected $invalidDataFormatDataType = '';
  protected $invalidDataOrganizationType = GoogleCloudDataplexV1ActionInvalidDataOrganization::class;
  protected $invalidDataOrganizationDataType = '';
  protected $invalidDataPartitionType = GoogleCloudDataplexV1ActionInvalidDataPartition::class;
  protected $invalidDataPartitionDataType = '';
  /**
   * @var string
   */
  public $issue;
  /**
   * @var string
   */
  public $lake;
  protected $missingDataType = GoogleCloudDataplexV1ActionMissingData::class;
  protected $missingDataDataType = '';
  protected $missingResourceType = GoogleCloudDataplexV1ActionMissingResource::class;
  protected $missingResourceDataType = '';
  /**
   * @var string
   */
  public $name;
  protected $unauthorizedResourceType = GoogleCloudDataplexV1ActionUnauthorizedResource::class;
  protected $unauthorizedResourceDataType = '';
  /**
   * @var string
   */
  public $zone;

  /**
   * @param string
   */
  public function setAsset($asset)
  {
    $this->asset = $asset;
  }
  /**
   * @return string
   */
  public function getAsset()
  {
    return $this->asset;
  }
  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string[]
   */
  public function setDataLocations($dataLocations)
  {
    $this->dataLocations = $dataLocations;
  }
  /**
   * @return string[]
   */
  public function getDataLocations()
  {
    return $this->dataLocations;
  }
  /**
   * @param string
   */
  public function setDetectTime($detectTime)
  {
    $this->detectTime = $detectTime;
  }
  /**
   * @return string
   */
  public function getDetectTime()
  {
    return $this->detectTime;
  }
  /**
   * @param GoogleCloudDataplexV1ActionFailedSecurityPolicyApply
   */
  public function setFailedSecurityPolicyApply(GoogleCloudDataplexV1ActionFailedSecurityPolicyApply $failedSecurityPolicyApply)
  {
    $this->failedSecurityPolicyApply = $failedSecurityPolicyApply;
  }
  /**
   * @return GoogleCloudDataplexV1ActionFailedSecurityPolicyApply
   */
  public function getFailedSecurityPolicyApply()
  {
    return $this->failedSecurityPolicyApply;
  }
  /**
   * @param GoogleCloudDataplexV1ActionIncompatibleDataSchema
   */
  public function setIncompatibleDataSchema(GoogleCloudDataplexV1ActionIncompatibleDataSchema $incompatibleDataSchema)
  {
    $this->incompatibleDataSchema = $incompatibleDataSchema;
  }
  /**
   * @return GoogleCloudDataplexV1ActionIncompatibleDataSchema
   */
  public function getIncompatibleDataSchema()
  {
    return $this->incompatibleDataSchema;
  }
  /**
   * @param GoogleCloudDataplexV1ActionInvalidDataFormat
   */
  public function setInvalidDataFormat(GoogleCloudDataplexV1ActionInvalidDataFormat $invalidDataFormat)
  {
    $this->invalidDataFormat = $invalidDataFormat;
  }
  /**
   * @return GoogleCloudDataplexV1ActionInvalidDataFormat
   */
  public function getInvalidDataFormat()
  {
    return $this->invalidDataFormat;
  }
  /**
   * @param GoogleCloudDataplexV1ActionInvalidDataOrganization
   */
  public function setInvalidDataOrganization(GoogleCloudDataplexV1ActionInvalidDataOrganization $invalidDataOrganization)
  {
    $this->invalidDataOrganization = $invalidDataOrganization;
  }
  /**
   * @return GoogleCloudDataplexV1ActionInvalidDataOrganization
   */
  public function getInvalidDataOrganization()
  {
    return $this->invalidDataOrganization;
  }
  /**
   * @param GoogleCloudDataplexV1ActionInvalidDataPartition
   */
  public function setInvalidDataPartition(GoogleCloudDataplexV1ActionInvalidDataPartition $invalidDataPartition)
  {
    $this->invalidDataPartition = $invalidDataPartition;
  }
  /**
   * @return GoogleCloudDataplexV1ActionInvalidDataPartition
   */
  public function getInvalidDataPartition()
  {
    return $this->invalidDataPartition;
  }
  /**
   * @param string
   */
  public function setIssue($issue)
  {
    $this->issue = $issue;
  }
  /**
   * @return string
   */
  public function getIssue()
  {
    return $this->issue;
  }
  /**
   * @param string
   */
  public function setLake($lake)
  {
    $this->lake = $lake;
  }
  /**
   * @return string
   */
  public function getLake()
  {
    return $this->lake;
  }
  /**
   * @param GoogleCloudDataplexV1ActionMissingData
   */
  public function setMissingData(GoogleCloudDataplexV1ActionMissingData $missingData)
  {
    $this->missingData = $missingData;
  }
  /**
   * @return GoogleCloudDataplexV1ActionMissingData
   */
  public function getMissingData()
  {
    return $this->missingData;
  }
  /**
   * @param GoogleCloudDataplexV1ActionMissingResource
   */
  public function setMissingResource(GoogleCloudDataplexV1ActionMissingResource $missingResource)
  {
    $this->missingResource = $missingResource;
  }
  /**
   * @return GoogleCloudDataplexV1ActionMissingResource
   */
  public function getMissingResource()
  {
    return $this->missingResource;
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
   * @param GoogleCloudDataplexV1ActionUnauthorizedResource
   */
  public function setUnauthorizedResource(GoogleCloudDataplexV1ActionUnauthorizedResource $unauthorizedResource)
  {
    $this->unauthorizedResource = $unauthorizedResource;
  }
  /**
   * @return GoogleCloudDataplexV1ActionUnauthorizedResource
   */
  public function getUnauthorizedResource()
  {
    return $this->unauthorizedResource;
  }
  /**
   * @param string
   */
  public function setZone($zone)
  {
    $this->zone = $zone;
  }
  /**
   * @return string
   */
  public function getZone()
  {
    return $this->zone;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Action::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Action');
