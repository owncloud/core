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

class KaltixPerDocData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "kaltixRank" => "KaltixRank",
        "localKaltixRank" => "LocalKaltixRank",
        "siteKaltixRank" => "SiteKaltixRank",
  ];
  /**
   * @var int
   */
  public $kaltixRank;
  /**
   * @var int
   */
  public $localKaltixRank;
  /**
   * @var int
   */
  public $siteKaltixRank;

  /**
   * @param int
   */
  public function setKaltixRank($kaltixRank)
  {
    $this->kaltixRank = $kaltixRank;
  }
  /**
   * @return int
   */
  public function getKaltixRank()
  {
    return $this->kaltixRank;
  }
  /**
   * @param int
   */
  public function setLocalKaltixRank($localKaltixRank)
  {
    $this->localKaltixRank = $localKaltixRank;
  }
  /**
   * @return int
   */
  public function getLocalKaltixRank()
  {
    return $this->localKaltixRank;
  }
  /**
   * @param int
   */
  public function setSiteKaltixRank($siteKaltixRank)
  {
    $this->siteKaltixRank = $siteKaltixRank;
  }
  /**
   * @return int
   */
  public function getSiteKaltixRank()
  {
    return $this->siteKaltixRank;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(KaltixPerDocData::class, 'Google_Service_Contentwarehouse_KaltixPerDocData');
