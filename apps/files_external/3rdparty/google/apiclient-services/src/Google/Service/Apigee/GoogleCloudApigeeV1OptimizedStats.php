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

class Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStats extends Google_Model
{
  protected $internal_gapi_mappings = array(
        "response" => "Response",
  );
  protected $responseType = 'Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsResponse';
  protected $responseDataType = '';

  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsResponse
   */
  public function setResponse(Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsResponse $response)
  {
    $this->response = $response;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStatsResponse
   */
  public function getResponse()
  {
    return $this->response;
  }
}
