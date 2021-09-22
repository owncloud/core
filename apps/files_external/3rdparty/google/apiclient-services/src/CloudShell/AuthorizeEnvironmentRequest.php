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

namespace Google\Service\CloudShell;

class AuthorizeEnvironmentRequest extends \Google\Model
{
  public $accessToken;
  public $expireTime;
  public $idToken;

  public function setAccessToken($accessToken)
  {
    $this->accessToken = $accessToken;
  }
  public function getAccessToken()
  {
    return $this->accessToken;
  }
  public function setExpireTime($expireTime)
  {
    $this->expireTime = $expireTime;
  }
  public function getExpireTime()
  {
    return $this->expireTime;
  }
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  public function getIdToken()
  {
    return $this->idToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthorizeEnvironmentRequest::class, 'Google_Service_CloudShell_AuthorizeEnvironmentRequest');
