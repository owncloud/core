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

namespace Google\Service\Pubsub;

class PushConfig extends \Google\Model
{
  public $attributes;
  protected $oidcTokenType = OidcToken::class;
  protected $oidcTokenDataType = '';
  public $pushEndpoint;

  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  public function getAttributes()
  {
    return $this->attributes;
  }
  /**
   * @param OidcToken
   */
  public function setOidcToken(OidcToken $oidcToken)
  {
    $this->oidcToken = $oidcToken;
  }
  /**
   * @return OidcToken
   */
  public function getOidcToken()
  {
    return $this->oidcToken;
  }
  public function setPushEndpoint($pushEndpoint)
  {
    $this->pushEndpoint = $pushEndpoint;
  }
  public function getPushEndpoint()
  {
    return $this->pushEndpoint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PushConfig::class, 'Google_Service_Pubsub_PushConfig');
