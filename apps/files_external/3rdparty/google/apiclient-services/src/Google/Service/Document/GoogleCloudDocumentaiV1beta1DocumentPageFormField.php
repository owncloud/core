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

class Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageFormField extends Google_Collection
{
  protected $collection_key = 'valueDetectedLanguages';
  protected $fieldNameType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout';
  protected $fieldNameDataType = '';
  protected $fieldValueType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout';
  protected $fieldValueDataType = '';
  protected $nameDetectedLanguagesType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage';
  protected $nameDetectedLanguagesDataType = 'array';
  protected $valueDetectedLanguagesType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage';
  protected $valueDetectedLanguagesDataType = 'array';
  public $valueType;

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout
   */
  public function setFieldName(Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout $fieldName)
  {
    $this->fieldName = $fieldName;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout
   */
  public function getFieldName()
  {
    return $this->fieldName;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout
   */
  public function setFieldValue(Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout $fieldValue)
  {
    $this->fieldValue = $fieldValue;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageLayout
   */
  public function getFieldValue()
  {
    return $this->fieldValue;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage[]
   */
  public function setNameDetectedLanguages($nameDetectedLanguages)
  {
    $this->nameDetectedLanguages = $nameDetectedLanguages;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage[]
   */
  public function getNameDetectedLanguages()
  {
    return $this->nameDetectedLanguages;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage[]
   */
  public function setValueDetectedLanguages($valueDetectedLanguages)
  {
    $this->valueDetectedLanguages = $valueDetectedLanguages;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentPageDetectedLanguage[]
   */
  public function getValueDetectedLanguages()
  {
    return $this->valueDetectedLanguages;
  }
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  public function getValueType()
  {
    return $this->valueType;
  }
}
