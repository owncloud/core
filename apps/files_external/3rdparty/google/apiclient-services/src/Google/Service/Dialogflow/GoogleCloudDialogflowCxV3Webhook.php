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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Webhook extends Google_Model
{
  public $disabled;
  public $displayName;
  protected $genericWebServiceType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookGenericWebService';
  protected $genericWebServiceDataType = '';
  public $name;
  public $timeout;

  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookGenericWebService
   */
  public function setGenericWebService(Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookGenericWebService $genericWebService)
  {
    $this->genericWebService = $genericWebService;
  }
  /**
   * @return Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookGenericWebService
   */
  public function getGenericWebService()
  {
    return $this->genericWebService;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setTimeout($timeout)
  {
    $this->timeout = $timeout;
  }
  public function getTimeout()
  {
    return $this->timeout;
  }
}
