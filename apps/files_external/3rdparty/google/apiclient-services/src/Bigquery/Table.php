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
  protected $clusteringType = Clustering::class;
  protected $clusteringDataType = '';
  public $creationTime;
  public $defaultCollation;
  public $description;
  protected $encryptionConfigurationType = EncryptionConfiguration::class;
  protected $encryptionConfigurationDataType = '';
  public $etag;
  public $expirationTime;
  protected $externalDataConfigurationType = ExternalDataConfiguration::class;
  protected $externalDataConfigurationDataType = '';
  public $friendlyName;
  public $id;
  public $kind;
  public $labels;
  public $lastModifiedTime;
  public $location;
  protected $materializedViewType = MaterializedViewDefinition::class;
  protected $materializedViewDataType = '';
  protected $modelType = ModelDefinition::class;
  protected $modelDataType = '';
  public $numBytes;
  public $numLongTermBytes;
  public $numPhysicalBytes;
  public $numRows;
  protected $rangePartitioningType = RangePartitioning::class;
  protected $rangePartitioningDataType = '';
  public $requirePartitionFilter;
  protected $schemaType = TableSchema::class;
  protected $schemaDataType = '';
  public $selfLink;
  protected $snapshotDefinitionType = SnapshotDefinition::class;
  protected $snapshotDefinitionDataType = '';
  protected $streamingBufferType = Streamingbuffer::class;
  protected $streamingBufferDataType = '';
  protected $tableReferenceType = TableReference::class;
  protected $tableReferenceDataType = '';
  protected $timePartitioningType = TimePartitioning::class;
  protected $timePartitioningDataType = '';
  public $type;
  protected $viewType = ViewDefinition::class;
  protected $viewDataType = '';

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
  public function setCreationTime($creationTime)
  {
    $this->creationTime = $creationTime;
  }
  public function getCreationTime()
  {
    return $this->creationTime;
  }
  public function setDefaultCollation($defaultCollation)
  {
    $this->defaultCollation = $defaultCollation;
  }
  public function getDefaultCollation()
  {
    return $this->defaultCollation;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
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
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
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
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastModifiedTime($lastModifiedTime)
  {
    $this->lastModifiedTime = $lastModifiedTime;
  }
  public function getLastModifiedTime()
  {
    return $this->lastModifiedTime;
  }
  public function setLocation($location)
  {
    $this->location = $location;
  }
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
  public function setNumBytes($numBytes)
  {
    $this->numBytes = $numBytes;
  }
  public function getNumBytes()
  {
    return $this->numBytes;
  }
  public function setNumLongTermBytes($numLongTermBytes)
  {
    $this->numLongTermBytes = $numLongTermBytes;
  }
  public function getNumLongTermBytes()
  {
    return $this->numLongTermBytes;
  }
  public function setNumPhysicalBytes($numPhysicalBytes)
  {
    $this->numPhysicalBytes = $numPhysicalBytes;
  }
  public function getNumPhysicalBytes()
  {
    return $this->numPhysicalBytes;
  }
  public function setNumRows($numRows)
  {
    $this->numRows = $numRows;
  }
  public function getNumRows()
  {
    return $this->numRows;
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
  public function setRequirePartitionFilter($requirePartitionFilter)
  {
    $this->requirePartitionFilter = $requirePartitionFilter;
  }
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
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
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
  public function setType($type)
  {
    $this->type = $type;
  }
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
