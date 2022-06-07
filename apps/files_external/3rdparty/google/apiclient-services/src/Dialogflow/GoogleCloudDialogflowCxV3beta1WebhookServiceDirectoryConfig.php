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

class GoogleCloudDialogflowCxV3beta1WebhookServiceDirectoryConfig extends \Google\Model
{
  protected $genericWebServiceType = GoogleCloudDialogflowCxV3beta1WebhookGenericWebService::class;
  protected $genericWebServiceDataType = '';
  /**
   * @var string
   */
  public $service;

  /**
   * @param GoogleCloudDialogflowCxV3beta1WebhookGenericWebService
   */
  public function setGenericWebService(GoogleCloudDialogflowCxV3beta1WebhookGenericWebService $genericWebService)
  {
    $this->genericWebService = $genericWebService;
  }
  /**
   * @return GoogleCloudDialogflowCxV3beta1WebhookGenericWebService
   */
  public function getGenericWebService()
  {
    return $this->genericWebService;
  }
  /**
   * @param string
   */
  public function setService($service)
  {
    $this->service = $service;
  }
  /**
   * @return string
   */
  public function getService()
  {
    return $this->service;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3beta1WebhookServiceDirectoryConfig::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3beta1WebhookServiceDirectoryConfig');
