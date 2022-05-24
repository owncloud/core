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

namespace Google\Service\Datapipelines;

class GoogleCloudDatapipelinesV1DataflowJobDetails extends \Google\Model
{
  /**
   * @var int
   */
  public $currentWorkers;
  public $resourceInfo;
  protected $sdkVersionType = GoogleCloudDatapipelinesV1SdkVersion::class;
  protected $sdkVersionDataType = '';

  /**
   * @param int
   */
  public function setCurrentWorkers($currentWorkers)
  {
    $this->currentWorkers = $currentWorkers;
  }
  /**
   * @return int
   */
  public function getCurrentWorkers()
  {
    return $this->currentWorkers;
  }
  public function setResourceInfo($resourceInfo)
  {
    $this->resourceInfo = $resourceInfo;
  }
  public function getResourceInfo()
  {
    return $this->resourceInfo;
  }
  /**
   * @param GoogleCloudDatapipelinesV1SdkVersion
   */
  public function setSdkVersion(GoogleCloudDatapipelinesV1SdkVersion $sdkVersion)
  {
    $this->sdkVersion = $sdkVersion;
  }
  /**
   * @return GoogleCloudDatapipelinesV1SdkVersion
   */
  public function getSdkVersion()
  {
    return $this->sdkVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1DataflowJobDetails::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1DataflowJobDetails');
