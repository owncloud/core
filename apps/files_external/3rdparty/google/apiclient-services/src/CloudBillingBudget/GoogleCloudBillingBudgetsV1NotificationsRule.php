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

namespace Google\Service\CloudBillingBudget;

class GoogleCloudBillingBudgetsV1NotificationsRule extends \Google\Collection
{
  protected $collection_key = 'monitoringNotificationChannels';
  /**
   * @var bool
   */
  public $disableDefaultIamRecipients;
  /**
   * @var string[]
   */
  public $monitoringNotificationChannels;
  /**
   * @var string
   */
  public $pubsubTopic;
  /**
   * @var string
   */
  public $schemaVersion;

  /**
   * @param bool
   */
  public function setDisableDefaultIamRecipients($disableDefaultIamRecipients)
  {
    $this->disableDefaultIamRecipients = $disableDefaultIamRecipients;
  }
  /**
   * @return bool
   */
  public function getDisableDefaultIamRecipients()
  {
    return $this->disableDefaultIamRecipients;
  }
  /**
   * @param string[]
   */
  public function setMonitoringNotificationChannels($monitoringNotificationChannels)
  {
    $this->monitoringNotificationChannels = $monitoringNotificationChannels;
  }
  /**
   * @return string[]
   */
  public function getMonitoringNotificationChannels()
  {
    return $this->monitoringNotificationChannels;
  }
  /**
   * @param string
   */
  public function setPubsubTopic($pubsubTopic)
  {
    $this->pubsubTopic = $pubsubTopic;
  }
  /**
   * @return string
   */
  public function getPubsubTopic()
  {
    return $this->pubsubTopic;
  }
  /**
   * @param string
   */
  public function setSchemaVersion($schemaVersion)
  {
    $this->schemaVersion = $schemaVersion;
  }
  /**
   * @return string
   */
  public function getSchemaVersion()
  {
    return $this->schemaVersion;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBillingBudgetsV1NotificationsRule::class, 'Google_Service_CloudBillingBudget_GoogleCloudBillingBudgetsV1NotificationsRule');
