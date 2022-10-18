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

class RepositoryWebrefFreebaseType extends \Google\Collection
{
  protected $collection_key = 'provenance';
  /**
   * @var string[]
   */
  public $provenance;
  /**
   * @var float
   */
  public $score;
  /**
   * @var string
   */
  public $typeMid;
  /**
   * @var string
   */
  public $typeName;

  /**
   * @param string[]
   */
  public function setProvenance($provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return string[]
   */
  public function getProvenance()
  {
    return $this->provenance;
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
  /**
   * @param string
   */
  public function setTypeMid($typeMid)
  {
    $this->typeMid = $typeMid;
  }
  /**
   * @return string
   */
  public function getTypeMid()
  {
    return $this->typeMid;
  }
  /**
   * @param string
   */
  public function setTypeName($typeName)
  {
    $this->typeName = $typeName;
  }
  /**
   * @return string
   */
  public function getTypeName()
  {
    return $this->typeName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefFreebaseType::class, 'Google_Service_Contentwarehouse_RepositoryWebrefFreebaseType');
