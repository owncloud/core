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

class Google_Service_CloudSecurityToken_GoogleIdentityStsV1ExchangeTokenRequest extends Google_Model
{
  public $grantType;
  public $options;
  public $requestedTokenType;
  public $subjectToken;
  public $subjectTokenType;

  public function setGrantType($grantType)
  {
    $this->grantType = $grantType;
  }
  public function getGrantType()
  {
    return $this->grantType;
  }
  public function setOptions($options)
  {
    $this->options = $options;
  }
  public function getOptions()
  {
    return $this->options;
  }
  public function setRequestedTokenType($requestedTokenType)
  {
    $this->requestedTokenType = $requestedTokenType;
  }
  public function getRequestedTokenType()
  {
    return $this->requestedTokenType;
  }
  public function setSubjectToken($subjectToken)
  {
    $this->subjectToken = $subjectToken;
  }
  public function getSubjectToken()
  {
    return $this->subjectToken;
  }
  public function setSubjectTokenType($subjectTokenType)
  {
    $this->subjectTokenType = $subjectTokenType;
  }
  public function getSubjectTokenType()
  {
    return $this->subjectTokenType;
  }
}
