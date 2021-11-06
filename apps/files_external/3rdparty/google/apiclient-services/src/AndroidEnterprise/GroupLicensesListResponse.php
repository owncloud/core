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

namespace Google\Service\AndroidEnterprise;

class GroupLicensesListResponse extends \Google\Collection
{
  protected $collection_key = 'groupLicense';
  protected $groupLicenseType = GroupLicense::class;
  protected $groupLicenseDataType = 'array';

  /**
   * @param GroupLicense[]
   */
  public function setGroupLicense($groupLicense)
  {
    $this->groupLicense = $groupLicense;
  }
  /**
   * @return GroupLicense[]
   */
  public function getGroupLicense()
  {
    return $this->groupLicense;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GroupLicensesListResponse::class, 'Google_Service_AndroidEnterprise_GroupLicensesListResponse');
