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

class HtmlrenderWebkitHeadlessProtoCookie extends \Google\Model
{
  /**
   * @var string
   */
  public $domain;
  public $expiration;
  /**
   * @var bool
   */
  public $httpOnly;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $path;
  /**
   * @var string
   */
  public $sameSite;
  /**
   * @var bool
   */
  public $secure;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setDomain($domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return string
   */
  public function getDomain()
  {
    return $this->domain;
  }
  public function setExpiration($expiration)
  {
    $this->expiration = $expiration;
  }
  public function getExpiration()
  {
    return $this->expiration;
  }
  /**
   * @param bool
   */
  public function setHttpOnly($httpOnly)
  {
    $this->httpOnly = $httpOnly;
  }
  /**
   * @return bool
   */
  public function getHttpOnly()
  {
    return $this->httpOnly;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param string
   */
  public function setSameSite($sameSite)
  {
    $this->sameSite = $sameSite;
  }
  /**
   * @return string
   */
  public function getSameSite()
  {
    return $this->sameSite;
  }
  /**
   * @param bool
   */
  public function setSecure($secure)
  {
    $this->secure = $secure;
  }
  /**
   * @return bool
   */
  public function getSecure()
  {
    return $this->secure;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HtmlrenderWebkitHeadlessProtoCookie::class, 'Google_Service_Contentwarehouse_HtmlrenderWebkitHeadlessProtoCookie');
