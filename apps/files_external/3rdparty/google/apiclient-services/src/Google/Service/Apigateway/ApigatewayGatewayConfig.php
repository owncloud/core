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

class Google_Service_Apigateway_ApigatewayGatewayConfig extends Google_Model
{
  protected $backendConfigType = 'Google_Service_Apigateway_ApigatewayBackendConfig';
  protected $backendConfigDataType = '';

  /**
   * @param Google_Service_Apigateway_ApigatewayBackendConfig
   */
  public function setBackendConfig(Google_Service_Apigateway_ApigatewayBackendConfig $backendConfig)
  {
    $this->backendConfig = $backendConfig;
  }
  /**
   * @return Google_Service_Apigateway_ApigatewayBackendConfig
   */
  public function getBackendConfig()
  {
    return $this->backendConfig;
  }
}
