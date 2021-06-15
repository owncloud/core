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

class Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookServiceDirectoryConfig extends Google_Model
{
  protected $genericWebServiceType = 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookGenericWebService';
  protected $genericWebServiceDataType = '';
  public $service;

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
  public function setService($service)
  {
    $this->service = $service;
  }
  public function getService()
  {
    return $this->service;
  }
}
