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

namespace Google\Service\MyBusinessLodging;

class Policies extends \Google\Model
{
  /**
   * @var bool
   */
  public $allInclusiveAvailable;
  /**
   * @var string
   */
  public $allInclusiveAvailableException;
  /**
   * @var bool
   */
  public $allInclusiveOnly;
  /**
   * @var string
   */
  public $allInclusiveOnlyException;
  protected $checkinTimeType = TimeOfDay::class;
  protected $checkinTimeDataType = '';
  /**
   * @var string
   */
  public $checkinTimeException;
  protected $checkoutTimeType = TimeOfDay::class;
  protected $checkoutTimeDataType = '';
  /**
   * @var string
   */
  public $checkoutTimeException;
  /**
   * @var bool
   */
  public $kidsStayFree;
  /**
   * @var string
   */
  public $kidsStayFreeException;
  /**
   * @var int
   */
  public $maxChildAge;
  /**
   * @var string
   */
  public $maxChildAgeException;
  /**
   * @var int
   */
  public $maxKidsStayFreeCount;
  /**
   * @var string
   */
  public $maxKidsStayFreeCountException;
  protected $paymentOptionsType = PaymentOptions::class;
  protected $paymentOptionsDataType = '';
  /**
   * @var bool
   */
  public $smokeFreeProperty;
  /**
   * @var string
   */
  public $smokeFreePropertyException;

  /**
   * @param bool
   */
  public function setAllInclusiveAvailable($allInclusiveAvailable)
  {
    $this->allInclusiveAvailable = $allInclusiveAvailable;
  }
  /**
   * @return bool
   */
  public function getAllInclusiveAvailable()
  {
    return $this->allInclusiveAvailable;
  }
  /**
   * @param string
   */
  public function setAllInclusiveAvailableException($allInclusiveAvailableException)
  {
    $this->allInclusiveAvailableException = $allInclusiveAvailableException;
  }
  /**
   * @return string
   */
  public function getAllInclusiveAvailableException()
  {
    return $this->allInclusiveAvailableException;
  }
  /**
   * @param bool
   */
  public function setAllInclusiveOnly($allInclusiveOnly)
  {
    $this->allInclusiveOnly = $allInclusiveOnly;
  }
  /**
   * @return bool
   */
  public function getAllInclusiveOnly()
  {
    return $this->allInclusiveOnly;
  }
  /**
   * @param string
   */
  public function setAllInclusiveOnlyException($allInclusiveOnlyException)
  {
    $this->allInclusiveOnlyException = $allInclusiveOnlyException;
  }
  /**
   * @return string
   */
  public function getAllInclusiveOnlyException()
  {
    return $this->allInclusiveOnlyException;
  }
  /**
   * @param TimeOfDay
   */
  public function setCheckinTime(TimeOfDay $checkinTime)
  {
    $this->checkinTime = $checkinTime;
  }
  /**
   * @return TimeOfDay
   */
  public function getCheckinTime()
  {
    return $this->checkinTime;
  }
  /**
   * @param string
   */
  public function setCheckinTimeException($checkinTimeException)
  {
    $this->checkinTimeException = $checkinTimeException;
  }
  /**
   * @return string
   */
  public function getCheckinTimeException()
  {
    return $this->checkinTimeException;
  }
  /**
   * @param TimeOfDay
   */
  public function setCheckoutTime(TimeOfDay $checkoutTime)
  {
    $this->checkoutTime = $checkoutTime;
  }
  /**
   * @return TimeOfDay
   */
  public function getCheckoutTime()
  {
    return $this->checkoutTime;
  }
  /**
   * @param string
   */
  public function setCheckoutTimeException($checkoutTimeException)
  {
    $this->checkoutTimeException = $checkoutTimeException;
  }
  /**
   * @return string
   */
  public function getCheckoutTimeException()
  {
    return $this->checkoutTimeException;
  }
  /**
   * @param bool
   */
  public function setKidsStayFree($kidsStayFree)
  {
    $this->kidsStayFree = $kidsStayFree;
  }
  /**
   * @return bool
   */
  public function getKidsStayFree()
  {
    return $this->kidsStayFree;
  }
  /**
   * @param string
   */
  public function setKidsStayFreeException($kidsStayFreeException)
  {
    $this->kidsStayFreeException = $kidsStayFreeException;
  }
  /**
   * @return string
   */
  public function getKidsStayFreeException()
  {
    return $this->kidsStayFreeException;
  }
  /**
   * @param int
   */
  public function setMaxChildAge($maxChildAge)
  {
    $this->maxChildAge = $maxChildAge;
  }
  /**
   * @return int
   */
  public function getMaxChildAge()
  {
    return $this->maxChildAge;
  }
  /**
   * @param string
   */
  public function setMaxChildAgeException($maxChildAgeException)
  {
    $this->maxChildAgeException = $maxChildAgeException;
  }
  /**
   * @return string
   */
  public function getMaxChildAgeException()
  {
    return $this->maxChildAgeException;
  }
  /**
   * @param int
   */
  public function setMaxKidsStayFreeCount($maxKidsStayFreeCount)
  {
    $this->maxKidsStayFreeCount = $maxKidsStayFreeCount;
  }
  /**
   * @return int
   */
  public function getMaxKidsStayFreeCount()
  {
    return $this->maxKidsStayFreeCount;
  }
  /**
   * @param string
   */
  public function setMaxKidsStayFreeCountException($maxKidsStayFreeCountException)
  {
    $this->maxKidsStayFreeCountException = $maxKidsStayFreeCountException;
  }
  /**
   * @return string
   */
  public function getMaxKidsStayFreeCountException()
  {
    return $this->maxKidsStayFreeCountException;
  }
  /**
   * @param PaymentOptions
   */
  public function setPaymentOptions(PaymentOptions $paymentOptions)
  {
    $this->paymentOptions = $paymentOptions;
  }
  /**
   * @return PaymentOptions
   */
  public function getPaymentOptions()
  {
    return $this->paymentOptions;
  }
  /**
   * @param bool
   */
  public function setSmokeFreeProperty($smokeFreeProperty)
  {
    $this->smokeFreeProperty = $smokeFreeProperty;
  }
  /**
   * @return bool
   */
  public function getSmokeFreeProperty()
  {
    return $this->smokeFreeProperty;
  }
  /**
   * @param string
   */
  public function setSmokeFreePropertyException($smokeFreePropertyException)
  {
    $this->smokeFreePropertyException = $smokeFreePropertyException;
  }
  /**
   * @return string
   */
  public function getSmokeFreePropertyException()
  {
    return $this->smokeFreePropertyException;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Policies::class, 'Google_Service_MyBusinessLodging_Policies');
