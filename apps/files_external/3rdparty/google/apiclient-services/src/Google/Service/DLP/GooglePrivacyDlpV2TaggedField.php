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

class Google_Service_DLP_GooglePrivacyDlpV2TaggedField extends Google_Model
{
  public $customTag;
  protected $fieldType = 'Google_Service_DLP_GooglePrivacyDlpV2FieldId';
  protected $fieldDataType = '';
  protected $inferredType = 'Google_Service_DLP_GoogleProtobufEmpty';
  protected $inferredDataType = '';
  protected $infoTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2InfoType';
  protected $infoTypeDataType = '';

  public function setCustomTag($customTag)
  {
    $this->customTag = $customTag;
  }
  public function getCustomTag()
  {
    return $this->customTag;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2FieldId
   */
  public function setField(Google_Service_DLP_GooglePrivacyDlpV2FieldId $field)
  {
    $this->field = $field;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2FieldId
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * @param Google_Service_DLP_GoogleProtobufEmpty
   */
  public function setInferred(Google_Service_DLP_GoogleProtobufEmpty $inferred)
  {
    $this->inferred = $inferred;
  }
  /**
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function getInferred()
  {
    return $this->inferred;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(Google_Service_DLP_GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InfoType
   */
  public function getInfoType()
  {
    return $this->infoType;
  }
}
