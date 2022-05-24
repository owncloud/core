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

class GoogleFirebaseAppcheckV1betaExchangeAppAttestAssertionRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $artifact;
  /**
   * @var string
   */
  public $assertion;
  /**
   * @var string
   */
  public $challenge;

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
  /**
   * @param string
   */
  public function setAssertion($assertion)
  {
    $this->assertion = $assertion;
  }
  /**
   * @return string
   */
  public function getAssertion()
  {
    return $this->assertion;
  }
  /**
   * @param string
   */
  public function setChallenge($challenge)
  {
    $this->challenge = $challenge;
  }
  /**
   * @return string
   */
  public function getChallenge()
  {
    return $this->challenge;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseAppcheckV1betaExchangeAppAttestAssertionRequest::class, 'Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaExchangeAppAttestAssertionRequest');
