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

namespace Google\Service\Contentwarehouse;

class AssistantApiCoreTypesSipProviderInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $providerId;
  /**
   * @var string
   */
  public $realm;
  /**
   * @var bool
   */
  public $useBirdsongTacl;

  /**
   * @param string
   */
  public function setProviderId($providerId)
  {
    $this->providerId = $providerId;
  }
  /**
   * @return string
   */
  public function getProviderId()
  {
    return $this->providerId;
  }
  /**
   * @param string
   */
  public function setRealm($realm)
  {
    $this->realm = $realm;
  }
  /**
   * @return string
   */
  public function getRealm()
  {
    return $this->realm;
  }
  /**
   * @param bool
   */
  public function setUseBirdsongTacl($useBirdsongTacl)
  {
    $this->useBirdsongTacl = $useBirdsongTacl;
  }
  /**
   * @return bool
   */
  public function getUseBirdsongTacl()
  {
    return $this->useBirdsongTacl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssistantApiCoreTypesSipProviderInfo::class, 'Google_Service_Contentwarehouse_AssistantApiCoreTypesSipProviderInfo');
