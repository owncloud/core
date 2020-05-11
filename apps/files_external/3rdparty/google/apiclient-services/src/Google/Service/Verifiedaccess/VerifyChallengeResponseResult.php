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

class Google_Service_Verifiedaccess_VerifyChallengeResponseResult extends Google_Model
{
  public $deviceEnrollmentId;
  public $devicePermanentId;
  public $signedPublicKeyAndChallenge;
  public $verificationOutput;

  public function setDeviceEnrollmentId($deviceEnrollmentId)
  {
    $this->deviceEnrollmentId = $deviceEnrollmentId;
  }
  public function getDeviceEnrollmentId()
  {
    return $this->deviceEnrollmentId;
  }
  public function setDevicePermanentId($devicePermanentId)
  {
    $this->devicePermanentId = $devicePermanentId;
  }
  public function getDevicePermanentId()
  {
    return $this->devicePermanentId;
  }
  public function setSignedPublicKeyAndChallenge($signedPublicKeyAndChallenge)
  {
    $this->signedPublicKeyAndChallenge = $signedPublicKeyAndChallenge;
  }
  public function getSignedPublicKeyAndChallenge()
  {
    return $this->signedPublicKeyAndChallenge;
  }
  public function setVerificationOutput($verificationOutput)
  {
    $this->verificationOutput = $verificationOutput;
  }
  public function getVerificationOutput()
  {
    return $this->verificationOutput;
  }
}
