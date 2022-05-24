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

namespace Google\Service\AIPlatformNotebooks;

class ExecutionTemplate extends \Google\Model
{
  protected $acceleratorConfigType = SchedulerAcceleratorConfig::class;
  protected $acceleratorConfigDataType = '';
  /**
   * @var string
   */
  public $containerImageUri;
  protected $dataprocParametersType = DataprocParameters::class;
  protected $dataprocParametersDataType = '';
  /**
   * @var string
   */
  public $inputNotebookFile;
  /**
   * @var string
   */
  public $jobType;
  /**
   * @var string
   */
  public $kernelSpec;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $masterType;
  /**
   * @var string
   */
  public $outputNotebookFolder;
  /**
   * @var string
   */
  public $parameters;
  /**
   * @var string
   */
  public $paramsYamlFile;
  /**
   * @var string
   */
  public $scaleTier;
  /**
   * @var string
   */
  public $serviceAccount;
  /**
   * @var string
   */
  public $tensorboard;
  protected $vertexAiParametersType = VertexAIParameters::class;
  protected $vertexAiParametersDataType = '';

  /**
   * @param SchedulerAcceleratorConfig
   */
  public function setAcceleratorConfig(SchedulerAcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return SchedulerAcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param string
   */
  public function setContainerImageUri($containerImageUri)
  {
    $this->containerImageUri = $containerImageUri;
  }
  /**
   * @return string
   */
  public function getContainerImageUri()
  {
    return $this->containerImageUri;
  }
  /**
   * @param DataprocParameters
   */
  public function setDataprocParameters(DataprocParameters $dataprocParameters)
  {
    $this->dataprocParameters = $dataprocParameters;
  }
  /**
   * @return DataprocParameters
   */
  public function getDataprocParameters()
  {
    return $this->dataprocParameters;
  }
  /**
   * @param string
   */
  public function setInputNotebookFile($inputNotebookFile)
  {
    $this->inputNotebookFile = $inputNotebookFile;
  }
  /**
   * @return string
   */
  public function getInputNotebookFile()
  {
    return $this->inputNotebookFile;
  }
  /**
   * @param string
   */
  public function setJobType($jobType)
  {
    $this->jobType = $jobType;
  }
  /**
   * @return string
   */
  public function getJobType()
  {
    return $this->jobType;
  }
  /**
   * @param string
   */
  public function setKernelSpec($kernelSpec)
  {
    $this->kernelSpec = $kernelSpec;
  }
  /**
   * @return string
   */
  public function getKernelSpec()
  {
    return $this->kernelSpec;
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
  public function setMasterType($masterType)
  {
    $this->masterType = $masterType;
  }
  /**
   * @return string
   */
  public function getMasterType()
  {
    return $this->masterType;
  }
  /**
   * @param string
   */
  public function setOutputNotebookFolder($outputNotebookFolder)
  {
    $this->outputNotebookFolder = $outputNotebookFolder;
  }
  /**
   * @return string
   */
  public function getOutputNotebookFolder()
  {
    return $this->outputNotebookFolder;
  }
  /**
   * @param string
   */
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  /**
   * @return string
   */
  public function getParameters()
  {
    return $this->parameters;
  }
  /**
   * @param string
   */
  public function setParamsYamlFile($paramsYamlFile)
  {
    $this->paramsYamlFile = $paramsYamlFile;
  }
  /**
   * @return string
   */
  public function getParamsYamlFile()
  {
    return $this->paramsYamlFile;
  }
  /**
   * @param string
   */
  public function setScaleTier($scaleTier)
  {
    $this->scaleTier = $scaleTier;
  }
  /**
   * @return string
   */
  public function getScaleTier()
  {
    return $this->scaleTier;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param string
   */
  public function setTensorboard($tensorboard)
  {
    $this->tensorboard = $tensorboard;
  }
  /**
   * @return string
   */
  public function getTensorboard()
  {
    return $this->tensorboard;
  }
  /**
   * @param VertexAIParameters
   */
  public function setVertexAiParameters(VertexAIParameters $vertexAiParameters)
  {
    $this->vertexAiParameters = $vertexAiParameters;
  }
  /**
   * @return VertexAIParameters
   */
  public function getVertexAiParameters()
  {
    return $this->vertexAiParameters;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExecutionTemplate::class, 'Google_Service_AIPlatformNotebooks_ExecutionTemplate');
