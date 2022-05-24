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

namespace Google\Service\Reseller;

class ChangePlanRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $dealCode;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $planName;
  /**
   * @var string
   */
  public $purchaseOrderId;
  protected $seatsType = Seats::class;
  protected $seatsDataType = '';

  /**
   * @param string
   */
  public function setDealCode($dealCode)
  {
    $this->dealCode = $dealCode;
  }
  /**
   * @return string
   */
  public function getDealCode()
  {
    return $this->dealCode;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setPlanName($planName)
  {
    $this->planName = $planName;
  }
  /**
   * @return string
   */
  public function getPlanName()
  {
    return $this->planName;
  }
  /**
   * @param string
   */
  public function setPurchaseOrderId($purchaseOrderId)
  {
    $this->purchaseOrderId = $purchaseOrderId;
  }
  /**
   * @return string
   */
  public function getPurchaseOrderId()
  {
    return $this->purchaseOrderId;
  }
  /**
   * @param Seats
   */
  public function setSeats(Seats $seats)
  {
    $this->seats = $seats;
  }
  /**
   * @return Seats
   */
  public function getSeats()
  {
    return $this->seats;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChangePlanRequest::class, 'Google_Service_Reseller_ChangePlanRequest');
