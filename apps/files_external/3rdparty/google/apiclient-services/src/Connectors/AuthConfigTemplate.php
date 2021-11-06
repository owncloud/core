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

namespace Google\Service\Connectors;

class AuthConfigTemplate extends \Google\Collection
{
  protected $collection_key = 'configVariableTemplates';
  public $authType;
  protected $configVariableTemplatesType = ConfigVariableTemplate::class;
  protected $configVariableTemplatesDataType = 'array';

  public function setAuthType($authType)
  {
    $this->authType = $authType;
  }
  public function getAuthType()
  {
    return $this->authType;
  }
  /**
   * @param ConfigVariableTemplate[]
   */
  public function setConfigVariableTemplates($configVariableTemplates)
  {
    $this->configVariableTemplates = $configVariableTemplates;
  }
  /**
   * @return ConfigVariableTemplate[]
   */
  public function getConfigVariableTemplates()
  {
    return $this->configVariableTemplates;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AuthConfigTemplate::class, 'Google_Service_Connectors_AuthConfigTemplate');
