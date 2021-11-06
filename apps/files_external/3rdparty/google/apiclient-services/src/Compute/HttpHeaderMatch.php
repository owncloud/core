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

namespace Google\Service\Compute;

class HttpHeaderMatch extends \Google\Model
{
  public $exactMatch;
  public $headerName;
  public $invertMatch;
  public $prefixMatch;
  public $presentMatch;
  protected $rangeMatchType = Int64RangeMatch::class;
  protected $rangeMatchDataType = '';
  public $regexMatch;
  public $suffixMatch;

  public function setExactMatch($exactMatch)
  {
    $this->exactMatch = $exactMatch;
  }
  public function getExactMatch()
  {
    return $this->exactMatch;
  }
  public function setHeaderName($headerName)
  {
    $this->headerName = $headerName;
  }
  public function getHeaderName()
  {
    return $this->headerName;
  }
  public function setInvertMatch($invertMatch)
  {
    $this->invertMatch = $invertMatch;
  }
  public function getInvertMatch()
  {
    return $this->invertMatch;
  }
  public function setPrefixMatch($prefixMatch)
  {
    $this->prefixMatch = $prefixMatch;
  }
  public function getPrefixMatch()
  {
    return $this->prefixMatch;
  }
  public function setPresentMatch($presentMatch)
  {
    $this->presentMatch = $presentMatch;
  }
  public function getPresentMatch()
  {
    return $this->presentMatch;
  }
  /**
   * @param Int64RangeMatch
   */
  public function setRangeMatch(Int64RangeMatch $rangeMatch)
  {
    $this->rangeMatch = $rangeMatch;
  }
  /**
   * @return Int64RangeMatch
   */
  public function getRangeMatch()
  {
    return $this->rangeMatch;
  }
  public function setRegexMatch($regexMatch)
  {
    $this->regexMatch = $regexMatch;
  }
  public function getRegexMatch()
  {
    return $this->regexMatch;
  }
  public function setSuffixMatch($suffixMatch)
  {
    $this->suffixMatch = $suffixMatch;
  }
  public function getSuffixMatch()
  {
    return $this->suffixMatch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpHeaderMatch::class, 'Google_Service_Compute_HttpHeaderMatch');
