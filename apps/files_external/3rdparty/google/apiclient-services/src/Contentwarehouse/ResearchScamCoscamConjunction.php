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

class ResearchScamCoscamConjunction extends \Google\Collection
{
  protected $collection_key = 'isPositive';
  /**
   * @var string[]
   */
  public $disjunctionId;
  /**
   * @var bool[]
   */
  public $isPositive;

  /**
   * @param string[]
   */
  public function setDisjunctionId($disjunctionId)
  {
    $this->disjunctionId = $disjunctionId;
  }
  /**
   * @return string[]
   */
  public function getDisjunctionId()
  {
    return $this->disjunctionId;
  }
  /**
   * @param bool[]
   */
  public function setIsPositive($isPositive)
  {
    $this->isPositive = $isPositive;
  }
  /**
   * @return bool[]
   */
  public function getIsPositive()
  {
    return $this->isPositive;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ResearchScamCoscamConjunction::class, 'Google_Service_Contentwarehouse_ResearchScamCoscamConjunction');
