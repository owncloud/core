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

namespace Google\Service\Books;

class AnnotationsSummaryLayers extends \Google\Model
{
  /**
   * @var int
   */
  public $allowedCharacterCount;
  /**
   * @var string
   */
  public $layerId;
  /**
   * @var string
   */
  public $limitType;
  /**
   * @var int
   */
  public $remainingCharacterCount;
  /**
   * @var string
   */
  public $updated;

  /**
   * @param int
   */
  public function setAllowedCharacterCount($allowedCharacterCount)
  {
    $this->allowedCharacterCount = $allowedCharacterCount;
  }
  /**
   * @return int
   */
  public function getAllowedCharacterCount()
  {
    return $this->allowedCharacterCount;
  }
  /**
   * @param string
   */
  public function setLayerId($layerId)
  {
    $this->layerId = $layerId;
  }
  /**
   * @return string
   */
  public function getLayerId()
  {
    return $this->layerId;
  }
  /**
   * @param string
   */
  public function setLimitType($limitType)
  {
    $this->limitType = $limitType;
  }
  /**
   * @return string
   */
  public function getLimitType()
  {
    return $this->limitType;
  }
  /**
   * @param int
   */
  public function setRemainingCharacterCount($remainingCharacterCount)
  {
    $this->remainingCharacterCount = $remainingCharacterCount;
  }
  /**
   * @return int
   */
  public function getRemainingCharacterCount()
  {
    return $this->remainingCharacterCount;
  }
  /**
   * @param string
   */
  public function setUpdated($updated)
  {
    $this->updated = $updated;
  }
  /**
   * @return string
   */
  public function getUpdated()
  {
    return $this->updated;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AnnotationsSummaryLayers::class, 'Google_Service_Books_AnnotationsSummaryLayers');
