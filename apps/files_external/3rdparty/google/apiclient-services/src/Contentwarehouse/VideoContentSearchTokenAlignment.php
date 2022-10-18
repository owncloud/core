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

class VideoContentSearchTokenAlignment extends \Google\Model
{
  /**
   * @var int
   */
  public $hypothesisIndex;
  /**
   * @var string
   */
  public $hypothesisToken;
  /**
   * @var int
   */
  public $referenceIndex;
  /**
   * @var string
   */
  public $referenceToken;
  /**
   * @var bool
   */
  public $tokenIsMatched;

  /**
   * @param int
   */
  public function setHypothesisIndex($hypothesisIndex)
  {
    $this->hypothesisIndex = $hypothesisIndex;
  }
  /**
   * @return int
   */
  public function getHypothesisIndex()
  {
    return $this->hypothesisIndex;
  }
  /**
   * @param string
   */
  public function setHypothesisToken($hypothesisToken)
  {
    $this->hypothesisToken = $hypothesisToken;
  }
  /**
   * @return string
   */
  public function getHypothesisToken()
  {
    return $this->hypothesisToken;
  }
  /**
   * @param int
   */
  public function setReferenceIndex($referenceIndex)
  {
    $this->referenceIndex = $referenceIndex;
  }
  /**
   * @return int
   */
  public function getReferenceIndex()
  {
    return $this->referenceIndex;
  }
  /**
   * @param string
   */
  public function setReferenceToken($referenceToken)
  {
    $this->referenceToken = $referenceToken;
  }
  /**
   * @return string
   */
  public function getReferenceToken()
  {
    return $this->referenceToken;
  }
  /**
   * @param bool
   */
  public function setTokenIsMatched($tokenIsMatched)
  {
    $this->tokenIsMatched = $tokenIsMatched;
  }
  /**
   * @return bool
   */
  public function getTokenIsMatched()
  {
    return $this->tokenIsMatched;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoContentSearchTokenAlignment::class, 'Google_Service_Contentwarehouse_VideoContentSearchTokenAlignment');
