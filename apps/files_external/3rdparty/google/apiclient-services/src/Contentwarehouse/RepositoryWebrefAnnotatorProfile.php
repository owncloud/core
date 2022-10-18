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

class RepositoryWebrefAnnotatorProfile extends \Google\Model
{
  /**
   * @var int
   */
  public $numCandidateMentions;
  /**
   * @var int
   */
  public $numEntities;
  /**
   * @var int
   */
  public $numMentions;
  /**
   * @var int
   */
  public $numTokens;
  protected $processorTimingsRootType = RepositoryWebrefProcessorTiming::class;
  protected $processorTimingsRootDataType = '';

  /**
   * @param int
   */
  public function setNumCandidateMentions($numCandidateMentions)
  {
    $this->numCandidateMentions = $numCandidateMentions;
  }
  /**
   * @return int
   */
  public function getNumCandidateMentions()
  {
    return $this->numCandidateMentions;
  }
  /**
   * @param int
   */
  public function setNumEntities($numEntities)
  {
    $this->numEntities = $numEntities;
  }
  /**
   * @return int
   */
  public function getNumEntities()
  {
    return $this->numEntities;
  }
  /**
   * @param int
   */
  public function setNumMentions($numMentions)
  {
    $this->numMentions = $numMentions;
  }
  /**
   * @return int
   */
  public function getNumMentions()
  {
    return $this->numMentions;
  }
  /**
   * @param int
   */
  public function setNumTokens($numTokens)
  {
    $this->numTokens = $numTokens;
  }
  /**
   * @return int
   */
  public function getNumTokens()
  {
    return $this->numTokens;
  }
  /**
   * @param RepositoryWebrefProcessorTiming
   */
  public function setProcessorTimingsRoot(RepositoryWebrefProcessorTiming $processorTimingsRoot)
  {
    $this->processorTimingsRoot = $processorTimingsRoot;
  }
  /**
   * @return RepositoryWebrefProcessorTiming
   */
  public function getProcessorTimingsRoot()
  {
    return $this->processorTimingsRoot;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefAnnotatorProfile::class, 'Google_Service_Contentwarehouse_RepositoryWebrefAnnotatorProfile');
