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

class Google_Service_AIPlatformNotebooks_ExecutionTemplate extends Google_Model
{
  protected $acceleratorConfigType = 'Google_Service_AIPlatformNotebooks_SchedulerAcceleratorConfig';
  protected $acceleratorConfigDataType = '';
  public $containerImageUri;
  public $inputNotebookFile;
  public $labels;
  public $masterType;
  public $outputNotebookFolder;
  public $parameters;
  public $paramsYamlFile;
  public $scaleTier;
  public $serviceAccount;

  /**
   * @param Google_Service_AIPlatformNotebooks_SchedulerAcceleratorConfig
   */
  public function setAcceleratorConfig(Google_Service_AIPlatformNotebooks_SchedulerAcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return Google_Service_AIPlatformNotebooks_SchedulerAcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  public function setContainerImageUri($containerImageUri)
  {
    $this->containerImageUri = $containerImageUri;
  }
  public function getContainerImageUri()
  {
    return $this->containerImageUri;
  }
  public function setInputNotebookFile($inputNotebookFile)
  {
    $this->inputNotebookFile = $inputNotebookFile;
  }
  public function getInputNotebookFile()
  {
    return $this->inputNotebookFile;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMasterType($masterType)
  {
    $this->masterType = $masterType;
  }
  public function getMasterType()
  {
    return $this->masterType;
  }
  public function setOutputNotebookFolder($outputNotebookFolder)
  {
    $this->outputNotebookFolder = $outputNotebookFolder;
  }
  public function getOutputNotebookFolder()
  {
    return $this->outputNotebookFolder;
  }
  public function setParameters($parameters)
  {
    $this->parameters = $parameters;
  }
  public function getParameters()
  {
    return $this->parameters;
  }
  public function setParamsYamlFile($paramsYamlFile)
  {
    $this->paramsYamlFile = $paramsYamlFile;
  }
  public function getParamsYamlFile()
  {
    return $this->paramsYamlFile;
  }
  public function setScaleTier($scaleTier)
  {
    $this->scaleTier = $scaleTier;
  }
  public function getScaleTier()
  {
    return $this->scaleTier;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
}
