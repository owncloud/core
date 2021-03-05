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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Location extends Google_Collection
{
  protected $collection_key = 'capabilities';
  protected $capabilitiesType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Capability';
  protected $capabilitiesDataType = 'array';
  public $name;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Capability[]
   */
  public function setCapabilities($capabilities)
  {
    $this->capabilities = $capabilities;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Capability[]
   */
  public function getCapabilities()
  {
    return $this->capabilities;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
