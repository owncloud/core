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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2alphaModel extends \Google\Collection
{
  protected $collection_key = 'servingConfigLists';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $dataState;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $filteringOption;
  /**
   * @var string
   */
  public $lastTuneTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $optimizationObjective;
  protected $pageOptimizationConfigType = GoogleCloudRetailV2alphaModelPageOptimizationConfig::class;
  protected $pageOptimizationConfigDataType = '';
  /**
   * @var string
   */
  public $periodicTuningState;
  protected $servingConfigListsType = GoogleCloudRetailV2alphaModelServingConfigList::class;
  protected $servingConfigListsDataType = 'array';
  /**
   * @var string
   */
  public $servingState;
  /**
   * @var string
   */
  public $trainingState;
  /**
   * @var string
   */
  public $tuningOperation;
  /**
   * @var string
   */
  public $type;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDataState($dataState)
  {
    $this->dataState = $dataState;
  }
  /**
   * @return string
   */
  public function getDataState()
  {
    return $this->dataState;
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
   * @param string
   */
  public function setFilteringOption($filteringOption)
  {
    $this->filteringOption = $filteringOption;
  }
  /**
   * @return string
   */
  public function getFilteringOption()
  {
    return $this->filteringOption;
  }
  /**
   * @param string
   */
  public function setLastTuneTime($lastTuneTime)
  {
    $this->lastTuneTime = $lastTuneTime;
  }
  /**
   * @return string
   */
  public function getLastTuneTime()
  {
    return $this->lastTuneTime;
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
   * @param string
   */
  public function setOptimizationObjective($optimizationObjective)
  {
    $this->optimizationObjective = $optimizationObjective;
  }
  /**
   * @return string
   */
  public function getOptimizationObjective()
  {
    return $this->optimizationObjective;
  }
  /**
   * @param GoogleCloudRetailV2alphaModelPageOptimizationConfig
   */
  public function setPageOptimizationConfig(GoogleCloudRetailV2alphaModelPageOptimizationConfig $pageOptimizationConfig)
  {
    $this->pageOptimizationConfig = $pageOptimizationConfig;
  }
  /**
   * @return GoogleCloudRetailV2alphaModelPageOptimizationConfig
   */
  public function getPageOptimizationConfig()
  {
    return $this->pageOptimizationConfig;
  }
  /**
   * @param string
   */
  public function setPeriodicTuningState($periodicTuningState)
  {
    $this->periodicTuningState = $periodicTuningState;
  }
  /**
   * @return string
   */
  public function getPeriodicTuningState()
  {
    return $this->periodicTuningState;
  }
  /**
   * @param GoogleCloudRetailV2alphaModelServingConfigList[]
   */
  public function setServingConfigLists($servingConfigLists)
  {
    $this->servingConfigLists = $servingConfigLists;
  }
  /**
   * @return GoogleCloudRetailV2alphaModelServingConfigList[]
   */
  public function getServingConfigLists()
  {
    return $this->servingConfigLists;
  }
  /**
   * @param string
   */
  public function setServingState($servingState)
  {
    $this->servingState = $servingState;
  }
  /**
   * @return string
   */
  public function getServingState()
  {
    return $this->servingState;
  }
  /**
   * @param string
   */
  public function setTrainingState($trainingState)
  {
    $this->trainingState = $trainingState;
  }
  /**
   * @return string
   */
  public function getTrainingState()
  {
    return $this->trainingState;
  }
  /**
   * @param string
   */
  public function setTuningOperation($tuningOperation)
  {
    $this->tuningOperation = $tuningOperation;
  }
  /**
   * @return string
   */
  public function getTuningOperation()
  {
    return $this->tuningOperation;
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
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2alphaModel::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2alphaModel');
