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

namespace Google\Service\FirebaseManagement;

class AddGoogleAnalyticsRequest extends \Google\Model
{
  public $analyticsAccountId;
  public $analyticsPropertyId;

  public function setAnalyticsAccountId($analyticsAccountId)
  {
    $this->analyticsAccountId = $analyticsAccountId;
  }
  public function getAnalyticsAccountId()
  {
    return $this->analyticsAccountId;
  }
  public function setAnalyticsPropertyId($analyticsPropertyId)
  {
    $this->analyticsPropertyId = $analyticsPropertyId;
  }
  public function getAnalyticsPropertyId()
  {
    return $this->analyticsPropertyId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddGoogleAnalyticsRequest::class, 'Google_Service_FirebaseManagement_AddGoogleAnalyticsRequest');
