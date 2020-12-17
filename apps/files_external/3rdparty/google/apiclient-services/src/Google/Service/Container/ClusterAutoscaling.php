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

class Google_Service_Container_ClusterAutoscaling extends Google_Collection
{
  protected $collection_key = 'resourceLimits';
  public $autoprovisioningLocations;
  protected $autoprovisioningNodePoolDefaultsType = 'Google_Service_Container_AutoprovisioningNodePoolDefaults';
  protected $autoprovisioningNodePoolDefaultsDataType = '';
  public $enableNodeAutoprovisioning;
  protected $resourceLimitsType = 'Google_Service_Container_ResourceLimit';
  protected $resourceLimitsDataType = 'array';

  public function setAutoprovisioningLocations($autoprovisioningLocations)
  {
    $this->autoprovisioningLocations = $autoprovisioningLocations;
  }
  public function getAutoprovisioningLocations()
  {
    return $this->autoprovisioningLocations;
  }
  /**
   * @param Google_Service_Container_AutoprovisioningNodePoolDefaults
   */
  public function setAutoprovisioningNodePoolDefaults(Google_Service_Container_AutoprovisioningNodePoolDefaults $autoprovisioningNodePoolDefaults)
  {
    $this->autoprovisioningNodePoolDefaults = $autoprovisioningNodePoolDefaults;
  }
  /**
   * @return Google_Service_Container_AutoprovisioningNodePoolDefaults
   */
  public function getAutoprovisioningNodePoolDefaults()
  {
    return $this->autoprovisioningNodePoolDefaults;
  }
  public function setEnableNodeAutoprovisioning($enableNodeAutoprovisioning)
  {
    $this->enableNodeAutoprovisioning = $enableNodeAutoprovisioning;
  }
  public function getEnableNodeAutoprovisioning()
  {
    return $this->enableNodeAutoprovisioning;
  }
  /**
   * @param Google_Service_Container_ResourceLimit[]
   */
  public function setResourceLimits($resourceLimits)
  {
    $this->resourceLimits = $resourceLimits;
  }
  /**
   * @return Google_Service_Container_ResourceLimit[]
   */
  public function getResourceLimits()
  {
    return $this->resourceLimits;
  }
}
