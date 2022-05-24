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

namespace Google\Service\SecurityCommandCenter;

class GoogleCloudSecuritycenterV1p1beta1NotificationMessage extends \Google\Model
{
  protected $findingType = GoogleCloudSecuritycenterV1p1beta1Finding::class;
  protected $findingDataType = '';
  /**
   * @var string
   */
  public $notificationConfigName;
  protected $resourceType = GoogleCloudSecuritycenterV1p1beta1Resource::class;
  protected $resourceDataType = '';

  /**
   * @param GoogleCloudSecuritycenterV1p1beta1Finding
   */
  public function setFinding(GoogleCloudSecuritycenterV1p1beta1Finding $finding)
  {
    $this->finding = $finding;
  }
  /**
   * @return GoogleCloudSecuritycenterV1p1beta1Finding
   */
  public function getFinding()
  {
    return $this->finding;
  }
  /**
   * @param string
   */
  public function setNotificationConfigName($notificationConfigName)
  {
    $this->notificationConfigName = $notificationConfigName;
  }
  /**
   * @return string
   */
  public function getNotificationConfigName()
  {
    return $this->notificationConfigName;
  }
  /**
   * @param GoogleCloudSecuritycenterV1p1beta1Resource
   */
  public function setResource(GoogleCloudSecuritycenterV1p1beta1Resource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return GoogleCloudSecuritycenterV1p1beta1Resource
   */
  public function getResource()
  {
    return $this->resource;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudSecuritycenterV1p1beta1NotificationMessage::class, 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1NotificationMessage');
