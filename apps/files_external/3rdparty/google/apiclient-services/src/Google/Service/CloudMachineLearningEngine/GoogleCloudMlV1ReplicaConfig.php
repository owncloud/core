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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ReplicaConfig extends Google_Model
{
  protected $acceleratorConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig';
  protected $acceleratorConfigDataType = '';
  public $imageUri;
  public $tpuTfVersion;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig
   */
  public function setAcceleratorConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
  public function setTpuTfVersion($tpuTfVersion)
  {
    $this->tpuTfVersion = $tpuTfVersion;
  }
  public function getTpuTfVersion()
  {
    return $this->tpuTfVersion;
  }
}
