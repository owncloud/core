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

class MediaIndexEntityField extends \Google\Model
{
  /**
   * @var string
   */
  public $customSource;
  /**
   * @var string
   */
  public $entityId;
  /**
   * @var string
   */
  public $quantizedScore;
  /**
   * @var string
   */
  public $source;

  /**
   * @param string
   */
  public function setCustomSource($customSource)
  {
    $this->customSource = $customSource;
  }
  /**
   * @return string
   */
  public function getCustomSource()
  {
    return $this->customSource;
  }
  /**
   * @param string
   */
  public function setEntityId($entityId)
  {
    $this->entityId = $entityId;
  }
  /**
   * @return string
   */
  public function getEntityId()
  {
    return $this->entityId;
  }
  /**
   * @param string
   */
  public function setQuantizedScore($quantizedScore)
  {
    $this->quantizedScore = $quantizedScore;
  }
  /**
   * @return string
   */
  public function getQuantizedScore()
  {
    return $this->quantizedScore;
  }
  /**
   * @param string
   */
  public function setSource($source)
  {
    $this->source = $source;
  }
  /**
   * @return string
   */
  public function getSource()
  {
    return $this->source;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MediaIndexEntityField::class, 'Google_Service_Contentwarehouse_MediaIndexEntityField');
