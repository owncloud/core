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

namespace Google\Service\Analytics;

class ExperimentVariations extends \Google\Model
{
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $status;
  /**
   * @var string
   */
  public $url;
  public $weight;
  /**
   * @var bool
   */
  public $won;

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
   * @param string
   */
  public function setStatus($status)
  {
    $this->status = $status;
  }
  /**
   * @return string
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
  public function setWeight($weight)
  {
    $this->weight = $weight;
  }
  public function getWeight()
  {
    return $this->weight;
  }
  /**
   * @param bool
   */
  public function setWon($won)
  {
    $this->won = $won;
  }
  /**
   * @return bool
   */
  public function getWon()
  {
    return $this->won;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExperimentVariations::class, 'Google_Service_Analytics_ExperimentVariations');
