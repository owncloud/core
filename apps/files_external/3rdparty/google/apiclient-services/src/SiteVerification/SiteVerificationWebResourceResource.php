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

namespace Google\Service\SiteVerification;

class SiteVerificationWebResourceResource extends \Google\Collection
{
  protected $collection_key = 'owners';
  public $id;
  public $owners;
  protected $siteType = SiteVerificationWebResourceResourceSite::class;
  protected $siteDataType = '';

  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setOwners($owners)
  {
    $this->owners = $owners;
  }
  public function getOwners()
  {
    return $this->owners;
  }
  /**
   * @param SiteVerificationWebResourceResourceSite
   */
  public function setSite(SiteVerificationWebResourceResourceSite $site)
  {
    $this->site = $site;
  }
  /**
   * @return SiteVerificationWebResourceResourceSite
   */
  public function getSite()
  {
    return $this->site;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SiteVerificationWebResourceResource::class, 'Google_Service_SiteVerification_SiteVerificationWebResourceResource');
