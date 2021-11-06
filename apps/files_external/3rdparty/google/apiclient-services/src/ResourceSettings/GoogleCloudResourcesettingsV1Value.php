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

class GoogleCloudResourcesettingsV1Value extends \Google\Model
{
  public $booleanValue;
  public $durationValue;
  protected $enumValueType = GoogleCloudResourcesettingsV1ValueEnumValue::class;
  protected $enumValueDataType = '';
  protected $stringMapValueType = GoogleCloudResourcesettingsV1ValueStringMap::class;
  protected $stringMapValueDataType = '';
  protected $stringSetValueType = GoogleCloudResourcesettingsV1ValueStringSet::class;
  protected $stringSetValueDataType = '';
  public $stringValue;

  public function setBooleanValue($booleanValue)
  {
    $this->booleanValue = $booleanValue;
  }
  public function getBooleanValue()
  {
    return $this->booleanValue;
  }
  public function setDurationValue($durationValue)
  {
    $this->durationValue = $durationValue;
  }
  public function getDurationValue()
  {
    return $this->durationValue;
  }
  /**
   * @param GoogleCloudResourcesettingsV1ValueEnumValue
   */
  public function setEnumValue(GoogleCloudResourcesettingsV1ValueEnumValue $enumValue)
  {
    $this->enumValue = $enumValue;
  }
  /**
   * @return GoogleCloudResourcesettingsV1ValueEnumValue
   */
  public function getEnumValue()
  {
    return $this->enumValue;
  }
  /**
   * @param GoogleCloudResourcesettingsV1ValueStringMap
   */
  public function setStringMapValue(GoogleCloudResourcesettingsV1ValueStringMap $stringMapValue)
  {
    $this->stringMapValue = $stringMapValue;
  }
  /**
   * @return GoogleCloudResourcesettingsV1ValueStringMap
   */
  public function getStringMapValue()
  {
    return $this->stringMapValue;
  }
  /**
   * @param GoogleCloudResourcesettingsV1ValueStringSet
   */
  public function setStringSetValue(GoogleCloudResourcesettingsV1ValueStringSet $stringSetValue)
  {
    $this->stringSetValue = $stringSetValue;
  }
  /**
   * @return GoogleCloudResourcesettingsV1ValueStringSet
   */
  public function getStringSetValue()
  {
    return $this->stringSetValue;
  }
  public function setStringValue($stringValue)
  {
    $this->stringValue = $stringValue;
  }
  public function getStringValue()
  {
    return $this->stringValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudResourcesettingsV1Value::class, 'Google_Service_ResourceSettings_GoogleCloudResourcesettingsV1Value');
