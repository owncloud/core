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

class SpamMuppetjoinsMuppetSignals extends \Google\Model
{
  /**
   * @var int
   */
  public $hackedDateNautilus;
  /**
   * @var int
   */
  public $hackedDateRaiden;
  public $raidenScore;
  /**
   * @var string
   */
  public $site;

  /**
   * @param int
   */
  public function setHackedDateNautilus($hackedDateNautilus)
  {
    $this->hackedDateNautilus = $hackedDateNautilus;
  }
  /**
   * @return int
   */
  public function getHackedDateNautilus()
  {
    return $this->hackedDateNautilus;
  }
  /**
   * @param int
   */
  public function setHackedDateRaiden($hackedDateRaiden)
  {
    $this->hackedDateRaiden = $hackedDateRaiden;
  }
  /**
   * @return int
   */
  public function getHackedDateRaiden()
  {
    return $this->hackedDateRaiden;
  }
  public function setRaidenScore($raidenScore)
  {
    $this->raidenScore = $raidenScore;
  }
  public function getRaidenScore()
  {
    return $this->raidenScore;
  }
  /**
   * @param string
   */
  public function setSite($site)
  {
    $this->site = $site;
  }
  /**
   * @return string
   */
  public function getSite()
  {
    return $this->site;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpamMuppetjoinsMuppetSignals::class, 'Google_Service_Contentwarehouse_SpamMuppetjoinsMuppetSignals');
