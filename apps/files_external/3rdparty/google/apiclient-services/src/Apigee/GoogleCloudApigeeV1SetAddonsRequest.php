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

namespace Google\Service\Apigee;

class GoogleCloudApigeeV1SetAddonsRequest extends \Google\Model
{
  protected $addonsConfigType = GoogleCloudApigeeV1AddonsConfig::class;
  protected $addonsConfigDataType = '';

  /**
   * @param GoogleCloudApigeeV1AddonsConfig
   */
  public function setAddonsConfig(GoogleCloudApigeeV1AddonsConfig $addonsConfig)
  {
    $this->addonsConfig = $addonsConfig;
  }
  /**
   * @return GoogleCloudApigeeV1AddonsConfig
   */
  public function getAddonsConfig()
  {
    return $this->addonsConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudApigeeV1SetAddonsRequest::class, 'Google_Service_Apigee_GoogleCloudApigeeV1SetAddonsRequest');
