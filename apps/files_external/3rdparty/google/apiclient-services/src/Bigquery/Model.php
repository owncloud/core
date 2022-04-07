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
  /**
   * @var string
   */
  public $bestTrialId;
  /**
   * @var string
   */
  public $creationTime;
  /**
   * @var string
   */
  public $defaultTrialId;
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
  protected $featureColumnsType = StandardSqlField::class;
  protected $featureColumnsDataType = 'array';
  /**
   * @var string
   */
  public $friendlyName;
  protected $hparamSearchSpacesType = HparamSearchSpaces::class;
  protected $hparamSearchSpacesDataType = '';
  protected $hparamTrialsType = HparamTuningTrial::class;
  protected $hparamTrialsDataType = 'array';
  protected $labelColumnsType = StandardSqlField::class;
  protected $labelColumnsDataType = 'array';
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
  protected $modelReferenceType = ModelReference::class;
  protected $modelReferenceDataType = '';
  /**
   * @var string
   */
  public $modelType;
  /**
   * @var string[]
   */
  public $optimalTrialIds;
  protected $trainingRunsType = TrainingRun::class;
  protected $trainingRunsDataType = 'array';

  /**
   * @param string
   */
  public function setBestTrialId($bestTrialId)
  {
    $this->bestTrialId = $bestTrialId;
  }
  /**
   * @return string
   */
  public function getBestTrialId()
  {
    return $this->bestTrialId;
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
  public function setDefaultTrialId($defaultTrialId)
  {
    $this->defaultTrialId = $defaultTrialId;
  }
  /**
   * @return string
   */
  public function getDefaultTrialId()
  {
    return $this->defaultTrialId;
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
   * @param HparamSearchSpaces
   */
  public function setHparamSearchSpaces(HparamSearchSpaces $hparamSearchSpaces)
  {
    $this->hparamSearchSpaces = $hparamSearchSpaces;
  }
  /**
   * @return HparamSearchSpaces
   */
  public function getHparamSearchSpaces()
  {
    return $this->hparamSearchSpaces;
  }
  /**
   * @param HparamTuningTrial[]
   */
  public function setHparamTrials($hparamTrials)
  {
    $this->hparamTrials = $hparamTrials;
  }
  /**
   * @return HparamTuningTrial[]
   */
  public function getHparamTrials()
  {
    return $this->hparamTrials;
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
  /**
   * @param string
   */
  public function setModelType($modelType)
  {
    $this->modelType = $modelType;
  }
  /**
   * @return string
   */
  public function getModelType()
  {
    return $this->modelType;
  }
  /**
   * @param string[]
   */
  public function setOptimalTrialIds($optimalTrialIds)
  {
    $this->optimalTrialIds = $optimalTrialIds;
  }
  /**
   * @return string[]
   */
  public function getOptimalTrialIds()
  {
    return $this->optimalTrialIds;
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
