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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1OptimizedStats extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "response" => "Response",
  ];
  protected $responseType = GoogleCloudApigeeV1OptimizedStatsResponse::class;
  protected $responseDataType = '';

  /**
   * @param GoogleCloudApigeeV1OptimizedStatsResponse
   */
  public function setResponse(GoogleCloudApigeeV1OptimizedStatsResponse $response)
  {
    $this->response = $response;
  }
  /**
   * @return GoogleCloudApigeeV1OptimizedStatsResponse
   */
  public function getResponse()
  {
    return $this->response;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1OptimizedStats::class, 'Google_Service_Apigee_GoogleCloudApigeeV1OptimizedStats');
