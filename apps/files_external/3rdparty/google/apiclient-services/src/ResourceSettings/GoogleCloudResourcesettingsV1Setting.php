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

namespace Google\Service\ResourceSettings;

class GoogleCloudResourcesettingsV1Setting extends \Google\Model
{
  protected $effectiveValueType = GoogleCloudResourcesettingsV1Value::class;
  protected $effectiveValueDataType = '';
  public $etag;
  protected $localValueType = GoogleCloudResourcesettingsV1Value::class;
  protected $localValueDataType = '';
  protected $metadataType = GoogleCloudResourcesettingsV1SettingMetadata::class;
  protected $metadataDataType = '';
  public $name;

  /**
   * @param GoogleCloudResourcesettingsV1Value
   */
  public function setEffectiveValue(GoogleCloudResourcesettingsV1Value $effectiveValue)
  {
    $this->effectiveValue = $effectiveValue;
  }
  /**
   * @return GoogleCloudResourcesettingsV1Value
   */
  public function getEffectiveValue()
  {
    return $this->effectiveValue;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param GoogleCloudResourcesettingsV1Value
   */
  public function setLocalValue(GoogleCloudResourcesettingsV1Value $localValue)
  {
    $this->localValue = $localValue;
  }
  /**
   * @return GoogleCloudResourcesettingsV1Value
   */
  public function getLocalValue()
  {
    return $this->localValue;
  }
  /**
   * @param GoogleCloudResourcesettingsV1SettingMetadata
   */
  public function setMetadata(GoogleCloudResourcesettingsV1SettingMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return GoogleCloudResourcesettingsV1SettingMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudResourcesettingsV1Setting::class, 'Google_Service_ResourceSettings_GoogleCloudResourcesettingsV1Setting');
