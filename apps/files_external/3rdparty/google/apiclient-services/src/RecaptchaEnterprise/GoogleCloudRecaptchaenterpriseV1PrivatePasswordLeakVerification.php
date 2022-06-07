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

namespace Google\Service\RecaptchaEnterprise;

class GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification extends \Google\Collection
{
  protected $collection_key = 'encryptedLeakMatchPrefixes';
  /**
   * @var string[]
   */
  public $encryptedLeakMatchPrefixes;
  /**
   * @var string
   */
  public $encryptedUserCredentialsHash;
  /**
   * @var string
   */
  public $lookupHashPrefix;
  /**
   * @var string
   */
  public $reencryptedUserCredentialsHash;

  /**
   * @param string[]
   */
  public function setEncryptedLeakMatchPrefixes($encryptedLeakMatchPrefixes)
  {
    $this->encryptedLeakMatchPrefixes = $encryptedLeakMatchPrefixes;
  }
  /**
   * @return string[]
   */
  public function getEncryptedLeakMatchPrefixes()
  {
    return $this->encryptedLeakMatchPrefixes;
  }
  /**
   * @param string
   */
  public function setEncryptedUserCredentialsHash($encryptedUserCredentialsHash)
  {
    $this->encryptedUserCredentialsHash = $encryptedUserCredentialsHash;
  }
  /**
   * @return string
   */
  public function getEncryptedUserCredentialsHash()
  {
    return $this->encryptedUserCredentialsHash;
  }
  /**
   * @param string
   */
  public function setLookupHashPrefix($lookupHashPrefix)
  {
    $this->lookupHashPrefix = $lookupHashPrefix;
  }
  /**
   * @return string
   */
  public function getLookupHashPrefix()
  {
    return $this->lookupHashPrefix;
  }
  /**
   * @param string
   */
  public function setReencryptedUserCredentialsHash($reencryptedUserCredentialsHash)
  {
    $this->reencryptedUserCredentialsHash = $reencryptedUserCredentialsHash;
  }
  /**
   * @return string
   */
  public function getReencryptedUserCredentialsHash()
  {
    return $this->reencryptedUserCredentialsHash;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification::class, 'Google_Service_RecaptchaEnterprise_GoogleCloudRecaptchaenterpriseV1PrivatePasswordLeakVerification');
