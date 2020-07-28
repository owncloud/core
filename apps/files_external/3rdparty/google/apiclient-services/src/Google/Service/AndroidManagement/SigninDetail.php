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

class Google_Service_AndroidManagement_SigninDetail extends Google_Model
{
  public $allowPersonalUsage;
  public $qrCode;
  public $signinEnrollmentToken;
  public $signinUrl;

  public function setAllowPersonalUsage($allowPersonalUsage)
  {
    $this->allowPersonalUsage = $allowPersonalUsage;
  }
  public function getAllowPersonalUsage()
  {
    return $this->allowPersonalUsage;
  }
  public function setQrCode($qrCode)
  {
    $this->qrCode = $qrCode;
  }
  public function getQrCode()
  {
    return $this->qrCode;
  }
  public function setSigninEnrollmentToken($signinEnrollmentToken)
  {
    $this->signinEnrollmentToken = $signinEnrollmentToken;
  }
  public function getSigninEnrollmentToken()
  {
    return $this->signinEnrollmentToken;
  }
  public function setSigninUrl($signinUrl)
  {
    $this->signinUrl = $signinUrl;
  }
  public function getSigninUrl()
  {
    return $this->signinUrl;
  }
}
