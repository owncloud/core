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

class RepositoryWebrefRefconMentionSpans extends \Google\Collection
{
  protected $collection_key = 'token';
  /**
   * @var string[]
   */
  public $segment;
  /**
   * @var string[]
   */
  public $shortToken;
  /**
   * @var string[]
   */
  public $token;

  /**
   * @param string[]
   */
  public function setSegment($segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return string[]
   */
  public function getSegment()
  {
    return $this->segment;
  }
  /**
   * @param string[]
   */
  public function setShortToken($shortToken)
  {
    $this->shortToken = $shortToken;
  }
  /**
   * @return string[]
   */
  public function getShortToken()
  {
    return $this->shortToken;
  }
  /**
   * @param string[]
   */
  public function setToken($token)
  {
    $this->token = $token;
  }
  /**
   * @return string[]
   */
  public function getToken()
  {
    return $this->token;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefRefconMentionSpans::class, 'Google_Service_Contentwarehouse_RepositoryWebrefRefconMentionSpans');
