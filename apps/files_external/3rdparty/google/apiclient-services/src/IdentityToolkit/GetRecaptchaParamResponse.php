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

namespace Google\Service\IdentityToolkit;

class GetRecaptchaParamResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $recaptchaSiteKey;
  /**
   * @var string
   */
  public $recaptchaStoken;

  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setRecaptchaSiteKey($recaptchaSiteKey)
  {
    $this->recaptchaSiteKey = $recaptchaSiteKey;
  }
  /**
   * @return string
   */
  public function getRecaptchaSiteKey()
  {
    return $this->recaptchaSiteKey;
  }
  /**
   * @param string
   */
  public function setRecaptchaStoken($recaptchaStoken)
  {
    $this->recaptchaStoken = $recaptchaStoken;
  }
  /**
   * @return string
   */
  public function getRecaptchaStoken()
  {
    return $this->recaptchaStoken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GetRecaptchaParamResponse::class, 'Google_Service_IdentityToolkit_GetRecaptchaParamResponse');
