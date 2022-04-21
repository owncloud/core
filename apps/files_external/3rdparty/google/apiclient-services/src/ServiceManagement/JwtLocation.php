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

namespace Google\Service\ServiceManagement;

class JwtLocation extends \Google\Model
{
  /**
   * @var string
   */
  public $cookie;
  /**
   * @var string
   */
  public $header;
  /**
   * @var string
   */
  public $query;
  /**
   * @var string
   */
  public $valuePrefix;

  /**
   * @param string
   */
  public function setCookie($cookie)
  {
    $this->cookie = $cookie;
  }
  /**
   * @return string
   */
  public function getCookie()
  {
    return $this->cookie;
  }
  /**
   * @param string
   */
  public function setHeader($header)
  {
    $this->header = $header;
  }
  /**
   * @return string
   */
  public function getHeader()
  {
    return $this->header;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param string
   */
  public function setValuePrefix($valuePrefix)
  {
    $this->valuePrefix = $valuePrefix;
  }
  /**
   * @return string
   */
  public function getValuePrefix()
  {
    return $this->valuePrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(JwtLocation::class, 'Google_Service_ServiceManagement_JwtLocation');
