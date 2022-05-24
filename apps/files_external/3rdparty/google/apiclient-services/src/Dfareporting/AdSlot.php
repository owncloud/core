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

namespace Google\Service\Dfareporting;

class AdSlot extends \Google\Model
{
  /**
   * @var string
   */
  public $comment;
  /**
   * @var string
   */
  public $compatibility;
  /**
   * @var string
   */
  public $height;
  /**
   * @var string
   */
  public $linkedPlacementId;
  /**
   * @var string
   */
  public $name;
  /**
   * @var string
   */
  public $paymentSourceType;
  /**
   * @var bool
   */
  public $primary;
  /**
   * @var string
   */
  public $width;

  /**
   * @param string
   */
  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  /**
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }
  /**
   * @param string
   */
  public function setCompatibility($compatibility)
  {
    $this->compatibility = $compatibility;
  }
  /**
   * @return string
   */
  public function getCompatibility()
  {
    return $this->compatibility;
  }
  /**
   * @param string
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }
  /**
   * @return string
   */
  public function getHeight()
  {
    return $this->height;
  }
  /**
   * @param string
   */
  public function setLinkedPlacementId($linkedPlacementId)
  {
    $this->linkedPlacementId = $linkedPlacementId;
  }
  /**
   * @return string
   */
  public function getLinkedPlacementId()
  {
    return $this->linkedPlacementId;
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
   * @param string
   */
  public function setPaymentSourceType($paymentSourceType)
  {
    $this->paymentSourceType = $paymentSourceType;
  }
  /**
   * @return string
   */
  public function getPaymentSourceType()
  {
    return $this->paymentSourceType;
  }
  /**
   * @param bool
   */
  public function setPrimary($primary)
  {
    $this->primary = $primary;
  }
  /**
   * @return bool
   */
  public function getPrimary()
  {
    return $this->primary;
  }
  /**
   * @param string
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }
  /**
   * @return string
   */
  public function getWidth()
  {
    return $this->width;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AdSlot::class, 'Google_Service_Dfareporting_AdSlot');
