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

class Google_Service_DLP_GooglePrivacyDlpV2DeidentifyConfig extends Google_Model
{
  protected $infoTypeTransformationsType = 'Google_Service_DLP_GooglePrivacyDlpV2InfoTypeTransformations';
  protected $infoTypeTransformationsDataType = '';
  protected $recordTransformationsType = 'Google_Service_DLP_GooglePrivacyDlpV2RecordTransformations';
  protected $recordTransformationsDataType = '';
  protected $transformationErrorHandlingType = 'Google_Service_DLP_GooglePrivacyDlpV2TransformationErrorHandling';
  protected $transformationErrorHandlingDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2InfoTypeTransformations
   */
  public function setInfoTypeTransformations(Google_Service_DLP_GooglePrivacyDlpV2InfoTypeTransformations $infoTypeTransformations)
  {
    $this->infoTypeTransformations = $infoTypeTransformations;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InfoTypeTransformations
   */
  public function getInfoTypeTransformations()
  {
    return $this->infoTypeTransformations;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2RecordTransformations
   */
  public function setRecordTransformations(Google_Service_DLP_GooglePrivacyDlpV2RecordTransformations $recordTransformations)
  {
    $this->recordTransformations = $recordTransformations;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2RecordTransformations
   */
  public function getRecordTransformations()
  {
    return $this->recordTransformations;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2TransformationErrorHandling
   */
  public function setTransformationErrorHandling(Google_Service_DLP_GooglePrivacyDlpV2TransformationErrorHandling $transformationErrorHandling)
  {
    $this->transformationErrorHandling = $transformationErrorHandling;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2TransformationErrorHandling
   */
  public function getTransformationErrorHandling()
  {
    return $this->transformationErrorHandling;
  }
}
