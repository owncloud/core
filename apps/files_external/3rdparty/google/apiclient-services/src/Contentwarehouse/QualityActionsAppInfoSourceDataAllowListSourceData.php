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

class QualityActionsAppInfoSourceDataAllowListSourceData extends \Google\Model
{
  /**
   * @var bool
   */
  public $preReleaseMode;
  /**
   * @var bool
   */
  public $unknownAppDeviceCompatibility;

  /**
   * @param bool
   */
  public function setPreReleaseMode($preReleaseMode)
  {
    $this->preReleaseMode = $preReleaseMode;
  }
  /**
   * @return bool
   */
  public function getPreReleaseMode()
  {
    return $this->preReleaseMode;
  }
  /**
   * @param bool
   */
  public function setUnknownAppDeviceCompatibility($unknownAppDeviceCompatibility)
  {
    $this->unknownAppDeviceCompatibility = $unknownAppDeviceCompatibility;
  }
  /**
   * @return bool
   */
  public function getUnknownAppDeviceCompatibility()
  {
    return $this->unknownAppDeviceCompatibility;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QualityActionsAppInfoSourceDataAllowListSourceData::class, 'Google_Service_Contentwarehouse_QualityActionsAppInfoSourceDataAllowListSourceData');
