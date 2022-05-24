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

namespace Google\Service\OSConfig;

class OSPolicyResourceExecResource extends \Google\Model
{
  protected $enforceType = OSPolicyResourceExecResourceExec::class;
  protected $enforceDataType = '';
  protected $validateType = OSPolicyResourceExecResourceExec::class;
  protected $validateDataType = '';

  /**
   * @param OSPolicyResourceExecResourceExec
   */
  public function setEnforce(OSPolicyResourceExecResourceExec $enforce)
  {
    $this->enforce = $enforce;
  }
  /**
   * @return OSPolicyResourceExecResourceExec
   */
  public function getEnforce()
  {
    return $this->enforce;
  }
  /**
   * @param OSPolicyResourceExecResourceExec
   */
  public function setValidate(OSPolicyResourceExecResourceExec $validate)
  {
    $this->validate = $validate;
  }
  /**
   * @return OSPolicyResourceExecResourceExec
   */
  public function getValidate()
  {
    return $this->validate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OSPolicyResourceExecResource::class, 'Google_Service_OSConfig_OSPolicyResourceExecResource');
