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

class Google_Service_DLP_GooglePrivacyDlpV2TransformationSummary extends Google_Collection
{
  protected $collection_key = 'results';
  protected $fieldType = 'Google_Service_DLP_GooglePrivacyDlpV2FieldId';
  protected $fieldDataType = '';
  protected $fieldTransformationsType = 'Google_Service_DLP_GooglePrivacyDlpV2FieldTransformation';
  protected $fieldTransformationsDataType = 'array';
  protected $infoTypeType = 'Google_Service_DLP_GooglePrivacyDlpV2InfoType';
  protected $infoTypeDataType = '';
  protected $recordSuppressType = 'Google_Service_DLP_GooglePrivacyDlpV2RecordSuppression';
  protected $recordSuppressDataType = '';
  protected $resultsType = 'Google_Service_DLP_GooglePrivacyDlpV2SummaryResult';
  protected $resultsDataType = 'array';
  protected $transformationType = 'Google_Service_DLP_GooglePrivacyDlpV2PrimitiveTransformation';
  protected $transformationDataType = '';
  public $transformedBytes;

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
   * @param Google_Service_DLP_GooglePrivacyDlpV2FieldTransformation[]
   */
  public function setFieldTransformations($fieldTransformations)
  {
    $this->fieldTransformations = $fieldTransformations;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2FieldTransformation[]
   */
  public function getFieldTransformations()
  {
    return $this->fieldTransformations;
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
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2RecordSuppression
   */
  public function setRecordSuppress(Google_Service_DLP_GooglePrivacyDlpV2RecordSuppression $recordSuppress)
  {
    $this->recordSuppress = $recordSuppress;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2RecordSuppression
   */
  public function getRecordSuppress()
  {
    return $this->recordSuppress;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2SummaryResult[]
   */
  public function setResults($results)
  {
    $this->results = $results;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2SummaryResult[]
   */
  public function getResults()
  {
    return $this->results;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2PrimitiveTransformation
   */
  public function setTransformation(Google_Service_DLP_GooglePrivacyDlpV2PrimitiveTransformation $transformation)
  {
    $this->transformation = $transformation;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2PrimitiveTransformation
   */
  public function getTransformation()
  {
    return $this->transformation;
  }
  public function setTransformedBytes($transformedBytes)
  {
    $this->transformedBytes = $transformedBytes;
  }
  public function getTransformedBytes()
  {
    return $this->transformedBytes;
  }
}
