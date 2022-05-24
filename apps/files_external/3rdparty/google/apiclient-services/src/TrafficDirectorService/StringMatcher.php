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

namespace Google\Service\TrafficDirectorService;

class StringMatcher extends \Google\Model
{
  /**
   * @var string
   */
  public $exact;
  /**
   * @var bool
   */
  public $ignoreCase;
  /**
   * @var string
   */
  public $prefix;
  /**
   * @var string
   */
  public $regex;
  protected $safeRegexType = RegexMatcher::class;
  protected $safeRegexDataType = '';
  /**
   * @var string
   */
  public $suffix;

  /**
   * @param string
   */
  public function setExact($exact)
  {
    $this->exact = $exact;
  }
  /**
   * @return string
   */
  public function getExact()
  {
    return $this->exact;
  }
  /**
   * @param bool
   */
  public function setIgnoreCase($ignoreCase)
  {
    $this->ignoreCase = $ignoreCase;
  }
  /**
   * @return bool
   */
  public function getIgnoreCase()
  {
    return $this->ignoreCase;
  }
  /**
   * @param string
   */
  public function setPrefix($prefix)
  {
    $this->prefix = $prefix;
  }
  /**
   * @return string
   */
  public function getPrefix()
  {
    return $this->prefix;
  }
  /**
   * @param string
   */
  public function setRegex($regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return string
   */
  public function getRegex()
  {
    return $this->regex;
  }
  /**
   * @param RegexMatcher
   */
  public function setSafeRegex(RegexMatcher $safeRegex)
  {
    $this->safeRegex = $safeRegex;
  }
  /**
   * @return RegexMatcher
   */
  public function getSafeRegex()
  {
    return $this->safeRegex;
  }
  /**
   * @param string
   */
  public function setSuffix($suffix)
  {
    $this->suffix = $suffix;
  }
  /**
   * @return string
   */
  public function getSuffix()
  {
    return $this->suffix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StringMatcher::class, 'Google_Service_TrafficDirectorService_StringMatcher');
