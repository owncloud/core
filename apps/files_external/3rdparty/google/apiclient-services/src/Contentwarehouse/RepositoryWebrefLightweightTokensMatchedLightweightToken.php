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

class RepositoryWebrefLightweightTokensMatchedLightweightToken extends \Google\Model
{
  /**
   * @var int
   */
  public $additionalBeginOffset;
  /**
   * @var int
   */
  public $additionalEndOffset;
  /**
   * @var int
   */
  public $beginOffset;
  /**
   * @var int
   */
  public $endOffset;
  /**
   * @var string
   */
  public $patternId;
  /**
   * @var int
   */
  public $sourceEntityIndex;
  /**
   * @var string
   */
  public $type;

  /**
   * @param int
   */
  public function setAdditionalBeginOffset($additionalBeginOffset)
  {
    $this->additionalBeginOffset = $additionalBeginOffset;
  }
  /**
   * @return int
   */
  public function getAdditionalBeginOffset()
  {
    return $this->additionalBeginOffset;
  }
  /**
   * @param int
   */
  public function setAdditionalEndOffset($additionalEndOffset)
  {
    $this->additionalEndOffset = $additionalEndOffset;
  }
  /**
   * @return int
   */
  public function getAdditionalEndOffset()
  {
    return $this->additionalEndOffset;
  }
  /**
   * @param int
   */
  public function setBeginOffset($beginOffset)
  {
    $this->beginOffset = $beginOffset;
  }
  /**
   * @return int
   */
  public function getBeginOffset()
  {
    return $this->beginOffset;
  }
  /**
   * @param int
   */
  public function setEndOffset($endOffset)
  {
    $this->endOffset = $endOffset;
  }
  /**
   * @return int
   */
  public function getEndOffset()
  {
    return $this->endOffset;
  }
  /**
   * @param string
   */
  public function setPatternId($patternId)
  {
    $this->patternId = $patternId;
  }
  /**
   * @return string
   */
  public function getPatternId()
  {
    return $this->patternId;
  }
  /**
   * @param int
   */
  public function setSourceEntityIndex($sourceEntityIndex)
  {
    $this->sourceEntityIndex = $sourceEntityIndex;
  }
  /**
   * @return int
   */
  public function getSourceEntityIndex()
  {
    return $this->sourceEntityIndex;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefLightweightTokensMatchedLightweightToken::class, 'Google_Service_Contentwarehouse_RepositoryWebrefLightweightTokensMatchedLightweightToken');
