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

namespace Google\Service\Localservices;

class GoogleAdsHomeservicesLocalservicesV1BookingLead extends \Google\Model
{
  /**
   * @var string
   */
  public $bookingAppointmentTimestamp;
  /**
   * @var string
   */
  public $consumerEmail;
  /**
   * @var string
   */
  public $consumerPhoneNumber;
  /**
   * @var string
   */
  public $customerName;
  /**
   * @var string
   */
  public $jobType;

  /**
   * @param string
   */
  public function setBookingAppointmentTimestamp($bookingAppointmentTimestamp)
  {
    $this->bookingAppointmentTimestamp = $bookingAppointmentTimestamp;
  }
  /**
   * @return string
   */
  public function getBookingAppointmentTimestamp()
  {
    return $this->bookingAppointmentTimestamp;
  }
  /**
   * @param string
   */
  public function setConsumerEmail($consumerEmail)
  {
    $this->consumerEmail = $consumerEmail;
  }
  /**
   * @return string
   */
  public function getConsumerEmail()
  {
    return $this->consumerEmail;
  }
  /**
   * @param string
   */
  public function setConsumerPhoneNumber($consumerPhoneNumber)
  {
    $this->consumerPhoneNumber = $consumerPhoneNumber;
  }
  /**
   * @return string
   */
  public function getConsumerPhoneNumber()
  {
    return $this->consumerPhoneNumber;
  }
  /**
   * @param string
   */
  public function setCustomerName($customerName)
  {
    $this->customerName = $customerName;
  }
  /**
   * @return string
   */
  public function getCustomerName()
  {
    return $this->customerName;
  }
  /**
   * @param string
   */
  public function setJobType($jobType)
  {
    $this->jobType = $jobType;
  }
  /**
   * @return string
   */
  public function getJobType()
  {
    return $this->jobType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAdsHomeservicesLocalservicesV1BookingLead::class, 'Google_Service_Localservices_GoogleAdsHomeservicesLocalservicesV1BookingLead');
