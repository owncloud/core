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

namespace Google\Service\Firebaseappcheck;

class GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationResponse extends \Google\Model
{
  protected $appCheckTokenType = GoogleFirebaseAppcheckV1AppCheckToken::class;
  protected $appCheckTokenDataType = '';
  /**
   * @var string
   */
  public $artifact;

  /**
   * @param GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function setAppCheckToken(GoogleFirebaseAppcheckV1AppCheckToken $appCheckToken)
  {
    $this->appCheckToken = $appCheckToken;
  }
  /**
   * @return GoogleFirebaseAppcheckV1AppCheckToken
   */
  public function getAppCheckToken()
  {
    return $this->appCheckToken;
  }
  /**
   * @param string
   */
  public function setArtifact($artifact)
  {
    $this->artifact = $artifact;
  }
  /**
   * @return string
   */
  public function getArtifact()
  {
    return $this->artifact;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationResponse::class, 'Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1ExchangeAppAttestAttestationResponse');
