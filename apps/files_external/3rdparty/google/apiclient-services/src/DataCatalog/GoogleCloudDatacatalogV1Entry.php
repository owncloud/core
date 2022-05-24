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

namespace Google\Service\DataCatalog;

class GoogleCloudDatacatalogV1Entry extends \Google\Model
{
  protected $bigqueryDateShardedSpecType = GoogleCloudDatacatalogV1BigQueryDateShardedSpec::class;
  protected $bigqueryDateShardedSpecDataType = '';
  protected $bigqueryTableSpecType = GoogleCloudDatacatalogV1BigQueryTableSpec::class;
  protected $bigqueryTableSpecDataType = '';
  protected $businessContextType = GoogleCloudDatacatalogV1BusinessContext::class;
  protected $businessContextDataType = '';
  protected $dataSourceType = GoogleCloudDatacatalogV1DataSource::class;
  protected $dataSourceDataType = '';
  protected $dataSourceConnectionSpecType = GoogleCloudDatacatalogV1DataSourceConnectionSpec::class;
  protected $dataSourceConnectionSpecDataType = '';
  protected $databaseTableSpecType = GoogleCloudDatacatalogV1DatabaseTableSpec::class;
  protected $databaseTableSpecDataType = '';
  /**
   * @var string
   */
  public $description;
  /**
   * @var string
   */
  public $displayName;
  protected $filesetSpecType = GoogleCloudDatacatalogV1FilesetSpec::class;
  protected $filesetSpecDataType = '';
  /**
   * @var string
   */
  public $fullyQualifiedName;
  protected $gcsFilesetSpecType = GoogleCloudDatacatalogV1GcsFilesetSpec::class;
  protected $gcsFilesetSpecDataType = '';
  /**
   * @var string
   */
  public $integratedSystem;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $linkedResource;
  /**
   * @var string
   */
  public $name;
  protected $personalDetailsType = GoogleCloudDatacatalogV1PersonalDetails::class;
  protected $personalDetailsDataType = '';
  protected $routineSpecType = GoogleCloudDatacatalogV1RoutineSpec::class;
  protected $routineSpecDataType = '';
  protected $schemaType = GoogleCloudDatacatalogV1Schema::class;
  protected $schemaDataType = '';
  protected $sourceSystemTimestampsType = GoogleCloudDatacatalogV1SystemTimestamps::class;
  protected $sourceSystemTimestampsDataType = '';
  /**
   * @var string
   */
  public $type;
  protected $usageSignalType = GoogleCloudDatacatalogV1UsageSignal::class;
  protected $usageSignalDataType = '';
  /**
   * @var string
   */
  public $userSpecifiedSystem;
  /**
   * @var string
   */
  public $userSpecifiedType;

  /**
   * @param GoogleCloudDatacatalogV1BigQueryDateShardedSpec
   */
  public function setBigqueryDateShardedSpec(GoogleCloudDatacatalogV1BigQueryDateShardedSpec $bigqueryDateShardedSpec)
  {
    $this->bigqueryDateShardedSpec = $bigqueryDateShardedSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1BigQueryDateShardedSpec
   */
  public function getBigqueryDateShardedSpec()
  {
    return $this->bigqueryDateShardedSpec;
  }
  /**
   * @param GoogleCloudDatacatalogV1BigQueryTableSpec
   */
  public function setBigqueryTableSpec(GoogleCloudDatacatalogV1BigQueryTableSpec $bigqueryTableSpec)
  {
    $this->bigqueryTableSpec = $bigqueryTableSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1BigQueryTableSpec
   */
  public function getBigqueryTableSpec()
  {
    return $this->bigqueryTableSpec;
  }
  /**
   * @param GoogleCloudDatacatalogV1BusinessContext
   */
  public function setBusinessContext(GoogleCloudDatacatalogV1BusinessContext $businessContext)
  {
    $this->businessContext = $businessContext;
  }
  /**
   * @return GoogleCloudDatacatalogV1BusinessContext
   */
  public function getBusinessContext()
  {
    return $this->businessContext;
  }
  /**
   * @param GoogleCloudDatacatalogV1DataSource
   */
  public function setDataSource(GoogleCloudDatacatalogV1DataSource $dataSource)
  {
    $this->dataSource = $dataSource;
  }
  /**
   * @return GoogleCloudDatacatalogV1DataSource
   */
  public function getDataSource()
  {
    return $this->dataSource;
  }
  /**
   * @param GoogleCloudDatacatalogV1DataSourceConnectionSpec
   */
  public function setDataSourceConnectionSpec(GoogleCloudDatacatalogV1DataSourceConnectionSpec $dataSourceConnectionSpec)
  {
    $this->dataSourceConnectionSpec = $dataSourceConnectionSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1DataSourceConnectionSpec
   */
  public function getDataSourceConnectionSpec()
  {
    return $this->dataSourceConnectionSpec;
  }
  /**
   * @param GoogleCloudDatacatalogV1DatabaseTableSpec
   */
  public function setDatabaseTableSpec(GoogleCloudDatacatalogV1DatabaseTableSpec $databaseTableSpec)
  {
    $this->databaseTableSpec = $databaseTableSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1DatabaseTableSpec
   */
  public function getDatabaseTableSpec()
  {
    return $this->databaseTableSpec;
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
   * @param GoogleCloudDatacatalogV1FilesetSpec
   */
  public function setFilesetSpec(GoogleCloudDatacatalogV1FilesetSpec $filesetSpec)
  {
    $this->filesetSpec = $filesetSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1FilesetSpec
   */
  public function getFilesetSpec()
  {
    return $this->filesetSpec;
  }
  /**
   * @param string
   */
  public function setFullyQualifiedName($fullyQualifiedName)
  {
    $this->fullyQualifiedName = $fullyQualifiedName;
  }
  /**
   * @return string
   */
  public function getFullyQualifiedName()
  {
    return $this->fullyQualifiedName;
  }
  /**
   * @param GoogleCloudDatacatalogV1GcsFilesetSpec
   */
  public function setGcsFilesetSpec(GoogleCloudDatacatalogV1GcsFilesetSpec $gcsFilesetSpec)
  {
    $this->gcsFilesetSpec = $gcsFilesetSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1GcsFilesetSpec
   */
  public function getGcsFilesetSpec()
  {
    return $this->gcsFilesetSpec;
  }
  /**
   * @param string
   */
  public function setIntegratedSystem($integratedSystem)
  {
    $this->integratedSystem = $integratedSystem;
  }
  /**
   * @return string
   */
  public function getIntegratedSystem()
  {
    return $this->integratedSystem;
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
   * @param string
   */
  public function setLinkedResource($linkedResource)
  {
    $this->linkedResource = $linkedResource;
  }
  /**
   * @return string
   */
  public function getLinkedResource()
  {
    return $this->linkedResource;
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
   * @param GoogleCloudDatacatalogV1PersonalDetails
   */
  public function setPersonalDetails(GoogleCloudDatacatalogV1PersonalDetails $personalDetails)
  {
    $this->personalDetails = $personalDetails;
  }
  /**
   * @return GoogleCloudDatacatalogV1PersonalDetails
   */
  public function getPersonalDetails()
  {
    return $this->personalDetails;
  }
  /**
   * @param GoogleCloudDatacatalogV1RoutineSpec
   */
  public function setRoutineSpec(GoogleCloudDatacatalogV1RoutineSpec $routineSpec)
  {
    $this->routineSpec = $routineSpec;
  }
  /**
   * @return GoogleCloudDatacatalogV1RoutineSpec
   */
  public function getRoutineSpec()
  {
    return $this->routineSpec;
  }
  /**
   * @param GoogleCloudDatacatalogV1Schema
   */
  public function setSchema(GoogleCloudDatacatalogV1Schema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return GoogleCloudDatacatalogV1Schema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param GoogleCloudDatacatalogV1SystemTimestamps
   */
  public function setSourceSystemTimestamps(GoogleCloudDatacatalogV1SystemTimestamps $sourceSystemTimestamps)
  {
    $this->sourceSystemTimestamps = $sourceSystemTimestamps;
  }
  /**
   * @return GoogleCloudDatacatalogV1SystemTimestamps
   */
  public function getSourceSystemTimestamps()
  {
    return $this->sourceSystemTimestamps;
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
  /**
   * @param GoogleCloudDatacatalogV1UsageSignal
   */
  public function setUsageSignal(GoogleCloudDatacatalogV1UsageSignal $usageSignal)
  {
    $this->usageSignal = $usageSignal;
  }
  /**
   * @return GoogleCloudDatacatalogV1UsageSignal
   */
  public function getUsageSignal()
  {
    return $this->usageSignal;
  }
  /**
   * @param string
   */
  public function setUserSpecifiedSystem($userSpecifiedSystem)
  {
    $this->userSpecifiedSystem = $userSpecifiedSystem;
  }
  /**
   * @return string
   */
  public function getUserSpecifiedSystem()
  {
    return $this->userSpecifiedSystem;
  }
  /**
   * @param string
   */
  public function setUserSpecifiedType($userSpecifiedType)
  {
    $this->userSpecifiedType = $userSpecifiedType;
  }
  /**
   * @return string
   */
  public function getUserSpecifiedType()
  {
    return $this->userSpecifiedType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatacatalogV1Entry::class, 'Google_Service_DataCatalog_GoogleCloudDatacatalogV1Entry');
