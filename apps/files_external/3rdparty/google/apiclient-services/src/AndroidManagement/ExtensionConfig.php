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

namespace Google\Service\AndroidManagement;

class ExtensionConfig extends \Google\Collection
{
  protected $collection_key = 'signingKeyFingerprintsSha256';
  /**
   * @var string
   */
  public $notificationReceiver;
  /**
   * @var string[]
   */
  public $signingKeyFingerprintsSha256;

  /**
   * @param string
   */
  public function setNotificationReceiver($notificationReceiver)
  {
    $this->notificationReceiver = $notificationReceiver;
  }
  /**
   * @return string
   */
  public function getNotificationReceiver()
  {
    return $this->notificationReceiver;
  }
  /**
   * @param string[]
   */
  public function setSigningKeyFingerprintsSha256($signingKeyFingerprintsSha256)
  {
    $this->signingKeyFingerprintsSha256 = $signingKeyFingerprintsSha256;
  }
  /**
   * @return string[]
   */
  public function getSigningKeyFingerprintsSha256()
  {
    return $this->signingKeyFingerprintsSha256;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtensionConfig::class, 'Google_Service_AndroidManagement_ExtensionConfig');
