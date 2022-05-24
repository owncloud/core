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

class GooglePrivacyDlpV2FieldTransformation extends \Google\Collection
{
  protected $collection_key = 'fields';
  protected $conditionType = GooglePrivacyDlpV2RecordCondition::class;
  protected $conditionDataType = '';
  protected $fieldsType = GooglePrivacyDlpV2FieldId::class;
  protected $fieldsDataType = 'array';
  protected $infoTypeTransformationsType = GooglePrivacyDlpV2InfoTypeTransformations::class;
  protected $infoTypeTransformationsDataType = '';
  protected $primitiveTransformationType = GooglePrivacyDlpV2PrimitiveTransformation::class;
  protected $primitiveTransformationDataType = '';

  /**
   * @param GooglePrivacyDlpV2RecordCondition
   */
  public function setCondition(GooglePrivacyDlpV2RecordCondition $condition)
  {
    $this->condition = $condition;
  }
  /**
   * @return GooglePrivacyDlpV2RecordCondition
   */
  public function getCondition()
  {
    return $this->condition;
  }
  /**
   * @param GooglePrivacyDlpV2FieldId[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  /**
   * @param GooglePrivacyDlpV2InfoTypeTransformations
   */
  public function setInfoTypeTransformations(GooglePrivacyDlpV2InfoTypeTransformations $infoTypeTransformations)
  {
    $this->infoTypeTransformations = $infoTypeTransformations;
  }
  /**
   * @return GooglePrivacyDlpV2InfoTypeTransformations
   */
  public function getInfoTypeTransformations()
  {
    return $this->infoTypeTransformations;
  }
  /**
   * @param GooglePrivacyDlpV2PrimitiveTransformation
   */
  public function setPrimitiveTransformation(GooglePrivacyDlpV2PrimitiveTransformation $primitiveTransformation)
  {
    $this->primitiveTransformation = $primitiveTransformation;
  }
  /**
   * @return GooglePrivacyDlpV2PrimitiveTransformation
   */
  public function getPrimitiveTransformation()
  {
    return $this->primitiveTransformation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2FieldTransformation::class, 'Google_Service_DLP_GooglePrivacyDlpV2FieldTransformation');
