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

namespace Google\Service\MyBusinessVerifications;

class GenerateVerificationTokenResponse extends \Google\Model
{
  protected $tokenType = VerificationToken::class;
  protected $tokenDataType = '';

  /**
   * @param VerificationToken
   */
  public function setToken(VerificationToken $token)
  {
    $this->token = $token;
  }
  /**
   * @return VerificationToken
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GenerateVerificationTokenResponse::class, 'Google_Service_MyBusinessVerifications_GenerateVerificationTokenResponse');
