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

namespace Google\Service\CloudDebugger;

class ListDebuggeesResponse extends \Google\Collection
{
  protected $collection_key = 'debuggees';
  protected $debuggeesType = Debuggee::class;
  protected $debuggeesDataType = 'array';

  /**
   * @param Debuggee[]
   */
  public function setDebuggees($debuggees)
  {
    $this->debuggees = $debuggees;
  }
  /**
   * @return Debuggee[]
   */
  public function getDebuggees()
  {
    return $this->debuggees;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ListDebuggeesResponse::class, 'Google_Service_CloudDebugger_ListDebuggeesResponse');
