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

class KnowledgeAnswersIntentQueryCollectionScore extends \Google\Model
{
  /**
   * @var string
   */
  public $scoreType;
  /**
   * @var float
   */
  public $scoreValue;

  /**
   * @param string
   */
  public function setScoreType($scoreType)
  {
    $this->scoreType = $scoreType;
  }
  /**
   * @return string
   */
  public function getScoreType()
  {
    return $this->scoreType;
  }
  /**
   * @param float
   */
  public function setScoreValue($scoreValue)
  {
    $this->scoreValue = $scoreValue;
  }
  /**
   * @return float
   */
  public function getScoreValue()
  {
    return $this->scoreValue;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KnowledgeAnswersIntentQueryCollectionScore::class, 'Google_Service_Contentwarehouse_KnowledgeAnswersIntentQueryCollectionScore');
