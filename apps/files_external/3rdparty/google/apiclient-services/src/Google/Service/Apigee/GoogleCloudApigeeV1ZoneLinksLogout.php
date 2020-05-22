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

class Google_Service_Apigee_GoogleCloudApigeeV1ZoneLinksLogout extends Google_Model
{
  public $disabledRedirectParameter;
  public $redirectParameterName;
  public $redirectUrl;
  public $whitelist;

  public function setDisabledRedirectParameter($disabledRedirectParameter)
  {
    $this->disabledRedirectParameter = $disabledRedirectParameter;
  }
  public function getDisabledRedirectParameter()
  {
    return $this->disabledRedirectParameter;
  }
  public function setRedirectParameterName($redirectParameterName)
  {
    $this->redirectParameterName = $redirectParameterName;
  }
  public function getRedirectParameterName()
  {
    return $this->redirectParameterName;
  }
  public function setRedirectUrl($redirectUrl)
  {
    $this->redirectUrl = $redirectUrl;
  }
  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }
  public function setWhitelist($whitelist)
  {
    $this->whitelist = $whitelist;
  }
  public function getWhitelist()
  {
    return $this->whitelist;
  }
}
