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

namespace Google\Service\Assuredworkloads;

class GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings extends \Google\Model
{
  protected $kmsSettingsType = GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings::class;
  protected $kmsSettingsDataType = '';

  /**
   * @param GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings
   */
  public function setKmsSettings(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings $kmsSettings)
  {
    $this->kmsSettings = $kmsSettings;
  }
  /**
   * @return GoogleCloudAssuredworkloadsVersioningV1mainWorkloadKMSSettings
   */
  public function getKmsSettings()
  {
    return $this->kmsSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings::class, 'Google_Service_Assuredworkloads_GoogleCloudAssuredworkloadsVersioningV1mainWorkloadIL4Settings');
