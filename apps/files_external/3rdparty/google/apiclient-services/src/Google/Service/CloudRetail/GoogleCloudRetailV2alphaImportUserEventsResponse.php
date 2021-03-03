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

class Google_Service_CloudRetail_GoogleCloudRetailV2alphaImportUserEventsResponse extends Google_Collection
{
  protected $collection_key = 'errorSamples';
  protected $errorSamplesType = 'Google_Service_CloudRetail_GoogleRpcStatus';
  protected $errorSamplesDataType = 'array';
  protected $errorsConfigType = 'Google_Service_CloudRetail_GoogleCloudRetailV2alphaImportErrorsConfig';
  protected $errorsConfigDataType = '';
  protected $importSummaryType = 'Google_Service_CloudRetail_GoogleCloudRetailV2alphaUserEventImportSummary';
  protected $importSummaryDataType = '';

  /**
   * @param Google_Service_CloudRetail_GoogleRpcStatus[]
   */
  public function setErrorSamples($errorSamples)
  {
    $this->errorSamples = $errorSamples;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleRpcStatus[]
   */
  public function getErrorSamples()
  {
    return $this->errorSamples;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2alphaImportErrorsConfig
   */
  public function setErrorsConfig(Google_Service_CloudRetail_GoogleCloudRetailV2alphaImportErrorsConfig $errorsConfig)
  {
    $this->errorsConfig = $errorsConfig;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2alphaImportErrorsConfig
   */
  public function getErrorsConfig()
  {
    return $this->errorsConfig;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailV2alphaUserEventImportSummary
   */
  public function setImportSummary(Google_Service_CloudRetail_GoogleCloudRetailV2alphaUserEventImportSummary $importSummary)
  {
    $this->importSummary = $importSummary;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailV2alphaUserEventImportSummary
   */
  public function getImportSummary()
  {
    return $this->importSummary;
  }
}
