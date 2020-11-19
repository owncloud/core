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

class Google_Service_CloudDomains_ConfigureContactSettingsRequest extends Google_Collection
{
  protected $collection_key = 'contactNotices';
  public $contactNotices;
  protected $contactSettingsType = 'Google_Service_CloudDomains_ContactSettings';
  protected $contactSettingsDataType = '';
  public $updateMask;
  public $validateOnly;

  public function setContactNotices($contactNotices)
  {
    $this->contactNotices = $contactNotices;
  }
  public function getContactNotices()
  {
    return $this->contactNotices;
  }
  /**
   * @param Google_Service_CloudDomains_ContactSettings
   */
  public function setContactSettings(Google_Service_CloudDomains_ContactSettings $contactSettings)
  {
    $this->contactSettings = $contactSettings;
  }
  /**
   * @return Google_Service_CloudDomains_ContactSettings
   */
  public function getContactSettings()
  {
    return $this->contactSettings;
  }
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}
