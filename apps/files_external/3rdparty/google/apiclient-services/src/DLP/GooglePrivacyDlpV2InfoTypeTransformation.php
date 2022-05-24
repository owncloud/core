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

class GooglePrivacyDlpV2InfoTypeTransformation extends \Google\Collection
{
  protected $collection_key = 'infoTypes';
  protected $infoTypesType = GooglePrivacyDlpV2InfoType::class;
  protected $infoTypesDataType = 'array';
  protected $primitiveTransformationType = GooglePrivacyDlpV2PrimitiveTransformation::class;
  protected $primitiveTransformationDataType = '';

  /**
   * @param GooglePrivacyDlpV2InfoType[]
   */
  public function setInfoTypes($infoTypes)
  {
    $this->infoTypes = $infoTypes;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType[]
   */
  public function getInfoTypes()
  {
    return $this->infoTypes;
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
class_alias(GooglePrivacyDlpV2InfoTypeTransformation::class, 'Google_Service_DLP_GooglePrivacyDlpV2InfoTypeTransformation');
