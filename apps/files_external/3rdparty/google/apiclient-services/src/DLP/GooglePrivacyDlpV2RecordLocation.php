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

class GooglePrivacyDlpV2RecordLocation extends \Google\Model
{
  protected $fieldIdType = GooglePrivacyDlpV2FieldId::class;
  protected $fieldIdDataType = '';
  protected $recordKeyType = GooglePrivacyDlpV2RecordKey::class;
  protected $recordKeyDataType = '';
  protected $tableLocationType = GooglePrivacyDlpV2TableLocation::class;
  protected $tableLocationDataType = '';

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
  /**
   * @param GooglePrivacyDlpV2RecordKey
   */
  public function setRecordKey(GooglePrivacyDlpV2RecordKey $recordKey)
  {
    $this->recordKey = $recordKey;
  }
  /**
   * @return GooglePrivacyDlpV2RecordKey
   */
  public function getRecordKey()
  {
    return $this->recordKey;
  }
  /**
   * @param GooglePrivacyDlpV2TableLocation
   */
  public function setTableLocation(GooglePrivacyDlpV2TableLocation $tableLocation)
  {
    $this->tableLocation = $tableLocation;
  }
  /**
   * @return GooglePrivacyDlpV2TableLocation
   */
  public function getTableLocation()
  {
    return $this->tableLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2RecordLocation::class, 'Google_Service_DLP_GooglePrivacyDlpV2RecordLocation');
