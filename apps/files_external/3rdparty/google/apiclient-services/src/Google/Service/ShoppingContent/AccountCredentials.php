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

class Google_Service_ShoppingContent_AccountCredentials extends Google_Model
{
  public $accessToken;
  public $expiresIn;
  public $purpose;

  public function setAccessToken($accessToken)
  {
    $this->accessToken = $accessToken;
  }
  public function getAccessToken()
  {
    return $this->accessToken;
  }
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  public function setPurpose($purpose)
  {
    $this->purpose = $purpose;
  }
  public function getPurpose()
  {
    return $this->purpose;
  }
}
