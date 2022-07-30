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

namespace Google\Service\Bigquery;

class Table extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "numActiveLogicalBytes" => "num_active_logical_bytes",
        "numActivePhysicalBytes" => "num_active_physical_bytes",
        "numLongTermLogicalBytes" => "num_long_term_logical_bytes",
        "numLongTermPhysicalBytes" => "num_long_term_physical_bytes",
        "numPartitions" => "num_partitions",
        "numTimeTravelPhysicalBytes" => "num_time_travel_physical_bytes",
        "numTotalLogicalBytes" => "num_total_logical_bytes",
        "numTotalPhysicalBytes" => "num_total_physical_bytes",
  ];
  protected $cloneDefinitionType = CloneDefinition::class;
  protected $cloneDefinitionDataType = '';
  protected $clusteringType = Clustering::class;
  protected $clusteringDataType = '';
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $defaultCollation;
  /**
   * @var string
   */
  public $description;
  protected $encryptionConfigurationType = EncryptionConfiguration::class;
  protected $encryptionConfigurationDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $expirationTime;
  protected $externalDataConfigurationType = ExternalDataConfiguration::class;
  protected $externalDataConfigurationDataType = '';
  /**
   * @var string
   */
  public $friendlyName;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $lastModifiedTime;
  /**
   * @var string
   */
  public $location;
  protected $materializedViewType = MaterializedViewDefinition::class;
  protected $materializedViewDataType = '';
  /**
   * @var string
   */
  public $maxStaleness;
  protected $modelType = ModelDefinition::class;
  protected $modelDataType = '';
  /**
   * @var string
   */
  public $numBytes;
  /**
   * @var string
   */
  public $numLongTermBytes;
  /**
   * @var string
   */
  public $numPhysicalBytes;
  /**
   * @var string
   */
  public $numRows;
  /**
   * @var string
   */
  public $numActiveLogicalBytes;
  /**
   * @var string
   */
  public $numActivePhysicalBytes;
  /**
   * @var string
   */
  public $numLongTermLogicalBytes;
  /**
   * @var string
   */
  public $numLongTermPhysicalBytes;
  /**
   * @var string
   */
  public $numPartitions;
  /**
   * @var string
   */
  public $numTimeTravelPhysicalBytes;
  /**
   * @var string
   */
  public $numTotalLogicalBytes;
  /**
   * @var string
   */
  public $numTotalPhysicalBytes;
  protected $rangePartitioningType = RangePartitioning::class;
  protected $rangePartitioningDataType = '';
  /**
   * @var bool
   */
  public $requirePartitionFilter;
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  /**
   * @var string
   */
  public $selfLink;
  protected $snapshotDefinitionType = SnapshotDefinition::class;
  protected $snapshotDefinitionDataType = '';
  protected $streamingBufferType = Streamingbuffer::class;
  protected $streamingBufferDataType = '';
  protected $tableReferenceType = TableReference::class;
  protected $tableReferenceDataType = '';
  protected $timePartitioningType = TimePartitioning::class;
  protected $timePartitioningDataType = '';
  /**
   * @var string
   */
  public $type;
  protected $viewType = ViewDefinition::class;
  protected $viewDataType = '';

  /**
   * @param CloneDefinition
   */
  public function setCloneDefinition(CloneDefinition $cloneDefinition)
  {
    $this->cloneDefinition = $cloneDefinition;
  }
  /**
   * @return CloneDefinition
   */
  public function getCloneDefinition()
  {
    return $this->cloneDefinition;
  }
  /**
   * @param Clustering
   */
  public function setClustering(Clustering $clustering)
  {
    $this->clustering = $clustering;
  }
  /**
   * @return Clustering
   */
  public function getClustering()
  {
    return $this->clustering;
  }
  /**
   * @param string
   */
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  /**
   * @return string
   */
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  /**
   * @param string
   */
  public function setDefaultCollation($defaultCollation)
  {
    $this->defaultCollation = $defaultCollation;
  }
  /**
   * @return string
   */
  public function getDefaultCollation()
  {
    return $this->defaultCollation;
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
   * @param EncryptionConfiguration
   */
  public function setEncryptionConfiguration(EncryptionConfiguration $encryptionConfiguration)
  {
    $this->encryptionConfiguration = $encryptionConfiguration;
  }
  /**
   * @return EncryptionConfiguration
   */
  public function getEncryptionConfiguration()
  {
    return $this->encryptionConfiguration;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  /**
   * @return string
   */
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  /**
   * @param ExternalDataConfiguration
   */
  public function setExternalDataConfiguration(ExternalDataConfiguration $externalDataConfiguration)
  {
    $this->externalDataConfiguration = $externalDataConfiguration;
  }
  /**
   * @return ExternalDataConfiguration
   */
  public function getExternalDataConfiguration()
  {
    return $this->externalDataConfiguration;
  }
  /**
   * @param string
   */
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  /**
   * @return string
   */
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
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
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  /**
   * @return string
   */
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  /**
   * @param string
   */
  public function setLocation($location)
  {
    $this->location = $location;
  }
  /**
   * @return string
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param MaterializedViewDefinition
   */
  public function setMaterializedView(MaterializedViewDefinition $materializedView)
  {
    $this->materializedView = $materializedView;
  }
  /**
   * @return MaterializedViewDefinition
   */
  public function getMaterializedView()
  {
    return $this->materializedView;
  }
  /**
   * @param string
   */
  public function setMaxStaleness($maxStaleness)
  {
    $this->maxStaleness = $maxStaleness;
  }
  /**
   * @return string
   */
  public function getMaxStaleness()
  {
    return $this->maxStaleness;
  }
  /**
   * @param ModelDefinition
   */
  public function setModel(ModelDefinition $model)
  {
    $this->model = $model;
  }
  /**
   * @return ModelDefinition
   */
  public function getModel()
  {
    return $this->model;
  }
  /**
   * @param string
   */
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  /**
   * @return string
   */
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  /**
   * @param string
   */
  public function setNumLongTermBytes($numLongTermBytes)
  {
    $this->numLongTermBytes = $numLongTermBytes;
  }
  /**
   * @return string
   */
  public function getNumLongTermBytes()
  {
    return $this->numLongTermBytes;
  }
  /**
   * @param string
   */
  public function setNumPhysicalBytes($numPhysicalBytes)
  {
    $this->numPhysicalBytes = $numPhysicalBytes;
  }
  /**
   * @return string
   */
  public function getNumPhysicalBytes()
  {
    return $this->numPhysicalBytes;
  }
  /**
   * @param string
   */
  public function setNumRows($numRows)
  {
    $this->numRows = $numRows;
  }
  /**
   * @return string
   */
  public function getNumRows()
  {
    return $this->numRows;
  }
  /**
   * @param string
   */
  public function setNumActiveLogicalBytes($numActiveLogicalBytes)
  {
    $this->numActiveLogicalBytes = $numActiveLogicalBytes;
  }
  /**
   * @return string
   */
  public function getNumActiveLogicalBytes()
  {
    return $this->numActiveLogicalBytes;
  }
  /**
   * @param string
   */
  public function setNumActivePhysicalBytes($numActivePhysicalBytes)
  {
    $this->numActivePhysicalBytes = $numActivePhysicalBytes;
  }
  /**
   * @return string
   */
  public function getNumActivePhysicalBytes()
  {
    return $this->numActivePhysicalBytes;
  }
  /**
   * @param string
   */
  public function setNumLongTermLogicalBytes($numLongTermLogicalBytes)
  {
    $this->numLongTermLogicalBytes = $numLongTermLogicalBytes;
  }
  /**
   * @return string
   */
  public function getNumLongTermLogicalBytes()
  {
    return $this->numLongTermLogicalBytes;
  }
  /**
   * @param string
   */
  public function setNumLongTermPhysicalBytes($numLongTermPhysicalBytes)
  {
    $this->numLongTermPhysicalBytes = $numLongTermPhysicalBytes;
  }
  /**
   * @return string
   */
  public function getNumLongTermPhysicalBytes()
  {
    return $this->numLongTermPhysicalBytes;
  }
  /**
   * @param string
   */
  public function setNumPartitions($numPartitions)
  {
    $this->numPartitions = $numPartitions;
  }
  /**
   * @return string
   */
  public function getNumPartitions()
  {
    return $this->numPartitions;
  }
  /**
   * @param string
   */
  public function setNumTimeTravelPhysicalBytes($numTimeTravelPhysicalBytes)
  {
    $this->numTimeTravelPhysicalBytes = $numTimeTravelPhysicalBytes;
  }
  /**
   * @return string
   */
  public function getNumTimeTravelPhysicalBytes()
  {
    return $this->numTimeTravelPhysicalBytes;
  }
  /**
   * @param string
   */
  public function setNumTotalLogicalBytes($numTotalLogicalBytes)
  {
    $this->numTotalLogicalBytes = $numTotalLogicalBytes;
  }
  /**
   * @return string
   */
  public function getNumTotalLogicalBytes()
  {
    return $this->numTotalLogicalBytes;
  }
  /**
   * @param string
   */
  public function setNumTotalPhysicalBytes($numTotalPhysicalBytes)
  {
    $this->numTotalPhysicalBytes = $numTotalPhysicalBytes;
  }
  /**
   * @return string
   */
  public function getNumTotalPhysicalBytes()
  {
    return $this->numTotalPhysicalBytes;
  }
  /**
   * @param RangePartitioning
   */
  public function setRangePartitioning(RangePartitioning $rangePartitioning)
  {
    $this->rangePartitioning = $rangePartitioning;
  }
  /**
   * @return RangePartitioning
   */
  public function getRangePartitioning()
  {
    return $this->rangePartitioning;
  }
  /**
   * @param bool
   */
  public function setRequirePartitionFilter($requirePartitionFilter)
  {
    $this->requirePartitionFilter = $requirePartitionFilter;
  }
  /**
   * @return bool
   */
  public function getRequirePartitionFilter()
  {
    return $this->requirePartitionFilter;
  }
  /**
   * @param TableSchema
   */
  public function setSchema(TableSchema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return TableSchema
   */
  public function getSchema()
  {
    return $this->schema;
  }
  /**
   * @param string
   */
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  /**
   * @return string
   */
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  /**
   * @param SnapshotDefinition
   */
  public function setSnapshotDefinition(SnapshotDefinition $snapshotDefinition)
  {
    $this->snapshotDefinition = $snapshotDefinition;
  }
  /**
   * @return SnapshotDefinition
   */
  public function getSnapshotDefinition()
  {
    return $this->snapshotDefinition;
  }
  /**
   * @param Streamingbuffer
   */
  public function setStreamingBuffer(Streamingbuffer $streamingBuffer)
  {
    $this->streamingBuffer = $streamingBuffer;
  }
  /**
   * @return Streamingbuffer
   */
  public function getStreamingBuffer()
  {
    return $this->streamingBuffer;
  }
  /**
   * @param TableReference
   */
  public function setTableReference(TableReference $tableReference)
  {
    $this->tableReference = $tableReference;
  }
  /**
   * @return TableReference
   */
  public function getTableReference()
  {
    return $this->tableReference;
  }
  /**
   * @param TimePartitioning
   */
  public function setTimePartitioning(TimePartitioning $timePartitioning)
  {
    $this->timePartitioning = $timePartitioning;
  }
  /**
   * @return TimePartitioning
   */
  public function getTimePartitioning()
  {
    return $this->timePartitioning;
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
   * @param ViewDefinition
   */
  public function setView(ViewDefinition $view)
  {
    $this->view = $view;
  }
  /**
   * @return ViewDefinition
   */
  public function getView()
  {
    return $this->view;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Table::class, 'Google_Service_Bigquery_Table');
