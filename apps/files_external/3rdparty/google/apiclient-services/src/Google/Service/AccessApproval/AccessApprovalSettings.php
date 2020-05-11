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

class Google_Service_AccessApproval_AccessApprovalSettings extends Google_Collection
{
  protected $collection_key = 'notificationEmails';
  public $enrolledAncestor;
  protected $enrolledServicesType = 'Google_Service_AccessApproval_EnrolledService';
  protected $enrolledServicesDataType = 'array';
  public $name;
  public $notificationEmails;

  public function setEnrolledAncestor($enrolledAncestor)
  {
    $this->enrolledAncestor = $enrolledAncestor;
  }
  public function getEnrolledAncestor()
  {
    return $this->enrolledAncestor;
  }
  /**
   * @param Google_Service_AccessApproval_EnrolledService
   */
  public function setEnrolledServices($enrolledServices)
  {
    $this->enrolledServices = $enrolledServices;
  }
  /**
   * @return Google_Service_AccessApproval_EnrolledService
   */
  public function getEnrolledServices()
  {
    return $this->enrolledServices;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNotificationEmails($notificationEmails)
  {
    $this->notificationEmails = $notificationEmails;
  }
  public function getNotificationEmails()
  {
    return $this->notificationEmails;
  }
}
