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

class Google_Service_TrafficDirectorService_ValueMatcher extends Google_Model
{
  public $boolMatch;
  protected $doubleMatchType = 'Google_Service_TrafficDirectorService_DoubleMatcher';
  protected $doubleMatchDataType = '';
  protected $listMatchType = 'Google_Service_TrafficDirectorService_ListMatcher';
  protected $listMatchDataType = '';
  protected $nullMatchType = 'Google_Service_TrafficDirectorService_NullMatch';
  protected $nullMatchDataType = '';
  public $presentMatch;
  protected $stringMatchType = 'Google_Service_TrafficDirectorService_StringMatcher';
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
   * @param Google_Service_TrafficDirectorService_DoubleMatcher
   */
  public function setDoubleMatch(Google_Service_TrafficDirectorService_DoubleMatcher $doubleMatch)
  {
    $this->doubleMatch = $doubleMatch;
  }
  /**
   * @return Google_Service_TrafficDirectorService_DoubleMatcher
   */
  public function getDoubleMatch()
  {
    return $this->doubleMatch;
  }
  /**
   * @param Google_Service_TrafficDirectorService_ListMatcher
   */
  public function setListMatch(Google_Service_TrafficDirectorService_ListMatcher $listMatch)
  {
    $this->listMatch = $listMatch;
  }
  /**
   * @return Google_Service_TrafficDirectorService_ListMatcher
   */
  public function getListMatch()
  {
    return $this->listMatch;
  }
  /**
   * @param Google_Service_TrafficDirectorService_NullMatch
   */
  public function setNullMatch(Google_Service_TrafficDirectorService_NullMatch $nullMatch)
  {
    $this->nullMatch = $nullMatch;
  }
  /**
   * @return Google_Service_TrafficDirectorService_NullMatch
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
   * @param Google_Service_TrafficDirectorService_StringMatcher
   */
  public function setStringMatch(Google_Service_TrafficDirectorService_StringMatcher $stringMatch)
  {
    $this->stringMatch = $stringMatch;
  }
  /**
   * @return Google_Service_TrafficDirectorService_StringMatcher
   */
  public function getStringMatch()
  {
    return $this->stringMatch;
  }
}
