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

namespace Google\Service\CloudDomains;

class ConfigureContactSettingsRequest extends \Google\Collection
{
  protected $collection_key = 'contactNotices';
  /**
   * @var string[]
   */
  public $contactNotices;
  protected $contactSettingsType = ContactSettings::class;
  protected $contactSettingsDataType = '';
  /**
   * @var string
   */
  public $updateMask;
  /**
   * @var bool
   */
  public $validateOnly;

  /**
   * @param string[]
   */
  public function setContactNotices($contactNotices)
  {
    $this->contactNotices = $contactNotices;
  }
  /**
   * @return string[]
   */
  public function getContactNotices()
  {
    return $this->contactNotices;
  }
  /**
   * @param ContactSettings
   */
  public function setContactSettings(ContactSettings $contactSettings)
  {
    $this->contactSettings = $contactSettings;
  }
  /**
   * @return ContactSettings
   */
  public function getContactSettings()
  {
    return $this->contactSettings;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
  /**
   * @param bool
   */
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  /**
   * @return bool
   */
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConfigureContactSettingsRequest::class, 'Google_Service_CloudDomains_ConfigureContactSettingsRequest');
