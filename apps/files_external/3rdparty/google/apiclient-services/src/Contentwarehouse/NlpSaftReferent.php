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

class NlpSaftReferent extends \Google\Collection
{
  protected $collection_key = 'token';
  public $distance;
  /**
   * @var string
   */
  public $explicitness;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  protected $phraseType = NlpSaftPhrase::class;
  protected $phraseDataType = '';
  public $prominence;
  /**
   * @var string
   */
  public $role;
  protected $tokenType = NlpSaftToken::class;
  protected $tokenDataType = 'array';

  public function setDistance($distance)
  {
    $this->distance = $distance;
  }
  public function getDistance()
  {
    return $this->distance;
  }
  /**
   * @param string
   */
  public function setExplicitness($explicitness)
  {
    $this->explicitness = $explicitness;
  }
  /**
   * @return string
   */
  public function getExplicitness()
  {
    return $this->explicitness;
  }
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
  }
  /**
   * @param NlpSaftPhrase
   */
  public function setPhrase(NlpSaftPhrase $phrase)
  {
    $this->phrase = $phrase;
  }
  /**
   * @return NlpSaftPhrase
   */
  public function getPhrase()
  {
    return $this->phrase;
  }
  public function setProminence($prominence)
  {
    $this->prominence = $prominence;
  }
  public function getProminence()
  {
    return $this->prominence;
  }
  /**
   * @param string
   */
  public function setRole($role)
  {
    $this->role = $role;
  }
  /**
   * @return string
   */
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param NlpSaftToken[]
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return NlpSaftToken[]
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftReferent::class, 'Google_Service_Contentwarehouse_NlpSaftReferent');
