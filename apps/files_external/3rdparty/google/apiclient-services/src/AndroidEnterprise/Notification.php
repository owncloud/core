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

namespace Google\Service\AndroidEnterprise;

class Notification extends \Google\Model
{
  protected $appRestrictionsSchemaChangeEventType = AppRestrictionsSchemaChangeEvent::class;
  protected $appRestrictionsSchemaChangeEventDataType = '';
  protected $appUpdateEventType = AppUpdateEvent::class;
  protected $appUpdateEventDataType = '';
  protected $deviceReportUpdateEventType = DeviceReportUpdateEvent::class;
  protected $deviceReportUpdateEventDataType = '';
  /**
   * @var string
   */
  public $enterpriseId;
  protected $installFailureEventType = InstallFailureEvent::class;
  protected $installFailureEventDataType = '';
  protected $newDeviceEventType = NewDeviceEvent::class;
  protected $newDeviceEventDataType = '';
  protected $newPermissionsEventType = NewPermissionsEvent::class;
  protected $newPermissionsEventDataType = '';
  /**
   * @var string
   */
  public $notificationType;
  protected $productApprovalEventType = ProductApprovalEvent::class;
  protected $productApprovalEventDataType = '';
  protected $productAvailabilityChangeEventType = ProductAvailabilityChangeEvent::class;
  protected $productAvailabilityChangeEventDataType = '';
  /**
   * @var string
   */
  public $timestampMillis;

  /**
   * @param AppRestrictionsSchemaChangeEvent
   */
  public function setAppRestrictionsSchemaChangeEvent(AppRestrictionsSchemaChangeEvent $appRestrictionsSchemaChangeEvent)
  {
    $this->appRestrictionsSchemaChangeEvent = $appRestrictionsSchemaChangeEvent;
  }
  /**
   * @return AppRestrictionsSchemaChangeEvent
   */
  public function getAppRestrictionsSchemaChangeEvent()
  {
    return $this->appRestrictionsSchemaChangeEvent;
  }
  /**
   * @param AppUpdateEvent
   */
  public function setAppUpdateEvent(AppUpdateEvent $appUpdateEvent)
  {
    $this->appUpdateEvent = $appUpdateEvent;
  }
  /**
   * @return AppUpdateEvent
   */
  public function getAppUpdateEvent()
  {
    return $this->appUpdateEvent;
  }
  /**
   * @param DeviceReportUpdateEvent
   */
  public function setDeviceReportUpdateEvent(DeviceReportUpdateEvent $deviceReportUpdateEvent)
  {
    $this->deviceReportUpdateEvent = $deviceReportUpdateEvent;
  }
  /**
   * @return DeviceReportUpdateEvent
   */
  public function getDeviceReportUpdateEvent()
  {
    return $this->deviceReportUpdateEvent;
  }
  /**
   * @param string
   */
  public function setEnterpriseId($enterpriseId)
  {
    $this->enterpriseId = $enterpriseId;
  }
  /**
   * @return string
   */
  public function getEnterpriseId()
  {
    return $this->enterpriseId;
  }
  /**
   * @param InstallFailureEvent
   */
  public function setInstallFailureEvent(InstallFailureEvent $installFailureEvent)
  {
    $this->installFailureEvent = $installFailureEvent;
  }
  /**
   * @return InstallFailureEvent
   */
  public function getInstallFailureEvent()
  {
    return $this->installFailureEvent;
  }
  /**
   * @param NewDeviceEvent
   */
  public function setNewDeviceEvent(NewDeviceEvent $newDeviceEvent)
  {
    $this->newDeviceEvent = $newDeviceEvent;
  }
  /**
   * @return NewDeviceEvent
   */
  public function getNewDeviceEvent()
  {
    return $this->newDeviceEvent;
  }
  /**
   * @param NewPermissionsEvent
   */
  public function setNewPermissionsEvent(NewPermissionsEvent $newPermissionsEvent)
  {
    $this->newPermissionsEvent = $newPermissionsEvent;
  }
  /**
   * @return NewPermissionsEvent
   */
  public function getNewPermissionsEvent()
  {
    return $this->newPermissionsEvent;
  }
  /**
   * @param string
   */
  public function setNotificationType($notificationType)
  {
    $this->notificationType = $notificationType;
  }
  /**
   * @return string
   */
  public function getNotificationType()
  {
    return $this->notificationType;
  }
  /**
   * @param ProductApprovalEvent
   */
  public function setProductApprovalEvent(ProductApprovalEvent $productApprovalEvent)
  {
    $this->productApprovalEvent = $productApprovalEvent;
  }
  /**
   * @return ProductApprovalEvent
   */
  public function getProductApprovalEvent()
  {
    return $this->productApprovalEvent;
  }
  /**
   * @param ProductAvailabilityChangeEvent
   */
  public function setProductAvailabilityChangeEvent(ProductAvailabilityChangeEvent $productAvailabilityChangeEvent)
  {
    $this->productAvailabilityChangeEvent = $productAvailabilityChangeEvent;
  }
  /**
   * @return ProductAvailabilityChangeEvent
   */
  public function getProductAvailabilityChangeEvent()
  {
    return $this->productAvailabilityChangeEvent;
  }
  /**
   * @param string
   */
  public function setTimestampMillis($timestampMillis)
  {
    $this->timestampMillis = $timestampMillis;
  }
  /**
   * @return string
   */
  public function getTimestampMillis()
  {
    return $this->timestampMillis;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notification::class, 'Google_Service_AndroidEnterprise_Notification');
