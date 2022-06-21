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

namespace Google\Service\NetworkServices;

class HttpRouteHeaderMatch extends \Google\Model
{
  /**
   * @var string
   */
  public $exactMatch;
  /**
   * @var string
   */
  public $header;
  /**
   * @var bool
   */
  public $invertMatch;
  /**
   * @var string
   */
  public $prefixMatch;
  /**
   * @var bool
   */
  public $presentMatch;
  protected $rangeMatchType = HttpRouteHeaderMatchIntegerRange::class;
  protected $rangeMatchDataType = '';
  /**
   * @var string
   */
  public $regexMatch;
  /**
   * @var string
   */
  public $suffixMatch;

  /**
   * @param string
   */
  public function setExactMatch($exactMatch)
  {
    $this->exactMatch = $exactMatch;
  }
  /**
   * @return string
   */
  public function getExactMatch()
  {
    return $this->exactMatch;
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
   * @param bool
   */
  public function setInvertMatch($invertMatch)
  {
    $this->invertMatch = $invertMatch;
  }
  /**
   * @return bool
   */
  public function getInvertMatch()
  {
    return $this->invertMatch;
  }
  /**
   * @param string
   */
  public function setPrefixMatch($prefixMatch)
  {
    $this->prefixMatch = $prefixMatch;
  }
  /**
   * @return string
   */
  public function getPrefixMatch()
  {
    return $this->prefixMatch;
  }
  /**
   * @param bool
   */
  public function setPresentMatch($presentMatch)
  {
    $this->presentMatch = $presentMatch;
  }
  /**
   * @return bool
   */
  public function getPresentMatch()
  {
    return $this->presentMatch;
  }
  /**
   * @param HttpRouteHeaderMatchIntegerRange
   */
  public function setRangeMatch(HttpRouteHeaderMatchIntegerRange $rangeMatch)
  {
    $this->rangeMatch = $rangeMatch;
  }
  /**
   * @return HttpRouteHeaderMatchIntegerRange
   */
  public function getRangeMatch()
  {
    return $this->rangeMatch;
  }
  /**
   * @param string
   */
  public function setRegexMatch($regexMatch)
  {
    $this->regexMatch = $regexMatch;
  }
  /**
   * @return string
   */
  public function getRegexMatch()
  {
    return $this->regexMatch;
  }
  /**
   * @param string
   */
  public function setSuffixMatch($suffixMatch)
  {
    $this->suffixMatch = $suffixMatch;
  }
  /**
   * @return string
   */
  public function getSuffixMatch()
  {
    return $this->suffixMatch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpRouteHeaderMatch::class, 'Google_Service_NetworkServices_HttpRouteHeaderMatch');
