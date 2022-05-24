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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1PredictionInput extends \Google\Collection
{
  protected $collection_key = 'inputPaths';
  /**
   * @var string
   */
  public $batchSize;
  /**
   * @var string
   */
  public $dataFormat;
  /**
   * @var string[]
   */
  public $inputPaths;
  /**
   * @var string
   */
  public $maxWorkerCount;
  /**
   * @var string
   */
  public $modelName;
  /**
   * @var string
   */
  public $outputDataFormat;
  /**
   * @var string
   */
  public $outputPath;
  /**
   * @var string
   */
  public $region;
  /**
   * @var string
   */
  public $runtimeVersion;
  /**
   * @var string
   */
  public $signatureName;
  /**
   * @var string
   */
  public $uri;
  /**
   * @var string
   */
  public $versionName;

  /**
   * @param string
   */
  public function setBatchSize($batchSize)
  {
    $this->batchSize = $batchSize;
  }
  /**
   * @return string
   */
  public function getBatchSize()
  {
    return $this->batchSize;
  }
  /**
   * @param string
   */
  public function setDataFormat($dataFormat)
  {
    $this->dataFormat = $dataFormat;
  }
  /**
   * @return string
   */
  public function getDataFormat()
  {
    return $this->dataFormat;
  }
  /**
   * @param string[]
   */
  public function setInputPaths($inputPaths)
  {
    $this->inputPaths = $inputPaths;
  }
  /**
   * @return string[]
   */
  public function getInputPaths()
  {
    return $this->inputPaths;
  }
  /**
   * @param string
   */
  public function setMaxWorkerCount($maxWorkerCount)
  {
    $this->maxWorkerCount = $maxWorkerCount;
  }
  /**
   * @return string
   */
  public function getMaxWorkerCount()
  {
    return $this->maxWorkerCount;
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
  public function setOutputDataFormat($outputDataFormat)
  {
    $this->outputDataFormat = $outputDataFormat;
  }
  /**
   * @return string
   */
  public function getOutputDataFormat()
  {
    return $this->outputDataFormat;
  }
  /**
   * @param string
   */
  public function setOutputPath($outputPath)
  {
    $this->outputPath = $outputPath;
  }
  /**
   * @return string
   */
  public function getOutputPath()
  {
    return $this->outputPath;
  }
  /**
   * @param string
   */
  public function setRegion($region)
  {
    $this->region = $region;
  }
  /**
   * @return string
   */
  public function getRegion()
  {
    return $this->region;
  }
  /**
   * @param string
   */
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  /**
   * @return string
   */
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
  /**
   * @param string
   */
  public function setSignatureName($signatureName)
  {
    $this->signatureName = $signatureName;
  }
  /**
   * @return string
   */
  public function getSignatureName()
  {
    return $this->signatureName;
  }
  /**
   * @param string
   */
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  /**
   * @return string
   */
  public function getUri()
  {
    return $this->uri;
  }
  /**
   * @param string
   */
  public function setVersionName($versionName)
  {
    $this->versionName = $versionName;
  }
  /**
   * @return string
   */
  public function getVersionName()
  {
    return $this->versionName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1PredictionInput::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1PredictionInput');
