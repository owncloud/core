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

namespace Google\Service\Dataproc;

class EnvironmentConfig extends \Google\Model
{
  protected $executionConfigType = ExecutionConfig::class;
  protected $executionConfigDataType = '';
  protected $peripheralsConfigType = PeripheralsConfig::class;
  protected $peripheralsConfigDataType = '';

  /**
   * @param ExecutionConfig
   */
  public function setExecutionConfig(ExecutionConfig $executionConfig)
  {
    $this->executionConfig = $executionConfig;
  }
  /**
   * @return ExecutionConfig
   */
  public function getExecutionConfig()
  {
    return $this->executionConfig;
  }
  /**
   * @param PeripheralsConfig
   */
  public function setPeripheralsConfig(PeripheralsConfig $peripheralsConfig)
  {
    $this->peripheralsConfig = $peripheralsConfig;
  }
  /**
   * @return PeripheralsConfig
   */
  public function getPeripheralsConfig()
  {
    return $this->peripheralsConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EnvironmentConfig::class, 'Google_Service_Dataproc_EnvironmentConfig');
