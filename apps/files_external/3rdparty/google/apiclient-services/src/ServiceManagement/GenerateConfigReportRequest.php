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

namespace Google\Service\ServiceManagement;

class GenerateConfigReportRequest extends \Google\Model
{
  /**
   * @var array[]
   */
  public $newConfig;
  /**
   * @var array[]
   */
  public $oldConfig;

  /**
   * @param array[]
   */
  public function setNewConfig($newConfig)
  {
    $this->newConfig = $newConfig;
  }
  /**
   * @return array[]
   */
  public function getNewConfig()
  {
    return $this->newConfig;
  }
  /**
   * @param array[]
   */
  public function setOldConfig($oldConfig)
  {
    $this->oldConfig = $oldConfig;
  }
  /**
   * @return array[]
   */
  public function getOldConfig()
  {
    return $this->oldConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GenerateConfigReportRequest::class, 'Google_Service_ServiceManagement_GenerateConfigReportRequest');
