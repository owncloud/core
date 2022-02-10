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

class Policy extends \Google\Collection
{
  protected $collection_key = 'productPolicy';
  /**
   * @var string
   */
  public $autoUpdatePolicy;
  /**
   * @var string
   */
  public $deviceReportPolicy;
  protected $maintenanceWindowType = MaintenanceWindow::class;
  protected $maintenanceWindowDataType = '';
  /**
   * @var string
   */
  public $productAvailabilityPolicy;
  protected $productPolicyType = ProductPolicy::class;
  protected $productPolicyDataType = 'array';

  /**
   * @param string
   */
  public function setAutoUpdatePolicy($autoUpdatePolicy)
  {
    $this->autoUpdatePolicy = $autoUpdatePolicy;
  }
  /**
   * @return string
   */
  public function getAutoUpdatePolicy()
  {
    return $this->autoUpdatePolicy;
  }
  /**
   * @param string
   */
  public function setDeviceReportPolicy($deviceReportPolicy)
  {
    $this->deviceReportPolicy = $deviceReportPolicy;
  }
  /**
   * @return string
   */
  public function getDeviceReportPolicy()
  {
    return $this->deviceReportPolicy;
  }
  /**
   * @param MaintenanceWindow
   */
  public function setMaintenanceWindow(MaintenanceWindow $maintenanceWindow)
  {
    $this->maintenanceWindow = $maintenanceWindow;
  }
  /**
   * @return MaintenanceWindow
   */
  public function getMaintenanceWindow()
  {
    return $this->maintenanceWindow;
  }
  /**
   * @param string
   */
  public function setProductAvailabilityPolicy($productAvailabilityPolicy)
  {
    $this->productAvailabilityPolicy = $productAvailabilityPolicy;
  }
  /**
   * @return string
   */
  public function getProductAvailabilityPolicy()
  {
    return $this->productAvailabilityPolicy;
  }
  /**
   * @param ProductPolicy[]
   */
  public function setProductPolicy($productPolicy)
  {
    $this->productPolicy = $productPolicy;
  }
  /**
   * @return ProductPolicy[]
   */
  public function getProductPolicy()
  {
    return $this->productPolicy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Policy::class, 'Google_Service_AndroidEnterprise_Policy');
