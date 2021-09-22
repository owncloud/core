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

class GooglePrivacyDlpV2DeidentifyConfig extends \Google\Model
{
  protected $infoTypeTransformationsType = GooglePrivacyDlpV2InfoTypeTransformations::class;
  protected $infoTypeTransformationsDataType = '';
  protected $recordTransformationsType = GooglePrivacyDlpV2RecordTransformations::class;
  protected $recordTransformationsDataType = '';
  protected $transformationErrorHandlingType = GooglePrivacyDlpV2TransformationErrorHandling::class;
  protected $transformationErrorHandlingDataType = '';

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
   * @param GooglePrivacyDlpV2RecordTransformations
   */
  public function setRecordTransformations(GooglePrivacyDlpV2RecordTransformations $recordTransformations)
  {
    $this->recordTransformations = $recordTransformations;
  }
  /**
   * @return GooglePrivacyDlpV2RecordTransformations
   */
  public function getRecordTransformations()
  {
    return $this->recordTransformations;
  }
  /**
   * @param GooglePrivacyDlpV2TransformationErrorHandling
   */
  public function setTransformationErrorHandling(GooglePrivacyDlpV2TransformationErrorHandling $transformationErrorHandling)
  {
    $this->transformationErrorHandling = $transformationErrorHandling;
  }
  /**
   * @return GooglePrivacyDlpV2TransformationErrorHandling
   */
  public function getTransformationErrorHandling()
  {
    return $this->transformationErrorHandling;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DeidentifyConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2DeidentifyConfig');
