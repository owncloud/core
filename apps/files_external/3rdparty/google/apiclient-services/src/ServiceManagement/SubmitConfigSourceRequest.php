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

class SubmitConfigSourceRequest extends \Google\Model
{
  protected $configSourceType = ConfigSource::class;
  protected $configSourceDataType = '';
  /**
   * @var bool
   */
  public $validateOnly;

  /**
   * @param ConfigSource
   */
  public function setConfigSource(ConfigSource $configSource)
  {
    $this->configSource = $configSource;
  }
  /**
   * @return ConfigSource
   */
  public function getConfigSource()
  {
    return $this->configSource;
  }
  /**
   * @param bool
   */
  public function setValidateOnly($validateOnly)
  {
    $this->validateOnly = $validateOnly;
  }
  /**
   * @return bool
   */
  public function getValidateOnly()
  {
    return $this->validateOnly;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubmitConfigSourceRequest::class, 'Google_Service_ServiceManagement_SubmitConfigSourceRequest');
