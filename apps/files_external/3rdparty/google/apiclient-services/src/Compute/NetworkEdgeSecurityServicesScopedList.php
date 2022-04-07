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

class NetworkEdgeSecurityServicesScopedList extends \Google\Collection
{
  protected $collection_key = 'networkEdgeSecurityServices';
  protected $networkEdgeSecurityServicesType = NetworkEdgeSecurityService::class;
  protected $networkEdgeSecurityServicesDataType = 'array';
  protected $warningType = NetworkEdgeSecurityServicesScopedListWarning::class;
  protected $warningDataType = '';

  /**
   * @param NetworkEdgeSecurityService[]
   */
  public function setNetworkEdgeSecurityServices($networkEdgeSecurityServices)
  {
    $this->networkEdgeSecurityServices = $networkEdgeSecurityServices;
  }
  /**
   * @return NetworkEdgeSecurityService[]
   */
  public function getNetworkEdgeSecurityServices()
  {
    return $this->networkEdgeSecurityServices;
  }
  /**
   * @param NetworkEdgeSecurityServicesScopedListWarning
   */
  public function setWarning(NetworkEdgeSecurityServicesScopedListWarning $warning)
  {
    $this->warning = $warning;
  }
  /**
   * @return NetworkEdgeSecurityServicesScopedListWarning
   */
  public function getWarning()
  {
    return $this->warning;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NetworkEdgeSecurityServicesScopedList::class, 'Google_Service_Compute_NetworkEdgeSecurityServicesScopedList');
