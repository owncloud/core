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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3MatchIntentRequest extends \Google\Model
{
  protected $queryInputType = GoogleCloudDialogflowCxV3QueryInput::class;
  protected $queryInputDataType = '';
  protected $queryParamsType = GoogleCloudDialogflowCxV3QueryParameters::class;
  protected $queryParamsDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3QueryInput
   */
  public function setQueryInput(GoogleCloudDialogflowCxV3QueryInput $queryInput)
  {
    $this->queryInput = $queryInput;
  }
  /**
   * @return GoogleCloudDialogflowCxV3QueryInput
   */
  public function getQueryInput()
  {
    return $this->queryInput;
  }
  /**
   * @param GoogleCloudDialogflowCxV3QueryParameters
   */
  public function setQueryParams(GoogleCloudDialogflowCxV3QueryParameters $queryParams)
  {
    $this->queryParams = $queryParams;
  }
  /**
   * @return GoogleCloudDialogflowCxV3QueryParameters
   */
  public function getQueryParams()
  {
    return $this->queryParams;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3MatchIntentRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3MatchIntentRequest');
