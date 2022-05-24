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

namespace Google\Service\Firebaseappcheck;

class GoogleFirebaseAppcheckV1UpdateServiceRequest extends \Google\Model
{
  protected $serviceType = GoogleFirebaseAppcheckV1Service::class;
  protected $serviceDataType = '';
  /**
   * @var string
   */
  public $updateMask;

  /**
   * @param GoogleFirebaseAppcheckV1Service
   */
  public function setService(GoogleFirebaseAppcheckV1Service $service)
  {
    $this->service = $service;
  }
  /**
   * @return GoogleFirebaseAppcheckV1Service
   */
  public function getService()
  {
    return $this->service;
  }
  /**
   * @param string
   */
  public function setUpdateMask($updateMask)
  {
    $this->updateMask = $updateMask;
  }
  /**
   * @return string
   */
  public function getUpdateMask()
  {
    return $this->updateMask;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseAppcheckV1UpdateServiceRequest::class, 'Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1UpdateServiceRequest');
