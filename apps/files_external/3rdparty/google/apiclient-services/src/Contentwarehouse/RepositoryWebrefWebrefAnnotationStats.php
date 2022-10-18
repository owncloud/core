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

class RepositoryWebrefWebrefAnnotationStats extends \Google\Collection
{
  protected $collection_key = 'statsPerType';
  /**
   * @var float
   */
  public $docWeight;
  protected $ngramContextType = RepositoryWebrefNgramContext::class;
  protected $ngramContextDataType = 'array';
  /**
   * @var string
   */
  public $numCandidates;
  /**
   * @var string
   */
  public $numConceptsWithCandidates;
  /**
   * @var string
   */
  public $numConceptsWithMentions;
  /**
   * @var string
   */
  public $numRangesWithCandidates;
  protected $statsPerTypeType = RepositoryWebrefAnnotationStatsPerType::class;
  protected $statsPerTypeDataType = 'array';

  /**
   * @param float
   */
  public function setDocWeight($docWeight)
  {
    $this->docWeight = $docWeight;
  }
  /**
   * @return float
   */
  public function getDocWeight()
  {
    return $this->docWeight;
  }
  /**
   * @param RepositoryWebrefNgramContext[]
   */
  public function setNgramContext($ngramContext)
  {
    $this->ngramContext = $ngramContext;
  }
  /**
   * @return RepositoryWebrefNgramContext[]
   */
  public function getNgramContext()
  {
    return $this->ngramContext;
  }
  /**
   * @param string
   */
  public function setNumCandidates($numCandidates)
  {
    $this->numCandidates = $numCandidates;
  }
  /**
   * @return string
   */
  public function getNumCandidates()
  {
    return $this->numCandidates;
  }
  /**
   * @param string
   */
  public function setNumConceptsWithCandidates($numConceptsWithCandidates)
  {
    $this->numConceptsWithCandidates = $numConceptsWithCandidates;
  }
  /**
   * @return string
   */
  public function getNumConceptsWithCandidates()
  {
    return $this->numConceptsWithCandidates;
  }
  /**
   * @param string
   */
  public function setNumConceptsWithMentions($numConceptsWithMentions)
  {
    $this->numConceptsWithMentions = $numConceptsWithMentions;
  }
  /**
   * @return string
   */
  public function getNumConceptsWithMentions()
  {
    return $this->numConceptsWithMentions;
  }
  /**
   * @param string
   */
  public function setNumRangesWithCandidates($numRangesWithCandidates)
  {
    $this->numRangesWithCandidates = $numRangesWithCandidates;
  }
  /**
   * @return string
   */
  public function getNumRangesWithCandidates()
  {
    return $this->numRangesWithCandidates;
  }
  /**
   * @param RepositoryWebrefAnnotationStatsPerType[]
   */
  public function setStatsPerType($statsPerType)
  {
    $this->statsPerType = $statsPerType;
  }
  /**
   * @return RepositoryWebrefAnnotationStatsPerType[]
   */
  public function getStatsPerType()
  {
    return $this->statsPerType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefWebrefAnnotationStats::class, 'Google_Service_Contentwarehouse_RepositoryWebrefWebrefAnnotationStats');
