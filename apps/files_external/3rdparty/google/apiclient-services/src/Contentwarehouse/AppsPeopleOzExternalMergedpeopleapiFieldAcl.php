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

namespace Google\Service\Contentwarehouse;

class AppsPeopleOzExternalMergedpeopleapiFieldAcl extends \Google\Collection
{
  protected $collection_key = 'predefinedAclEntry';
  protected $aclEntryType = AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntry::class;
  protected $aclEntryDataType = 'array';
  /**
   * @var string[]
   */
  public $authorizedViewers;
  /**
   * @var string[]
   */
  public $predefinedAclEntry;

  /**
   * @param AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntry[]
   */
  public function setAclEntry($aclEntry)
  {
    $this->aclEntry = $aclEntry;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiFieldAclAclEntry[]
   */
  public function getAclEntry()
  {
    return $this->aclEntry;
  }
  /**
   * @param string[]
   */
  public function setAuthorizedViewers($authorizedViewers)
  {
    $this->authorizedViewers = $authorizedViewers;
  }
  /**
   * @return string[]
   */
  public function getAuthorizedViewers()
  {
    return $this->authorizedViewers;
  }
  /**
   * @param string[]
   */
  public function setPredefinedAclEntry($predefinedAclEntry)
  {
    $this->predefinedAclEntry = $predefinedAclEntry;
  }
  /**
   * @return string[]
   */
  public function getPredefinedAclEntry()
  {
    return $this->predefinedAclEntry;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiFieldAcl::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiFieldAcl');
