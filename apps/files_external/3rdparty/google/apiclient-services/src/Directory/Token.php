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

namespace Google\Service\Directory;

class Token extends \Google\Collection
{
  protected $collection_key = 'scopes';
  /**
   * @var bool
   */
  public $anonymous;
  /**
   * @var string
   */
  public $clientId;
  /**
   * @var string
   */
  public $displayText;
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var bool
   */
  public $nativeApp;
  /**
   * @var string[]
   */
  public $scopes;
  /**
   * @var string
   */
  public $userKey;

  /**
   * @param bool
   */
  public function setAnonymous($anonymous)
  {
    $this->anonymous = $anonymous;
  }
  /**
   * @return bool
   */
  public function getAnonymous()
  {
    return $this->anonymous;
  }
  /**
   * @param string
   */
  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }
  /**
   * @return string
   */
  public function getClientId()
  {
    return $this->clientId;
  }
  /**
   * @param string
   */
  public function setDisplayText($displayText)
  {
    $this->displayText = $displayText;
  }
  /**
   * @return string
   */
  public function getDisplayText()
  {
    return $this->displayText;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
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
   * @param bool
   */
  public function setNativeApp($nativeApp)
  {
    $this->nativeApp = $nativeApp;
  }
  /**
   * @return bool
   */
  public function getNativeApp()
  {
    return $this->nativeApp;
  }
  /**
   * @param string[]
   */
  public function setScopes($scopes)
  {
    $this->scopes = $scopes;
  }
  /**
   * @return string[]
   */
  public function getScopes()
  {
    return $this->scopes;
  }
  /**
   * @param string
   */
  public function setUserKey($userKey)
  {
    $this->userKey = $userKey;
  }
  /**
   * @return string
   */
  public function getUserKey()
  {
    return $this->userKey;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Token::class, 'Google_Service_Directory_Token');
