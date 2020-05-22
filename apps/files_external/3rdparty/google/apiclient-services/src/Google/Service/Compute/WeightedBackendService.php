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

class Google_Service_Compute_WeightedBackendService extends Google_Model
{
  public $backendService;
  protected $headerActionType = 'Google_Service_Compute_HttpHeaderAction';
  protected $headerActionDataType = '';
  public $weight;

  public function setBackendService($backendService)
  {
    $this->backendService = $backendService;
  }
  public function getBackendService()
  {
    return $this->backendService;
  }
  /**
   * @param Google_Service_Compute_HttpHeaderAction
   */
  public function setHeaderAction(Google_Service_Compute_HttpHeaderAction $headerAction)
  {
    $this->headerAction = $headerAction;
  }
  /**
   * @return Google_Service_Compute_HttpHeaderAction
   */
  public function getHeaderAction()
  {
    return $this->headerAction;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
}
