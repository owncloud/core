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

namespace Google\Service\ApiKeysService;

class V2Restrictions extends \Google\Collection
{
  protected $collection_key = 'apiTargets';
  protected $androidKeyRestrictionsType = V2AndroidKeyRestrictions::class;
  protected $androidKeyRestrictionsDataType = '';
  protected $apiTargetsType = V2ApiTarget::class;
  protected $apiTargetsDataType = 'array';
  protected $browserKeyRestrictionsType = V2BrowserKeyRestrictions::class;
  protected $browserKeyRestrictionsDataType = '';
  protected $iosKeyRestrictionsType = V2IosKeyRestrictions::class;
  protected $iosKeyRestrictionsDataType = '';
  protected $serverKeyRestrictionsType = V2ServerKeyRestrictions::class;
  protected $serverKeyRestrictionsDataType = '';

  /**
   * @param V2AndroidKeyRestrictions
   */
  public function setAndroidKeyRestrictions(V2AndroidKeyRestrictions $androidKeyRestrictions)
  {
    $this->androidKeyRestrictions = $androidKeyRestrictions;
  }
  /**
   * @return V2AndroidKeyRestrictions
   */
  public function getAndroidKeyRestrictions()
  {
    return $this->androidKeyRestrictions;
  }
  /**
   * @param V2ApiTarget[]
   */
  public function setApiTargets($apiTargets)
  {
    $this->apiTargets = $apiTargets;
  }
  /**
   * @return V2ApiTarget[]
   */
  public function getApiTargets()
  {
    return $this->apiTargets;
  }
  /**
   * @param V2BrowserKeyRestrictions
   */
  public function setBrowserKeyRestrictions(V2BrowserKeyRestrictions $browserKeyRestrictions)
  {
    $this->browserKeyRestrictions = $browserKeyRestrictions;
  }
  /**
   * @return V2BrowserKeyRestrictions
   */
  public function getBrowserKeyRestrictions()
  {
    return $this->browserKeyRestrictions;
  }
  /**
   * @param V2IosKeyRestrictions
   */
  public function setIosKeyRestrictions(V2IosKeyRestrictions $iosKeyRestrictions)
  {
    $this->iosKeyRestrictions = $iosKeyRestrictions;
  }
  /**
   * @return V2IosKeyRestrictions
   */
  public function getIosKeyRestrictions()
  {
    return $this->iosKeyRestrictions;
  }
  /**
   * @param V2ServerKeyRestrictions
   */
  public function setServerKeyRestrictions(V2ServerKeyRestrictions $serverKeyRestrictions)
  {
    $this->serverKeyRestrictions = $serverKeyRestrictions;
  }
  /**
   * @return V2ServerKeyRestrictions
   */
  public function getServerKeyRestrictions()
  {
    return $this->serverKeyRestrictions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(V2Restrictions::class, 'Google_Service_ApiKeysService_V2Restrictions');
