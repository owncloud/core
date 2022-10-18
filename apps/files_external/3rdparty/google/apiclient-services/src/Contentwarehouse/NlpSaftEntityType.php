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

class NlpSaftEntityType extends \Google\Model
{
  /**
   * @var int
   */
  public $basedOnMention;
  /**
   * @var string
   */
  public $domain;
  protected $infoType = Proto2BridgeMessageSet::class;
  protected $infoDataType = '';
  /**
   * @var string
   */
  public $name;
  /**
   * @var float
   */
  public $score;

  /**
   * @param int
   */
  public function setBasedOnMention($basedOnMention)
  {
    $this->basedOnMention = $basedOnMention;
  }
  /**
   * @return int
   */
  public function getBasedOnMention()
  {
    return $this->basedOnMention;
  }
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
  /**
   * @param Proto2BridgeMessageSet
   */
  public function setInfo(Proto2BridgeMessageSet $info)
  {
    $this->info = $info;
  }
  /**
   * @return Proto2BridgeMessageSet
   */
  public function getInfo()
  {
    return $this->info;
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
   * @param float
   */
  public function setScore($score)
  {
    $this->score = $score;
  }
  /**
   * @return float
   */
  public function getScore()
  {
    return $this->score;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftEntityType::class, 'Google_Service_Contentwarehouse_NlpSaftEntityType');
