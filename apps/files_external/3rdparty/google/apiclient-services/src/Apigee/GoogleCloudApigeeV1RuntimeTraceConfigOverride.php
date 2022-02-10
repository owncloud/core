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

class GoogleCloudApigeeV1RuntimeTraceConfigOverride extends \Google\Model
{
  /**
   * @var string
   */
  public $apiProxy;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $revisionCreateTime;
  /**
   * @var string
   */
  public $revisionId;
  protected $samplingConfigType = GoogleCloudApigeeV1RuntimeTraceSamplingConfig::class;
  protected $samplingConfigDataType = '';
  /**
   * @var string
   */
  public $uid;

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
   * @param string
   */
  public function setRevisionCreateTime($revisionCreateTime)
  {
    $this->revisionCreateTime = $revisionCreateTime;
  }
  /**
   * @return string
   */
  public function getRevisionCreateTime()
  {
    return $this->revisionCreateTime;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param GoogleCloudApigeeV1RuntimeTraceSamplingConfig
   */
  public function setSamplingConfig(GoogleCloudApigeeV1RuntimeTraceSamplingConfig $samplingConfig)
  {
    $this->samplingConfig = $samplingConfig;
  }
  /**
   * @return GoogleCloudApigeeV1RuntimeTraceSamplingConfig
   */
  public function getSamplingConfig()
  {
    return $this->samplingConfig;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1RuntimeTraceConfigOverride::class, 'Google_Service_Apigee_GoogleCloudApigeeV1RuntimeTraceConfigOverride');
