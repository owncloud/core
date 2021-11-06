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

class ValueMatcher extends \Google\Model
{
  public $boolMatch;
  protected $doubleMatchType = DoubleMatcher::class;
  protected $doubleMatchDataType = '';
  protected $listMatchType = ListMatcher::class;
  protected $listMatchDataType = '';
  protected $nullMatchType = NullMatch::class;
  protected $nullMatchDataType = '';
  public $presentMatch;
  protected $stringMatchType = StringMatcher::class;
  protected $stringMatchDataType = '';

  public function setBoolMatch($boolMatch)
  {
    $this->boolMatch = $boolMatch;
  }
  public function getBoolMatch()
  {
    return $this->boolMatch;
  }
  /**
   * @param DoubleMatcher
   */
  public function setDoubleMatch(DoubleMatcher $doubleMatch)
  {
    $this->doubleMatch = $doubleMatch;
  }
  /**
   * @return DoubleMatcher
   */
  public function getDoubleMatch()
  {
    return $this->doubleMatch;
  }
  /**
   * @param ListMatcher
   */
  public function setListMatch(ListMatcher $listMatch)
  {
    $this->listMatch = $listMatch;
  }
  /**
   * @return ListMatcher
   */
  public function getListMatch()
  {
    return $this->listMatch;
  }
  /**
   * @param NullMatch
   */
  public function setNullMatch(NullMatch $nullMatch)
  {
    $this->nullMatch = $nullMatch;
  }
  /**
   * @return NullMatch
   */
  public function getNullMatch()
  {
    return $this->nullMatch;
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
   * @param StringMatcher
   */
  public function setStringMatch(StringMatcher $stringMatch)
  {
    $this->stringMatch = $stringMatch;
  }
  /**
   * @return StringMatcher
   */
  public function getStringMatch()
  {
    return $this->stringMatch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ValueMatcher::class, 'Google_Service_TrafficDirectorService_ValueMatcher');
