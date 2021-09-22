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

class Model extends \Google\Collection
{
  protected $collection_key = 'trainingRuns';
  public $bestTrialId;
  public $creationTime;
  public $description;
  protected $encryptionConfigurationType = EncryptionConfiguration::class;
  protected $encryptionConfigurationDataType = '';
  public $etag;
  public $expirationTime;
  protected $featureColumnsType = StandardSqlField::class;
  protected $featureColumnsDataType = 'array';
  public $friendlyName;
  protected $labelColumnsType = StandardSqlField::class;
  protected $labelColumnsDataType = 'array';
  public $labels;
  public $lastModifiedTime;
  public $location;
  protected $modelReferenceType = ModelReference::class;
  protected $modelReferenceDataType = '';
  public $modelType;
  protected $trainingRunsType = TrainingRun::class;
  protected $trainingRunsDataType = 'array';

  public function setBestTrialId($bestTrialId)
  {
    $this->bestTrialId = $bestTrialId;
  }
  public function getBestTrialId()
  {
    return $this->bestTrialId;
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
   * @param StandardSqlField[]
   */
  public function setFeatureColumns($featureColumns)
  {
    $this->featureColumns = $featureColumns;
  }
  /**
   * @return StandardSqlField[]
   */
  public function getFeatureColumns()
  {
    return $this->featureColumns;
  }
  public function setFriendlyName($friendlyName)
  {
    $this->friendlyName = $friendlyName;
  }
  public function getFriendlyName()
  {
    return $this->friendlyName;
  }
  /**
   * @param StandardSqlField[]
   */
  public function setLabelColumns($labelColumns)
  {
    $this->labelColumns = $labelColumns;
  }
  /**
   * @return StandardSqlField[]
   */
  public function getLabelColumns()
  {
    return $this->labelColumns;
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
   * @param ModelReference
   */
  public function setModelReference(ModelReference $modelReference)
  {
    $this->modelReference = $modelReference;
  }
  /**
   * @return ModelReference
   */
  public function getModelReference()
  {
    return $this->modelReference;
  }
  public function setModelType($modelType)
  {
    $this->modelType = $modelType;
  }
  public function getModelType()
  {
    return $this->modelType;
  }
  /**
   * @param TrainingRun[]
   */
  public function setTrainingRuns($trainingRuns)
  {
    $this->trainingRuns = $trainingRuns;
  }
  /**
   * @return TrainingRun[]
   */
  public function getTrainingRuns()
  {
    return $this->trainingRuns;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Model::class, 'Google_Service_Bigquery_Model');
