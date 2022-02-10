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

namespace Google\Service\FirebaseDynamicLinks;

class ITunesConnectAnalytics extends \Google\Model
{
  /**
   * @var string
   */
  public $at;
  /**
   * @var string
   */
  public $ct;
  /**
   * @var string
   */
  public $mt;
  /**
   * @var string
   */
  public $pt;

  /**
   * @param string
   */
  public function setAt($at)
  {
    $this->at = $at;
  }
  /**
   * @return string
   */
  public function getAt()
  {
    return $this->at;
  }
  /**
   * @param string
   */
  public function setCt($ct)
  {
    $this->ct = $ct;
  }
  /**
   * @return string
   */
  public function getCt()
  {
    return $this->ct;
  }
  /**
   * @param string
   */
  public function setMt($mt)
  {
    $this->mt = $mt;
  }
  /**
   * @return string
   */
  public function getMt()
  {
    return $this->mt;
  }
  /**
   * @param string
   */
  public function setPt($pt)
  {
    $this->pt = $pt;
  }
  /**
   * @return string
   */
  public function getPt()
  {
    return $this->pt;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ITunesConnectAnalytics::class, 'Google_Service_FirebaseDynamicLinks_ITunesConnectAnalytics');
