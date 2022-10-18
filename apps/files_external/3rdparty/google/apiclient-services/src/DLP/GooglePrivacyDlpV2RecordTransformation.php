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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2RecordTransformation extends \Google\Model
{
  /**
   * @var string
   */
  public $containerTimestamp;
  /**
   * @var string
   */
  public $containerVersion;
  protected $fieldIdType = GooglePrivacyDlpV2FieldId::class;
  protected $fieldIdDataType = '';

  /**
   * @param string
   */
  public function setContainerTimestamp($containerTimestamp)
  {
    $this->containerTimestamp = $containerTimestamp;
  }
  /**
   * @return string
   */
  public function getContainerTimestamp()
  {
    return $this->containerTimestamp;
  }
  /**
   * @param string
   */
  public function setContainerVersion($containerVersion)
  {
    $this->containerVersion = $containerVersion;
  }
  /**
   * @return string
   */
  public function getContainerVersion()
  {
    return $this->containerVersion;
  }
  /**
   * @param GooglePrivacyDlpV2FieldId
   */
  public function setFieldId(GooglePrivacyDlpV2FieldId $fieldId)
  {
    $this->fieldId = $fieldId;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId
   */
  public function getFieldId()
  {
    return $this->fieldId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2RecordTransformation::class, 'Google_Service_DLP_GooglePrivacyDlpV2RecordTransformation');
