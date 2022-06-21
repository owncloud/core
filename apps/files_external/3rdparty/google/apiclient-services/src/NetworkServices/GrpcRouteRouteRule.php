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

namespace Google\Service\NetworkServices;

class GrpcRouteRouteRule extends \Google\Collection
{
  protected $collection_key = 'matches';
  protected $actionType = GrpcRouteRouteAction::class;
  protected $actionDataType = '';
  protected $matchesType = GrpcRouteRouteMatch::class;
  protected $matchesDataType = 'array';

  /**
   * @param GrpcRouteRouteAction
   */
  public function setAction(GrpcRouteRouteAction $action)
  {
    $this->action = $action;
  }
  /**
   * @return GrpcRouteRouteAction
   */
  public function getAction()
  {
    return $this->action;
  }
  /**
   * @param GrpcRouteRouteMatch[]
   */
  public function setMatches($matches)
  {
    $this->matches = $matches;
  }
  /**
   * @return GrpcRouteRouteMatch[]
   */
  public function getMatches()
  {
    return $this->matches;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GrpcRouteRouteRule::class, 'Google_Service_NetworkServices_GrpcRouteRouteRule');
