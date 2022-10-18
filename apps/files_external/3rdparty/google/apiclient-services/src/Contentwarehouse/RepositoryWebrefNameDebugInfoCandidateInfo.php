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

class RepositoryWebrefNameDebugInfoCandidateInfo extends \Google\Model
{
  /**
   * @var bool
   */
  public $isMatchlessResultContext;
  /**
   * @var string
   */
  public $mid;
  /**
   * @var string
   */
  public $name;
  /**
   * @var float
   */
  public $resultEntityScore;

  /**
   * @param bool
   */
  public function setIsMatchlessResultContext($isMatchlessResultContext)
  {
    $this->isMatchlessResultContext = $isMatchlessResultContext;
  }
  /**
   * @return bool
   */
  public function getIsMatchlessResultContext()
  {
    return $this->isMatchlessResultContext;
  }
  /**
   * @param string
   */
  public function setMid($mid)
  {
    $this->mid = $mid;
  }
  /**
   * @return string
   */
  public function getMid()
  {
    return $this->mid;
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
  public function setResultEntityScore($resultEntityScore)
  {
    $this->resultEntityScore = $resultEntityScore;
  }
  /**
   * @return float
   */
  public function getResultEntityScore()
  {
    return $this->resultEntityScore;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefNameDebugInfoCandidateInfo::class, 'Google_Service_Contentwarehouse_RepositoryWebrefNameDebugInfoCandidateInfo');
