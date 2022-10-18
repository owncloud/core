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

class AppsPeopleOzExternalMergedpeopleapiLimitedProfileSettingsField extends \Google\Model
{
  protected $limitedProfileSettingsType = SocialGraphApiProtoLimitedProfileSettings::class;
  protected $limitedProfileSettingsDataType = '';
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';

  /**
   * @param SocialGraphApiProtoLimitedProfileSettings
   */
  public function setLimitedProfileSettings(SocialGraphApiProtoLimitedProfileSettings $limitedProfileSettings)
  {
    $this->limitedProfileSettings = $limitedProfileSettings;
  }
  /**
   * @return SocialGraphApiProtoLimitedProfileSettings
   */
  public function getLimitedProfileSettings()
  {
    return $this->limitedProfileSettings;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiLimitedProfileSettingsField::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiLimitedProfileSettingsField');
