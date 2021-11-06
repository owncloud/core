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

namespace Google\Service\Drive;

class DriveFileLinkShareMetadata extends \Google\Model
{
  public $securityUpdateEligible;
  public $securityUpdateEnabled;

  public function setSecurityUpdateEligible($securityUpdateEligible)
  {
    $this->securityUpdateEligible = $securityUpdateEligible;
  }
  public function getSecurityUpdateEligible()
  {
    return $this->securityUpdateEligible;
  }
  public function setSecurityUpdateEnabled($securityUpdateEnabled)
  {
    $this->securityUpdateEnabled = $securityUpdateEnabled;
  }
  public function getSecurityUpdateEnabled()
  {
    return $this->securityUpdateEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DriveFileLinkShareMetadata::class, 'Google_Service_Drive_DriveFileLinkShareMetadata');
