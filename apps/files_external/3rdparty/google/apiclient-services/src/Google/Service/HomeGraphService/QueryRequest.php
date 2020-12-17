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

class Google_Service_HomeGraphService_QueryRequest extends Google_Collection
{
  protected $collection_key = 'inputs';
  public $agentUserId;
  protected $inputsType = 'Google_Service_HomeGraphService_QueryRequestInput';
  protected $inputsDataType = 'array';
  public $requestId;

  public function setAgentUserId($agentUserId)
  {
    $this->agentUserId = $agentUserId;
  }
  public function getAgentUserId()
  {
    return $this->agentUserId;
  }
  /**
   * @param Google_Service_HomeGraphService_QueryRequestInput[]
   */
  public function setInputs($inputs)
  {
    $this->inputs = $inputs;
  }
  /**
   * @return Google_Service_HomeGraphService_QueryRequestInput[]
   */
  public function getInputs()
  {
    return $this->inputs;
  }
  public function setRequestId($requestId)
  {
    $this->requestId = $requestId;
  }
  public function getRequestId()
  {
    return $this->requestId;
  }
}
