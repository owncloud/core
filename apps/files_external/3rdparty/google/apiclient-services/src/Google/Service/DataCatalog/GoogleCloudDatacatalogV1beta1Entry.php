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

class Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Entry extends Google_Model
{
  protected $bigqueryDateShardedSpecType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryDateShardedSpec';
  protected $bigqueryDateShardedSpecDataType = '';
  protected $bigqueryTableSpecType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryTableSpec';
  protected $bigqueryTableSpecDataType = '';
  public $description;
  public $displayName;
  protected $gcsFilesetSpecType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1GcsFilesetSpec';
  protected $gcsFilesetSpecDataType = '';
  public $integratedSystem;
  public $linkedResource;
  public $name;
  protected $schemaType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Schema';
  protected $schemaDataType = '';
  protected $sourceSystemTimestampsType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SystemTimestamps';
  protected $sourceSystemTimestampsDataType = '';
  public $type;
  protected $usageSignalType = 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1UsageSignal';
  protected $usageSignalDataType = '';
  public $userSpecifiedSystem;
  public $userSpecifiedType;

  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryDateShardedSpec
   */
  public function setBigqueryDateShardedSpec(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryDateShardedSpec $bigqueryDateShardedSpec)
  {
    $this->bigqueryDateShardedSpec = $bigqueryDateShardedSpec;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryDateShardedSpec
   */
  public function getBigqueryDateShardedSpec()
  {
    return $this->bigqueryDateShardedSpec;
  }
  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryTableSpec
   */
  public function setBigqueryTableSpec(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryTableSpec $bigqueryTableSpec)
  {
    $this->bigqueryTableSpec = $bigqueryTableSpec;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1BigQueryTableSpec
   */
  public function getBigqueryTableSpec()
  {
    return $this->bigqueryTableSpec;
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
  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1GcsFilesetSpec
   */
  public function setGcsFilesetSpec(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1GcsFilesetSpec $gcsFilesetSpec)
  {
    $this->gcsFilesetSpec = $gcsFilesetSpec;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1GcsFilesetSpec
   */
  public function getGcsFilesetSpec()
  {
    return $this->gcsFilesetSpec;
  }
  public function setIntegratedSystem($integratedSystem)
  {
    $this->integratedSystem = $integratedSystem;
  }
  public function getIntegratedSystem()
  {
    return $this->integratedSystem;
  }
  public function setLinkedResource($linkedResource)
  {
    $this->linkedResource = $linkedResource;
  }
  public function getLinkedResource()
  {
    return $this->linkedResource;
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
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Schema
   */
  public function setSchema(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1Schema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SystemTimestamps
   */
  public function setSourceSystemTimestamps(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SystemTimestamps $sourceSystemTimestamps)
  {
    $this->sourceSystemTimestamps = $sourceSystemTimestamps;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1SystemTimestamps
   */
  public function getSourceSystemTimestamps()
  {
    return $this->sourceSystemTimestamps;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1UsageSignal
   */
  public function setUsageSignal(Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1UsageSignal $usageSignal)
  {
    $this->usageSignal = $usageSignal;
  }
  /**
   * @return Google_Service_DataCatalog_GoogleCloudDatacatalogV1beta1UsageSignal
   */
  public function getUsageSignal()
  {
    return $this->usageSignal;
  }
  public function setUserSpecifiedSystem($userSpecifiedSystem)
  {
    $this->userSpecifiedSystem = $userSpecifiedSystem;
  }
  public function getUserSpecifiedSystem()
  {
    return $this->userSpecifiedSystem;
  }
  public function setUserSpecifiedType($userSpecifiedType)
  {
    $this->userSpecifiedType = $userSpecifiedType;
  }
  public function getUserSpecifiedType()
  {
    return $this->userSpecifiedType;
  }
}
