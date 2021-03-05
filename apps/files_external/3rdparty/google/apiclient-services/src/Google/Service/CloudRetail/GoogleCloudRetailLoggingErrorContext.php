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

class Google_Service_CloudRetail_GoogleCloudRetailLoggingErrorContext extends Google_Model
{
  protected $httpRequestType = 'Google_Service_CloudRetail_GoogleCloudRetailLoggingHttpRequestContext';
  protected $httpRequestDataType = '';
  protected $reportLocationType = 'Google_Service_CloudRetail_GoogleCloudRetailLoggingSourceLocation';
  protected $reportLocationDataType = '';

  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailLoggingHttpRequestContext
   */
  public function setHttpRequest(Google_Service_CloudRetail_GoogleCloudRetailLoggingHttpRequestContext $httpRequest)
  {
    $this->httpRequest = $httpRequest;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailLoggingHttpRequestContext
   */
  public function getHttpRequest()
  {
    return $this->httpRequest;
  }
  /**
   * @param Google_Service_CloudRetail_GoogleCloudRetailLoggingSourceLocation
   */
  public function setReportLocation(Google_Service_CloudRetail_GoogleCloudRetailLoggingSourceLocation $reportLocation)
  {
    $this->reportLocation = $reportLocation;
  }
  /**
   * @return Google_Service_CloudRetail_GoogleCloudRetailLoggingSourceLocation
   */
  public function getReportLocation()
  {
    return $this->reportLocation;
  }
}
