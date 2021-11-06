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

class GooglePrivacyDlpV2QuasiId extends \Google\Model
{
  public $customTag;
  protected $fieldType = GooglePrivacyDlpV2FieldId::class;
  protected $fieldDataType = '';
  protected $inferredType = GoogleProtobufEmpty::class;
  protected $inferredDataType = '';
  protected $infoTypeType = GooglePrivacyDlpV2InfoType::class;
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
   * @param GooglePrivacyDlpV2FieldId
   */
  public function setField(GooglePrivacyDlpV2FieldId $field)
  {
    $this->field = $field;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId
   */
  public function getField()
  {
    return $this->field;
  }
  /**
   * @param GoogleProtobufEmpty
   */
  public function setInferred(GoogleProtobufEmpty $inferred)
  {
    $this->inferred = $inferred;
  }
  /**
   * @return GoogleProtobufEmpty
   */
  public function getInferred()
  {
    return $this->inferred;
  }
  /**
   * @param GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType
   */
  public function getInfoType()
  {
    return $this->infoType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2QuasiId::class, 'Google_Service_DLP_GooglePrivacyDlpV2QuasiId');
