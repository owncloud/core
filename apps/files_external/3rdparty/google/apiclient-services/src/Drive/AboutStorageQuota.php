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

class AboutStorageQuota extends \Google\Model
{
  /**
   * @var string
   */
  public $limit;
  /**
   * @var string
   */
  public $usage;
  /**
   * @var string
   */
  public $usageInDrive;
  /**
   * @var string
   */
  public $usageInDriveTrash;

  /**
   * @param string
   */
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  /**
   * @return string
   */
  public function getLimit()
  {
    return $this->limit;
  }
  /**
   * @param string
   */
  public function setUsage($usage)
  {
    $this->usage = $usage;
  }
  /**
   * @return string
   */
  public function getUsage()
  {
    return $this->usage;
  }
  /**
   * @param string
   */
  public function setUsageInDrive($usageInDrive)
  {
    $this->usageInDrive = $usageInDrive;
  }
  /**
   * @return string
   */
  public function getUsageInDrive()
  {
    return $this->usageInDrive;
  }
  /**
   * @param string
   */
  public function setUsageInDriveTrash($usageInDriveTrash)
  {
    $this->usageInDriveTrash = $usageInDriveTrash;
  }
  /**
   * @return string
   */
  public function getUsageInDriveTrash()
  {
    return $this->usageInDriveTrash;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AboutStorageQuota::class, 'Google_Service_Drive_AboutStorageQuota');
