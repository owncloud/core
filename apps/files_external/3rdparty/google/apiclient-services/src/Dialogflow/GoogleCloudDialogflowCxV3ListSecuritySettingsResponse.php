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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ListSecuritySettingsResponse extends \Google\Collection
{
  protected $collection_key = 'securitySettings';
  public $nextPageToken;
  protected $securitySettingsType = GoogleCloudDialogflowCxV3SecuritySettings::class;
  protected $securitySettingsDataType = 'array';

  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
  /**
   * @param GoogleCloudDialogflowCxV3SecuritySettings[]
   */
  public function setSecuritySettings($securitySettings)
  {
    $this->securitySettings = $securitySettings;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SecuritySettings[]
   */
  public function getSecuritySettings()
  {
    return $this->securitySettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ListSecuritySettingsResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListSecuritySettingsResponse');
