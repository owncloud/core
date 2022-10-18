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

namespace Google\Service\Contentwarehouse;

class QualityRichsnippetsAppsProtosLaunchableAppPerDocData extends \Google\Model
{
  /**
   * @var string
   */
  public $indexStatus;
  /**
   * @var string
   */
  public $packageIdFingerprint;
  /**
   * @var string
   */
  public $perAppInfoEncoded;

  /**
   * @param string
   */
  public function setIndexStatus($indexStatus)
  {
    $this->indexStatus = $indexStatus;
  }
  /**
   * @return string
   */
  public function getIndexStatus()
  {
    return $this->indexStatus;
  }
  /**
   * @param string
   */
  public function setPackageIdFingerprint($packageIdFingerprint)
  {
    $this->packageIdFingerprint = $packageIdFingerprint;
  }
  /**
   * @return string
   */
  public function getPackageIdFingerprint()
  {
    return $this->packageIdFingerprint;
  }
  /**
   * @param string
   */
  public function setPerAppInfoEncoded($perAppInfoEncoded)
  {
    $this->perAppInfoEncoded = $perAppInfoEncoded;
  }
  /**
   * @return string
   */
  public function getPerAppInfoEncoded()
  {
    return $this->perAppInfoEncoded;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityRichsnippetsAppsProtosLaunchableAppPerDocData::class, 'Google_Service_Contentwarehouse_QualityRichsnippetsAppsProtosLaunchableAppPerDocData');
