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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1TraceConfigOverride extends \Google\Model
{
  /**
   * @var string
   */
  public $apiProxy;
  /**
   * @var string
   */
  public $name;
  protected $samplingConfigType = GoogleCloudApigeeV1TraceSamplingConfig::class;
  protected $samplingConfigDataType = '';

  /**
   * @param string
   */
  public function setApiProxy($apiProxy)
  {
    $this->apiProxy = $apiProxy;
  }
  /**
   * @return string
   */
  public function getApiProxy()
  {
    return $this->apiProxy;
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
   * @param GoogleCloudApigeeV1TraceSamplingConfig
   */
  public function setSamplingConfig(GoogleCloudApigeeV1TraceSamplingConfig $samplingConfig)
  {
    $this->samplingConfig = $samplingConfig;
  }
  /**
   * @return GoogleCloudApigeeV1TraceSamplingConfig
   */
  public function getSamplingConfig()
  {
    return $this->samplingConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1TraceConfigOverride::class, 'Google_Service_Apigee_GoogleCloudApigeeV1TraceConfigOverride');
