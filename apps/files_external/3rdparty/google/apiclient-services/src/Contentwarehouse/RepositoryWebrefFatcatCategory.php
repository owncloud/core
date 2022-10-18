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

class RepositoryWebrefFatcatCategory extends \Google\Model
{
  /**
   * @var string
   */
  public $debugId;
  /**
   * @var int
   */
  public $id;
  /**
   * @var float
   */
  public $score;

  /**
   * @param string
   */
  public function setDebugId($debugId)
  {
    $this->debugId = $debugId;
  }
  /**
   * @return string
   */
  public function getDebugId()
  {
    return $this->debugId;
  }
  /**
   * @param int
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
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
class_alias(RepositoryWebrefFatcatCategory::class, 'Google_Service_Contentwarehouse_RepositoryWebrefFatcatCategory');
