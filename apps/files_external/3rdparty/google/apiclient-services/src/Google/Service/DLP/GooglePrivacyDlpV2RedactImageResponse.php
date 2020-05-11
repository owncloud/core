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

class Google_Service_DLP_GooglePrivacyDlpV2RedactImageResponse extends Google_Model
{
  public $extractedText;
  protected $inspectResultType = 'Google_Service_DLP_GooglePrivacyDlpV2InspectResult';
  protected $inspectResultDataType = '';
  public $redactedImage;

  public function setExtractedText($extractedText)
  {
    $this->extractedText = $extractedText;
  }
  public function getExtractedText()
  {
    return $this->extractedText;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2InspectResult
   */
  public function setInspectResult(Google_Service_DLP_GooglePrivacyDlpV2InspectResult $inspectResult)
  {
    $this->inspectResult = $inspectResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2InspectResult
   */
  public function getInspectResult()
  {
    return $this->inspectResult;
  }
  public function setRedactedImage($redactedImage)
  {
    $this->redactedImage = $redactedImage;
  }
  public function getRedactedImage()
  {
    return $this->redactedImage;
  }
}
