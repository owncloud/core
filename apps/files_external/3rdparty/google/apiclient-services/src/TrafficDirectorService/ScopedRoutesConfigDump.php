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

namespace Google\Service\TrafficDirectorService;

class ScopedRoutesConfigDump extends \Google\Collection
{
  protected $collection_key = 'inlineScopedRouteConfigs';
  protected $dynamicScopedRouteConfigsType = DynamicScopedRouteConfigs::class;
  protected $dynamicScopedRouteConfigsDataType = 'array';
  protected $inlineScopedRouteConfigsType = InlineScopedRouteConfigs::class;
  protected $inlineScopedRouteConfigsDataType = 'array';

  /**
   * @param DynamicScopedRouteConfigs[]
   */
  public function setDynamicScopedRouteConfigs($dynamicScopedRouteConfigs)
  {
    $this->dynamicScopedRouteConfigs = $dynamicScopedRouteConfigs;
  }
  /**
   * @return DynamicScopedRouteConfigs[]
   */
  public function getDynamicScopedRouteConfigs()
  {
    return $this->dynamicScopedRouteConfigs;
  }
  /**
   * @param InlineScopedRouteConfigs[]
   */
  public function setInlineScopedRouteConfigs($inlineScopedRouteConfigs)
  {
    $this->inlineScopedRouteConfigs = $inlineScopedRouteConfigs;
  }
  /**
   * @return InlineScopedRouteConfigs[]
   */
  public function getInlineScopedRouteConfigs()
  {
    return $this->inlineScopedRouteConfigs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ScopedRoutesConfigDump::class, 'Google_Service_TrafficDirectorService_ScopedRoutesConfigDump');
