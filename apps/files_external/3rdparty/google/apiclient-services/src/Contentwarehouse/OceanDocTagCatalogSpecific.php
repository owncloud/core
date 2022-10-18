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

class OceanDocTagCatalogSpecific extends \Google\Model
{
  /**
   * @var bool
   */
  public $latest;
  /**
   * @var int
   */
  public $publicationDate;
  /**
   * @var string
   */
  public $publicationTimeToDisplay;

  /**
   * @param bool
   */
  public function setLatest($latest)
  {
    $this->latest = $latest;
  }
  /**
   * @return bool
   */
  public function getLatest()
  {
    return $this->latest;
  }
  /**
   * @param int
   */
  public function setPublicationDate($publicationDate)
  {
    $this->publicationDate = $publicationDate;
  }
  /**
   * @return int
   */
  public function getPublicationDate()
  {
    return $this->publicationDate;
  }
  /**
   * @param string
   */
  public function setPublicationTimeToDisplay($publicationTimeToDisplay)
  {
    $this->publicationTimeToDisplay = $publicationTimeToDisplay;
  }
  /**
   * @return string
   */
  public function getPublicationTimeToDisplay()
  {
    return $this->publicationTimeToDisplay;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanDocTagCatalogSpecific::class, 'Google_Service_Contentwarehouse_OceanDocTagCatalogSpecific');
