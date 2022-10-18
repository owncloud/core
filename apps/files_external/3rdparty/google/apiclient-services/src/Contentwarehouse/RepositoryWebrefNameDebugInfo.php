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

class RepositoryWebrefNameDebugInfo extends \Google\Collection
{
  protected $collection_key = 'candidates';
  protected $candidatesType = RepositoryWebrefNameDebugInfoCandidateInfo::class;
  protected $candidatesDataType = 'array';
  protected $queryType = RepositoryWebrefLocalizedString::class;
  protected $queryDataType = '';
  /**
   * @var float
   */
  public $weight;

  /**
   * @param RepositoryWebrefNameDebugInfoCandidateInfo[]
   */
  public function setCandidates($candidates)
  {
    $this->candidates = $candidates;
  }
  /**
   * @return RepositoryWebrefNameDebugInfoCandidateInfo[]
   */
  public function getCandidates()
  {
    return $this->candidates;
  }
  /**
   * @param RepositoryWebrefLocalizedString
   */
  public function setQuery(RepositoryWebrefLocalizedString $query)
  {
    $this->query = $query;
  }
  /**
   * @return RepositoryWebrefLocalizedString
   */
  public function getQuery()
  {
    return $this->query;
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
class_alias(RepositoryWebrefNameDebugInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefNameDebugInfo');
