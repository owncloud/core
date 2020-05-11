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

class Google_Service_DLP_GooglePrivacyDlpV2InspectDataSourceDetails extends Google_Model
{
  protected $requestedOptionsType = 'Google_Service_DLP_GooglePrivacyDlpV2RequestedOptions';
  protected $requestedOptionsDataType = '';
  protected $resultType = 'Google_Service_DLP_GooglePrivacyDlpV2Result';
  protected $resultDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2RequestedOptions
   */
  public function setRequestedOptions(Google_Service_DLP_GooglePrivacyDlpV2RequestedOptions $requestedOptions)
  {
    $this->requestedOptions = $requestedOptions;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2RequestedOptions
   */
  public function getRequestedOptions()
  {
    return $this->requestedOptions;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2Result
   */
  public function setResult(Google_Service_DLP_GooglePrivacyDlpV2Result $result)
  {
    $this->result = $result;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2Result
   */
  public function getResult()
  {
    return $this->result;
  }
}
