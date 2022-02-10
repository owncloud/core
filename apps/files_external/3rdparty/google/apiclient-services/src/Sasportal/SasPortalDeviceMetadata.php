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

namespace Google\Service\Sasportal;

class SasPortalDeviceMetadata extends \Google\Model
{
  /**
   * @var string
   */
  public $antennaModel;
  /**
   * @var string
   */
  public $commonChannelGroup;
  /**
   * @var string
   */
  public $interferenceCoordinationGroup;

  /**
   * @param string
   */
  public function setAntennaModel($antennaModel)
  {
    $this->antennaModel = $antennaModel;
  }
  /**
   * @return string
   */
  public function getAntennaModel()
  {
    return $this->antennaModel;
  }
  /**
   * @param string
   */
  public function setCommonChannelGroup($commonChannelGroup)
  {
    $this->commonChannelGroup = $commonChannelGroup;
  }
  /**
   * @return string
   */
  public function getCommonChannelGroup()
  {
    return $this->commonChannelGroup;
  }
  /**
   * @param string
   */
  public function setInterferenceCoordinationGroup($interferenceCoordinationGroup)
  {
    $this->interferenceCoordinationGroup = $interferenceCoordinationGroup;
  }
  /**
   * @return string
   */
  public function getInterferenceCoordinationGroup()
  {
    return $this->interferenceCoordinationGroup;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SasPortalDeviceMetadata::class, 'Google_Service_Sasportal_SasPortalDeviceMetadata');
