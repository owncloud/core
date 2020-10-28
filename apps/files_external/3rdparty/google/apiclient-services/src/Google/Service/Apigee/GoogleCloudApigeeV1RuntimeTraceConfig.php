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

class Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceConfig extends Google_Collection
{
  protected $collection_key = 'overrides';
  public $endpoint;
  public $exporter;
  public $name;
  protected $overridesType = 'Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceConfigOverride';
  protected $overridesDataType = 'array';
  public $revisionCreateTime;
  public $revisionId;
  protected $samplingConfigType = 'Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceSamplingConfig';
  protected $samplingConfigDataType = '';

  public function setEndpoint($endpoint)
  {
    $this->endpoint = $endpoint;
  }
  public function getEndpoint()
  {
    return $this->endpoint;
  }
  public function setExporter($exporter)
  {
    $this->exporter = $exporter;
  }
  public function getExporter()
  {
    return $this->exporter;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceConfigOverride
   */
  public function setOverrides($overrides)
  {
    $this->overrides = $overrides;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceConfigOverride
   */
  public function getOverrides()
  {
    return $this->overrides;
  }
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceSamplingConfig
   */
  public function setSamplingConfig(Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceSamplingConfig $samplingConfig)
  {
    $this->samplingConfig = $samplingConfig;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceSamplingConfig
   */
  public function getSamplingConfig()
  {
    return $this->samplingConfig;
  }
}
