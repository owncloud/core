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

class Google_Service_Bigquery_Table extends Google_Model
{
  protected $clusteringType = 'Google_Service_Bigquery_Clustering';
  protected $clusteringDataType = '';
  public $creationTime;
  public $description;
  protected $encryptionConfigurationType = 'Google_Service_Bigquery_EncryptionConfiguration';
  protected $encryptionConfigurationDataType = '';
  public $etag;
  public $expirationTime;
  protected $externalDataConfigurationType = 'Google_Service_Bigquery_ExternalDataConfiguration';
  protected $externalDataConfigurationDataType = '';
  public $friendlyName;
  public $id;
  public $kind;
  public $labels;
  public $lastModifiedTime;
  public $location;
  protected $materializedViewType = 'Google_Service_Bigquery_MaterializedViewDefinition';
  protected $materializedViewDataType = '';
  protected $modelType = 'Google_Service_Bigquery_ModelDefinition';
  protected $modelDataType = '';
  public $numBytes;
  public $numLongTermBytes;
  public $numPhysicalBytes;
  public $numRows;
  protected $rangePartitioningType = 'Google_Service_Bigquery_RangePartitioning';
  protected $rangePartitioningDataType = '';
  public $requirePartitionFilter;
  protected $schemaType = 'Google_Service_Bigquery_TableSchema';
  protected $schemaDataType = '';
  public $selfLink;
  protected $snapshotDefinitionType = 'Google_Service_Bigquery_SnapshotDefinition';
  protected $snapshotDefinitionDataType = '';
  protected $streamingBufferType = 'Google_Service_Bigquery_Streamingbuffer';
  protected $streamingBufferDataType = '';
  protected $tableReferenceType = 'Google_Service_Bigquery_TableReference';
  protected $tableReferenceDataType = '';
  protected $timePartitioningType = 'Google_Service_Bigquery_TimePartitioning';
  protected $timePartitioningDataType = '';
  public $type;
  protected $viewType = 'Google_Service_Bigquery_ViewDefinition';
  protected $viewDataType = '';

  /**
   * @param Google_Service_Bigquery_Clustering
   */
  public function setClustering(Google_Service_Bigquery_Clustering $clustering)
  {
    $this->clustering = $clustering;
  }
  /**
   * @return Google_Service_Bigquery_Clustering
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
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param Google_Service_Bigquery_EncryptionConfiguration
   */
  public function setEncryptionConfiguration(Google_Service_Bigquery_EncryptionConfiguration $encryptionConfiguration)
  {
    $this->encryptionConfiguration = $encryptionConfiguration;
  }
  /**
   * @return Google_Service_Bigquery_EncryptionConfiguration
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
   * @param Google_Service_Bigquery_ExternalDataConfiguration
   */
  public function setExternalDataConfiguration(Google_Service_Bigquery_ExternalDataConfiguration $externalDataConfiguration)
  {
    $this->externalDataConfiguration = $externalDataConfiguration;
  }
  /**
   * @return Google_Service_Bigquery_ExternalDataConfiguration
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
   * @param Google_Service_Bigquery_MaterializedViewDefinition
   */
  public function setMaterializedView(Google_Service_Bigquery_MaterializedViewDefinition $materializedView)
  {
    $this->materializedView = $materializedView;
  }
  /**
   * @return Google_Service_Bigquery_MaterializedViewDefinition
   */
  public function getMaterializedView()
  {
    return $this->materializedView;
  }
  /**
   * @param Google_Service_Bigquery_ModelDefinition
   */
  public function setModel(Google_Service_Bigquery_ModelDefinition $model)
  {
    $this->model = $model;
  }
  /**
   * @return Google_Service_Bigquery_ModelDefinition
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
   * @param Google_Service_Bigquery_RangePartitioning
   */
  public function setRangePartitioning(Google_Service_Bigquery_RangePartitioning $rangePartitioning)
  {
    $this->rangePartitioning = $rangePartitioning;
  }
  /**
   * @return Google_Service_Bigquery_RangePartitioning
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
   * @param Google_Service_Bigquery_TableSchema
   */
  public function setSchema(Google_Service_Bigquery_TableSchema $schema)
  {
    $this->schema = $schema;
  }
  /**
   * @return Google_Service_Bigquery_TableSchema
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
   * @param Google_Service_Bigquery_SnapshotDefinition
   */
  public function setSnapshotDefinition(Google_Service_Bigquery_SnapshotDefinition $snapshotDefinition)
  {
    $this->snapshotDefinition = $snapshotDefinition;
  }
  /**
   * @return Google_Service_Bigquery_SnapshotDefinition
   */
  public function getSnapshotDefinition()
  {
    return $this->snapshotDefinition;
  }
  /**
   * @param Google_Service_Bigquery_Streamingbuffer
   */
  public function setStreamingBuffer(Google_Service_Bigquery_Streamingbuffer $streamingBuffer)
  {
    $this->streamingBuffer = $streamingBuffer;
  }
  /**
   * @return Google_Service_Bigquery_Streamingbuffer
   */
  public function getStreamingBuffer()
  {
    return $this->streamingBuffer;
  }
  /**
   * @param Google_Service_Bigquery_TableReference
   */
  public function setTableReference(Google_Service_Bigquery_TableReference $tableReference)
  {
    $this->tableReference = $tableReference;
  }
  /**
   * @return Google_Service_Bigquery_TableReference
   */
  public function getTableReference()
  {
    return $this->tableReference;
  }
  /**
   * @param Google_Service_Bigquery_TimePartitioning
   */
  public function setTimePartitioning(Google_Service_Bigquery_TimePartitioning $timePartitioning)
  {
    $this->timePartitioning = $timePartitioning;
  }
  /**
   * @return Google_Service_Bigquery_TimePartitioning
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
   * @param Google_Service_Bigquery_ViewDefinition
   */
  public function setView(Google_Service_Bigquery_ViewDefinition $view)
  {
    $this->view = $view;
  }
  /**
   * @return Google_Service_Bigquery_ViewDefinition
   */
  public function getView()
  {
    return $this->view;
  }
}
