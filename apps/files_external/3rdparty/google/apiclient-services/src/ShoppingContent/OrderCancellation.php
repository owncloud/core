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

namespace Google\Service\ShoppingContent;

class OrderCancellation extends \Google\Model
{
  /**
   * @var string
   */
  public $actor;
  /**
   * @var string
   */
  public $creationDate;
  /**
   * @var string
   */
  public $quantity;
  /**
   * @var string
   */
  public $reason;
  /**
   * @var string
   */
  public $reasonText;

  /**
   * @param string
   */
  public function setActor($actor)
  {
    $this->actor = $actor;
  }
  /**
   * @return string
   */
  public function getActor()
  {
    return $this->actor;
  }
  /**
   * @param string
   */
  public function setCreationDate($creationDate)
  {
    $this->creationDate = $creationDate;
  }
  /**
   * @return string
   */
  public function getCreationDate()
  {
    return $this->creationDate;
  }
  /**
   * @param string
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  /**
   * @return string
   */
  public function getQuantity()
  {
    return $this->quantity;
  }
  /**
   * @param string
   */
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  /**
   * @return string
   */
  public function getReason()
  {
    return $this->reason;
  }
  /**
   * @param string
   */
  public function setReasonText($reasonText)
  {
    $this->reasonText = $reasonText;
  }
  /**
   * @return string
   */
  public function getReasonText()
  {
    return $this->reasonText;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderCancellation::class, 'Google_Service_ShoppingContent_OrderCancellation');
