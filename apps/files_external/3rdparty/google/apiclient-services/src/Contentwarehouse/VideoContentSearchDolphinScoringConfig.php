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

namespace Google\Service\Contentwarehouse;

class VideoContentSearchDolphinScoringConfig extends \Google\Collection
{
  protected $collection_key = 'ensembleModelNames';
  /**
   * @var string
   */
  public $descriptivenessOutputKey;
  /**
   * @var string[]
   */
  public $ensembleModelNames;
  /**
   * @var int
   */
  public $inferenceBatchSize;
  /**
   * @var string
   */
  public $inferenceMethod;
  /**
   * @var int
   */
  public $maxRpcRetries;
  /**
   * @var string
   */
  public $modelName;
  /**
   * @var string
   */
  public $modelPath;
  /**
   * @var string
   */
  public $outputKey;
  public $rpcDeadlineSeconds;
  /**
   * @var string
   */
  public $serviceBns;
  /**
   * @var string
   */
  public $usefulnessOutputKey;

  /**
   * @param string
   */
  public function setDescriptivenessOutputKey($descriptivenessOutputKey)
  {
    $this->descriptivenessOutputKey = $descriptivenessOutputKey;
  }
  /**
   * @return string
   */
  public function getDescriptivenessOutputKey()
  {
    return $this->descriptivenessOutputKey;
  }
  /**
   * @param string[]
   */
  public function setEnsembleModelNames($ensembleModelNames)
  {
    $this->ensembleModelNames = $ensembleModelNames;
  }
  /**
   * @return string[]
   */
  public function getEnsembleModelNames()
  {
    return $this->ensembleModelNames;
  }
  /**
   * @param int
   */
  public function setInferenceBatchSize($inferenceBatchSize)
  {
    $this->inferenceBatchSize = $inferenceBatchSize;
  }
  /**
   * @return int
   */
  public function getInferenceBatchSize()
  {
    return $this->inferenceBatchSize;
  }
  /**
   * @param string
   */
  public function setInferenceMethod($inferenceMethod)
  {
    $this->inferenceMethod = $inferenceMethod;
  }
  /**
   * @return string
   */
  public function getInferenceMethod()
  {
    return $this->inferenceMethod;
  }
  /**
   * @param int
   */
  public function setMaxRpcRetries($maxRpcRetries)
  {
    $this->maxRpcRetries = $maxRpcRetries;
  }
  /**
   * @return int
   */
  public function getMaxRpcRetries()
  {
    return $this->maxRpcRetries;
  }
  /**
   * @param string
   */
  public function setModelName($modelName)
  {
    $this->modelName = $modelName;
  }
  /**
   * @return string
   */
  public function getModelName()
  {
    return $this->modelName;
  }
  /**
   * @param string
   */
  public function setModelPath($modelPath)
  {
    $this->modelPath = $modelPath;
  }
  /**
   * @return string
   */
  public function getModelPath()
  {
    return $this->modelPath;
  }
  /**
   * @param string
   */
  public function setOutputKey($outputKey)
  {
    $this->outputKey = $outputKey;
  }
  /**
   * @return string
   */
  public function getOutputKey()
  {
    return $this->outputKey;
  }
  public function setRpcDeadlineSeconds($rpcDeadlineSeconds)
  {
    $this->rpcDeadlineSeconds = $rpcDeadlineSeconds;
  }
  public function getRpcDeadlineSeconds()
  {
    return $this->rpcDeadlineSeconds;
  }
  /**
   * @param string
   */
  public function setServiceBns($serviceBns)
  {
    $this->serviceBns = $serviceBns;
  }
  /**
   * @return string
   */
  public function getServiceBns()
  {
    return $this->serviceBns;
  }
  /**
   * @param string
   */
  public function setUsefulnessOutputKey($usefulnessOutputKey)
  {
    $this->usefulnessOutputKey = $usefulnessOutputKey;
  }
  /**
   * @return string
   */
  public function getUsefulnessOutputKey()
  {
    return $this->usefulnessOutputKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchDolphinScoringConfig::class, 'Google_Service_Contentwarehouse_VideoContentSearchDolphinScoringConfig');
