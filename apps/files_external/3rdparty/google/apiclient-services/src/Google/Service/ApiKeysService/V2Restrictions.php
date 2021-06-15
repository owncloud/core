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

class Google_Service_ApiKeysService_V2Restrictions extends Google_Collection
{
  protected $collection_key = 'apiTargets';
  protected $androidKeyRestrictionsType = 'Google_Service_ApiKeysService_V2AndroidKeyRestrictions';
  protected $androidKeyRestrictionsDataType = '';
  protected $apiTargetsType = 'Google_Service_ApiKeysService_V2ApiTarget';
  protected $apiTargetsDataType = 'array';
  protected $browserKeyRestrictionsType = 'Google_Service_ApiKeysService_V2BrowserKeyRestrictions';
  protected $browserKeyRestrictionsDataType = '';
  protected $iosKeyRestrictionsType = 'Google_Service_ApiKeysService_V2IosKeyRestrictions';
  protected $iosKeyRestrictionsDataType = '';
  protected $serverKeyRestrictionsType = 'Google_Service_ApiKeysService_V2ServerKeyRestrictions';
  protected $serverKeyRestrictionsDataType = '';

  /**
   * @param Google_Service_ApiKeysService_V2AndroidKeyRestrictions
   */
  public function setAndroidKeyRestrictions(Google_Service_ApiKeysService_V2AndroidKeyRestrictions $androidKeyRestrictions)
  {
    $this->androidKeyRestrictions = $androidKeyRestrictions;
  }
  /**
   * @return Google_Service_ApiKeysService_V2AndroidKeyRestrictions
   */
  public function getAndroidKeyRestrictions()
  {
    return $this->androidKeyRestrictions;
  }
  /**
   * @param Google_Service_ApiKeysService_V2ApiTarget[]
   */
  public function setApiTargets($apiTargets)
  {
    $this->apiTargets = $apiTargets;
  }
  /**
   * @return Google_Service_ApiKeysService_V2ApiTarget[]
   */
  public function getApiTargets()
  {
    return $this->apiTargets;
  }
  /**
   * @param Google_Service_ApiKeysService_V2BrowserKeyRestrictions
   */
  public function setBrowserKeyRestrictions(Google_Service_ApiKeysService_V2BrowserKeyRestrictions $browserKeyRestrictions)
  {
    $this->browserKeyRestrictions = $browserKeyRestrictions;
  }
  /**
   * @return Google_Service_ApiKeysService_V2BrowserKeyRestrictions
   */
  public function getBrowserKeyRestrictions()
  {
    return $this->browserKeyRestrictions;
  }
  /**
   * @param Google_Service_ApiKeysService_V2IosKeyRestrictions
   */
  public function setIosKeyRestrictions(Google_Service_ApiKeysService_V2IosKeyRestrictions $iosKeyRestrictions)
  {
    $this->iosKeyRestrictions = $iosKeyRestrictions;
  }
  /**
   * @return Google_Service_ApiKeysService_V2IosKeyRestrictions
   */
  public function getIosKeyRestrictions()
  {
    return $this->iosKeyRestrictions;
  }
  /**
   * @param Google_Service_ApiKeysService_V2ServerKeyRestrictions
   */
  public function setServerKeyRestrictions(Google_Service_ApiKeysService_V2ServerKeyRestrictions $serverKeyRestrictions)
  {
    $this->serverKeyRestrictions = $serverKeyRestrictions;
  }
  /**
   * @return Google_Service_ApiKeysService_V2ServerKeyRestrictions
   */
  public function getServerKeyRestrictions()
  {
    return $this->serverKeyRestrictions;
  }
}
