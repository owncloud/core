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

namespace Google\Service\Compute;

class VmEndpointNatMappings extends \Google\Collection
{
  protected $collection_key = 'interfaceNatMappings';
  public $instanceName;
  protected $interfaceNatMappingsType = VmEndpointNatMappingsInterfaceNatMappings::class;
  protected $interfaceNatMappingsDataType = 'array';

  public function setInstanceName($instanceName)
  {
    $this->instanceName = $instanceName;
  }
  public function getInstanceName()
  {
    return $this->instanceName;
  }
  /**
   * @param VmEndpointNatMappingsInterfaceNatMappings[]
   */
  public function setInterfaceNatMappings($interfaceNatMappings)
  {
    $this->interfaceNatMappings = $interfaceNatMappings;
  }
  /**
   * @return VmEndpointNatMappingsInterfaceNatMappings[]
   */
  public function getInterfaceNatMappings()
  {
    return $this->interfaceNatMappings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VmEndpointNatMappings::class, 'Google_Service_Compute_VmEndpointNatMappings');
