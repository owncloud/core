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

class CrawlerChangerateSingleComponentDistribution extends \Google\Model
{
  /**
   * @var float
   */
  public $logScaling;
  /**
   * @var string
   */
  public $type;
  /**
   * @var float
   */
  public $weight;

  /**
   * @param float
   */
  public function setLogScaling($logScaling)
  {
    $this->logScaling = $logScaling;
  }
  /**
   * @return float
   */
  public function getLogScaling()
  {
    return $this->logScaling;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
  /**
   * @param float
   */
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  /**
   * @return float
   */
  public function getWeight()
  {
    return $this->weight;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CrawlerChangerateSingleComponentDistribution::class, 'Google_Service_Contentwarehouse_CrawlerChangerateSingleComponentDistribution');
