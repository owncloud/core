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

namespace Google\Service\CloudRun;

class GoogleCloudRunOpV2EnvVarSource extends \Google\Model
{
  protected $secretKeyRefType = GoogleCloudRunOpV2SecretKeySelector::class;
  protected $secretKeyRefDataType = '';

  /**
   * @param GoogleCloudRunOpV2SecretKeySelector
   */
  public function setSecretKeyRef(GoogleCloudRunOpV2SecretKeySelector $secretKeyRef)
  {
    $this->secretKeyRef = $secretKeyRef;
  }
  /**
   * @return GoogleCloudRunOpV2SecretKeySelector
   */
  public function getSecretKeyRef()
  {
    return $this->secretKeyRef;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRunOpV2EnvVarSource::class, 'Google_Service_CloudRun_GoogleCloudRunOpV2EnvVarSource');
