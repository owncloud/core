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

class Google_Service_MyBusinessLodging_Policies extends Google_Model
{
  public $allInclusiveAvailable;
  public $allInclusiveAvailableException;
  public $allInclusiveOnly;
  public $allInclusiveOnlyException;
  protected $checkinTimeType = 'Google_Service_MyBusinessLodging_TimeOfDay';
  protected $checkinTimeDataType = '';
  public $checkinTimeException;
  protected $checkoutTimeType = 'Google_Service_MyBusinessLodging_TimeOfDay';
  protected $checkoutTimeDataType = '';
  public $checkoutTimeException;
  public $kidsStayFree;
  public $kidsStayFreeException;
  public $maxChildAge;
  public $maxChildAgeException;
  public $maxKidsStayFreeCount;
  public $maxKidsStayFreeCountException;
  protected $paymentOptionsType = 'Google_Service_MyBusinessLodging_PaymentOptions';
  protected $paymentOptionsDataType = '';
  public $smokeFreeProperty;
  public $smokeFreePropertyException;

  public function setAllInclusiveAvailable($allInclusiveAvailable)
  {
    $this->allInclusiveAvailable = $allInclusiveAvailable;
  }
  public function getAllInclusiveAvailable()
  {
    return $this->allInclusiveAvailable;
  }
  public function setAllInclusiveAvailableException($allInclusiveAvailableException)
  {
    $this->allInclusiveAvailableException = $allInclusiveAvailableException;
  }
  public function getAllInclusiveAvailableException()
  {
    return $this->allInclusiveAvailableException;
  }
  public function setAllInclusiveOnly($allInclusiveOnly)
  {
    $this->allInclusiveOnly = $allInclusiveOnly;
  }
  public function getAllInclusiveOnly()
  {
    return $this->allInclusiveOnly;
  }
  public function setAllInclusiveOnlyException($allInclusiveOnlyException)
  {
    $this->allInclusiveOnlyException = $allInclusiveOnlyException;
  }
  public function getAllInclusiveOnlyException()
  {
    return $this->allInclusiveOnlyException;
  }
  /**
   * @param Google_Service_MyBusinessLodging_TimeOfDay
   */
  public function setCheckinTime(Google_Service_MyBusinessLodging_TimeOfDay $checkinTime)
  {
    $this->checkinTime = $checkinTime;
  }
  /**
   * @return Google_Service_MyBusinessLodging_TimeOfDay
   */
  public function getCheckinTime()
  {
    return $this->checkinTime;
  }
  public function setCheckinTimeException($checkinTimeException)
  {
    $this->checkinTimeException = $checkinTimeException;
  }
  public function getCheckinTimeException()
  {
    return $this->checkinTimeException;
  }
  /**
   * @param Google_Service_MyBusinessLodging_TimeOfDay
   */
  public function setCheckoutTime(Google_Service_MyBusinessLodging_TimeOfDay $checkoutTime)
  {
    $this->checkoutTime = $checkoutTime;
  }
  /**
   * @return Google_Service_MyBusinessLodging_TimeOfDay
   */
  public function getCheckoutTime()
  {
    return $this->checkoutTime;
  }
  public function setCheckoutTimeException($checkoutTimeException)
  {
    $this->checkoutTimeException = $checkoutTimeException;
  }
  public function getCheckoutTimeException()
  {
    return $this->checkoutTimeException;
  }
  public function setKidsStayFree($kidsStayFree)
  {
    $this->kidsStayFree = $kidsStayFree;
  }
  public function getKidsStayFree()
  {
    return $this->kidsStayFree;
  }
  public function setKidsStayFreeException($kidsStayFreeException)
  {
    $this->kidsStayFreeException = $kidsStayFreeException;
  }
  public function getKidsStayFreeException()
  {
    return $this->kidsStayFreeException;
  }
  public function setMaxChildAge($maxChildAge)
  {
    $this->maxChildAge = $maxChildAge;
  }
  public function getMaxChildAge()
  {
    return $this->maxChildAge;
  }
  public function setMaxChildAgeException($maxChildAgeException)
  {
    $this->maxChildAgeException = $maxChildAgeException;
  }
  public function getMaxChildAgeException()
  {
    return $this->maxChildAgeException;
  }
  public function setMaxKidsStayFreeCount($maxKidsStayFreeCount)
  {
    $this->maxKidsStayFreeCount = $maxKidsStayFreeCount;
  }
  public function getMaxKidsStayFreeCount()
  {
    return $this->maxKidsStayFreeCount;
  }
  public function setMaxKidsStayFreeCountException($maxKidsStayFreeCountException)
  {
    $this->maxKidsStayFreeCountException = $maxKidsStayFreeCountException;
  }
  public function getMaxKidsStayFreeCountException()
  {
    return $this->maxKidsStayFreeCountException;
  }
  /**
   * @param Google_Service_MyBusinessLodging_PaymentOptions
   */
  public function setPaymentOptions(Google_Service_MyBusinessLodging_PaymentOptions $paymentOptions)
  {
    $this->paymentOptions = $paymentOptions;
  }
  /**
   * @return Google_Service_MyBusinessLodging_PaymentOptions
   */
  public function getPaymentOptions()
  {
    return $this->paymentOptions;
  }
  public function setSmokeFreeProperty($smokeFreeProperty)
  {
    $this->smokeFreeProperty = $smokeFreeProperty;
  }
  public function getSmokeFreeProperty()
  {
    return $this->smokeFreeProperty;
  }
  public function setSmokeFreePropertyException($smokeFreePropertyException)
  {
    $this->smokeFreePropertyException = $smokeFreePropertyException;
  }
  public function getSmokeFreePropertyException()
  {
    return $this->smokeFreePropertyException;
  }
}
