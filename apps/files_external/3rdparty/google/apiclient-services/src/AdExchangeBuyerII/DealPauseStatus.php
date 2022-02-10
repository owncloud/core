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

namespace Google\Service\AdExchangeBuyerII;

class DealPauseStatus extends \Google\Model
{
  /**
   * @var string
   */
  public $buyerPauseReason;
  /**
   * @var string
   */
  public $firstPausedBy;
  /**
   * @var bool
   */
  public $hasBuyerPaused;
  /**
   * @var bool
   */
  public $hasSellerPaused;
  /**
   * @var string
   */
  public $sellerPauseReason;

  /**
   * @param string
   */
  public function setBuyerPauseReason($buyerPauseReason)
  {
    $this->buyerPauseReason = $buyerPauseReason;
  }
  /**
   * @return string
   */
  public function getBuyerPauseReason()
  {
    return $this->buyerPauseReason;
  }
  /**
   * @param string
   */
  public function setFirstPausedBy($firstPausedBy)
  {
    $this->firstPausedBy = $firstPausedBy;
  }
  /**
   * @return string
   */
  public function getFirstPausedBy()
  {
    return $this->firstPausedBy;
  }
  /**
   * @param bool
   */
  public function setHasBuyerPaused($hasBuyerPaused)
  {
    $this->hasBuyerPaused = $hasBuyerPaused;
  }
  /**
   * @return bool
   */
  public function getHasBuyerPaused()
  {
    return $this->hasBuyerPaused;
  }
  /**
   * @param bool
   */
  public function setHasSellerPaused($hasSellerPaused)
  {
    $this->hasSellerPaused = $hasSellerPaused;
  }
  /**
   * @return bool
   */
  public function getHasSellerPaused()
  {
    return $this->hasSellerPaused;
  }
  /**
   * @param string
   */
  public function setSellerPauseReason($sellerPauseReason)
  {
    $this->sellerPauseReason = $sellerPauseReason;
  }
  /**
   * @return string
   */
  public function getSellerPauseReason()
  {
    return $this->sellerPauseReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DealPauseStatus::class, 'Google_Service_AdExchangeBuyerII_DealPauseStatus');
