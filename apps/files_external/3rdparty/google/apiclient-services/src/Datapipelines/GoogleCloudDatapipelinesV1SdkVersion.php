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

class GoogleCloudDatapipelinesV1SdkVersion extends \Google\Model
{
  /**
   * @var string
   */
  public $sdkSupportStatus;
  /**
   * @var string
   */
  public $version;
  /**
   * @var string
   */
  public $versionDisplayName;

  /**
   * @param string
   */
  public function setSdkSupportStatus($sdkSupportStatus)
  {
    $this->sdkSupportStatus = $sdkSupportStatus;
  }
  /**
   * @return string
   */
  public function getSdkSupportStatus()
  {
    return $this->sdkSupportStatus;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
  /**
   * @param string
   */
  public function setVersionDisplayName($versionDisplayName)
  {
    $this->versionDisplayName = $versionDisplayName;
  }
  /**
   * @return string
   */
  public function getVersionDisplayName()
  {
    return $this->versionDisplayName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatapipelinesV1SdkVersion::class, 'Google_Service_Datapipelines_GoogleCloudDatapipelinesV1SdkVersion');
