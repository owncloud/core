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

class ResearchScienceSearchNavboostQueryInfo extends \Google\Model
{
  /**
   * @var float
   */
  public $impCount;
  /**
   * @var float
   */
  public $lccCount;
  /**
   * @var string
   */
  public $query;
  /**
   * @var float
   */
  public $queryCount;
  /**
   * @var float
   */
  public $queryDocCount;

  /**
   * @param float
   */
  public function setImpCount($impCount)
  {
    $this->impCount = $impCount;
  }
  /**
   * @return float
   */
  public function getImpCount()
  {
    return $this->impCount;
  }
  /**
   * @param float
   */
  public function setLccCount($lccCount)
  {
    $this->lccCount = $lccCount;
  }
  /**
   * @return float
   */
  public function getLccCount()
  {
    return $this->lccCount;
  }
  /**
   * @param string
   */
  public function setQuery($query)
  {
    $this->query = $query;
  }
  /**
   * @return string
   */
  public function getQuery()
  {
    return $this->query;
  }
  /**
   * @param float
   */
  public function setQueryCount($queryCount)
  {
    $this->queryCount = $queryCount;
  }
  /**
   * @return float
   */
  public function getQueryCount()
  {
    return $this->queryCount;
  }
  /**
   * @param float
   */
  public function setQueryDocCount($queryDocCount)
  {
    $this->queryDocCount = $queryDocCount;
  }
  /**
   * @return float
   */
  public function getQueryDocCount()
  {
    return $this->queryDocCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScienceSearchNavboostQueryInfo::class, 'Google_Service_Contentwarehouse_ResearchScienceSearchNavboostQueryInfo');
