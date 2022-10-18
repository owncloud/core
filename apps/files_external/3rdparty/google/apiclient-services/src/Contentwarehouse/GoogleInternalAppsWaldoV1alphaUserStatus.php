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

class GoogleInternalAppsWaldoV1alphaUserStatus extends \Google\Model
{
  protected $calendarBusyType = GoogleInternalAppsWaldoV1alphaCalendarBusy::class;
  protected $calendarBusyDataType = '';
  protected $doNotDisturbType = GoogleInternalAppsWaldoV1alphaDoNotDisturb::class;
  protected $doNotDisturbDataType = '';
  protected $inMeetingType = GoogleInternalAppsWaldoV1alphaInMeeting::class;
  protected $inMeetingDataType = '';
  protected $inactiveType = GoogleInternalAppsWaldoV1alphaInactive::class;
  protected $inactiveDataType = '';
  protected $outOfOfficeType = GoogleInternalAppsWaldoV1alphaOutOfOffice::class;
  protected $outOfOfficeDataType = '';
  protected $outsideWorkingHoursType = GoogleInternalAppsWaldoV1alphaOutsideWorkingHours::class;
  protected $outsideWorkingHoursDataType = '';

  /**
   * @param GoogleInternalAppsWaldoV1alphaCalendarBusy
   */
  public function setCalendarBusy(GoogleInternalAppsWaldoV1alphaCalendarBusy $calendarBusy)
  {
    $this->calendarBusy = $calendarBusy;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaCalendarBusy
   */
  public function getCalendarBusy()
  {
    return $this->calendarBusy;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaDoNotDisturb
   */
  public function setDoNotDisturb(GoogleInternalAppsWaldoV1alphaDoNotDisturb $doNotDisturb)
  {
    $this->doNotDisturb = $doNotDisturb;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaDoNotDisturb
   */
  public function getDoNotDisturb()
  {
    return $this->doNotDisturb;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaInMeeting
   */
  public function setInMeeting(GoogleInternalAppsWaldoV1alphaInMeeting $inMeeting)
  {
    $this->inMeeting = $inMeeting;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaInMeeting
   */
  public function getInMeeting()
  {
    return $this->inMeeting;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaInactive
   */
  public function setInactive(GoogleInternalAppsWaldoV1alphaInactive $inactive)
  {
    $this->inactive = $inactive;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaInactive
   */
  public function getInactive()
  {
    return $this->inactive;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaOutOfOffice
   */
  public function setOutOfOffice(GoogleInternalAppsWaldoV1alphaOutOfOffice $outOfOffice)
  {
    $this->outOfOffice = $outOfOffice;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaOutOfOffice
   */
  public function getOutOfOffice()
  {
    return $this->outOfOffice;
  }
  /**
   * @param GoogleInternalAppsWaldoV1alphaOutsideWorkingHours
   */
  public function setOutsideWorkingHours(GoogleInternalAppsWaldoV1alphaOutsideWorkingHours $outsideWorkingHours)
  {
    $this->outsideWorkingHours = $outsideWorkingHours;
  }
  /**
   * @return GoogleInternalAppsWaldoV1alphaOutsideWorkingHours
   */
  public function getOutsideWorkingHours()
  {
    return $this->outsideWorkingHours;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleInternalAppsWaldoV1alphaUserStatus::class, 'Google_Service_Contentwarehouse_GoogleInternalAppsWaldoV1alphaUserStatus');
