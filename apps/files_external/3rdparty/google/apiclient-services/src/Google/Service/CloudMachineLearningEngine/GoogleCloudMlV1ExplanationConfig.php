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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ExplanationConfig extends Google_Model
{
  protected $integratedGradientsAttributionType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1IntegratedGradientsAttribution';
  protected $integratedGradientsAttributionDataType = '';
  protected $sampledShapleyAttributionType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1SampledShapleyAttribution';
  protected $sampledShapleyAttributionDataType = '';
  protected $xraiAttributionType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1XraiAttribution';
  protected $xraiAttributionDataType = '';

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1IntegratedGradientsAttribution
   */
  public function setIntegratedGradientsAttribution(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1IntegratedGradientsAttribution $integratedGradientsAttribution)
  {
    $this->integratedGradientsAttribution = $integratedGradientsAttribution;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1IntegratedGradientsAttribution
   */
  public function getIntegratedGradientsAttribution()
  {
    return $this->integratedGradientsAttribution;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1SampledShapleyAttribution
   */
  public function setSampledShapleyAttribution(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1SampledShapleyAttribution $sampledShapleyAttribution)
  {
    $this->sampledShapleyAttribution = $sampledShapleyAttribution;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1SampledShapleyAttribution
   */
  public function getSampledShapleyAttribution()
  {
    return $this->sampledShapleyAttribution;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1XraiAttribution
   */
  public function setXraiAttribution(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1XraiAttribution $xraiAttribution)
  {
    $this->xraiAttribution = $xraiAttribution;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1XraiAttribution
   */
  public function getXraiAttribution()
  {
    return $this->xraiAttribution;
  }
}
