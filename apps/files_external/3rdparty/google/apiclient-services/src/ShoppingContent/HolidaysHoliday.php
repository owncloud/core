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

class HolidaysHoliday extends \Google\Model
{
  public $countryCode;
  public $date;
  public $deliveryGuaranteeDate;
  public $deliveryGuaranteeHour;
  public $id;
  public $type;

  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }
  public function getDate()
  {
    return $this->date;
  }
  public function setDeliveryGuaranteeDate($deliveryGuaranteeDate)
  {
    $this->deliveryGuaranteeDate = $deliveryGuaranteeDate;
  }
  public function getDeliveryGuaranteeDate()
  {
    return $this->deliveryGuaranteeDate;
  }
  public function setDeliveryGuaranteeHour($deliveryGuaranteeHour)
  {
    $this->deliveryGuaranteeHour = $deliveryGuaranteeHour;
  }
  public function getDeliveryGuaranteeHour()
  {
    return $this->deliveryGuaranteeHour;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HolidaysHoliday::class, 'Google_Service_ShoppingContent_HolidaysHoliday');
