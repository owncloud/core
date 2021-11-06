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

namespace Google\Service\Dataflow;

class LaunchFlexTemplateRequest extends \Google\Model
{
  protected $launchParameterType = LaunchFlexTemplateParameter::class;
  protected $launchParameterDataType = '';
  public $validateOnly;

  /**
   * @param LaunchFlexTemplateParameter
   */
  public function setLaunchParameter(LaunchFlexTemplateParameter $launchParameter)
  {
    $this->launchParameter = $launchParameter;
  }
  /**
   * @return LaunchFlexTemplateParameter
   */
  public function getLaunchParameter()
  {
    return $this->launchParameter;
  }
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LaunchFlexTemplateRequest::class, 'Google_Service_Dataflow_LaunchFlexTemplateRequest');
