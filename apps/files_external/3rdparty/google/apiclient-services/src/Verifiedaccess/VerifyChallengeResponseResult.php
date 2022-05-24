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

namespace Google\Service\Verifiedaccess;

class VerifyChallengeResponseResult extends \Google\Model
{
  /**
   * @var string
   */
  public $devicePermanentId;
  /**
   * @var string
   */
  public $deviceSignal;
  /**
   * @var string
   */
  public $keyTrustLevel;
  /**
   * @var string
   */
  public $signedPublicKeyAndChallenge;

  /**
   * @param string
   */
  public function setDevicePermanentId($devicePermanentId)
  {
    $this->devicePermanentId = $devicePermanentId;
  }
  /**
   * @return string
   */
  public function getDevicePermanentId()
  {
    return $this->devicePermanentId;
  }
  /**
   * @param string
   */
  public function setDeviceSignal($deviceSignal)
  {
    $this->deviceSignal = $deviceSignal;
  }
  /**
   * @return string
   */
  public function getDeviceSignal()
  {
    return $this->deviceSignal;
  }
  /**
   * @param string
   */
  public function setKeyTrustLevel($keyTrustLevel)
  {
    $this->keyTrustLevel = $keyTrustLevel;
  }
  /**
   * @return string
   */
  public function getKeyTrustLevel()
  {
    return $this->keyTrustLevel;
  }
  /**
   * @param string
   */
  public function setSignedPublicKeyAndChallenge($signedPublicKeyAndChallenge)
  {
    $this->signedPublicKeyAndChallenge = $signedPublicKeyAndChallenge;
  }
  /**
   * @return string
   */
  public function getSignedPublicKeyAndChallenge()
  {
    return $this->signedPublicKeyAndChallenge;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VerifyChallengeResponseResult::class, 'Google_Service_Verifiedaccess_VerifyChallengeResponseResult');
