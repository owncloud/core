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

class OceanDocTagMagazineSpecific extends \Google\Collection
{
  protected $collection_key = 'pageToItem';
  /**
   * @var string
   */
  public $displayDate;
  /**
   * @var string
   */
  public $issueDescription;
  /**
   * @var int
   */
  public $issueEnd;
  /**
   * @var int
   */
  public $issueStart;
  protected $itemType = OceanDataDocinfoWoodwingItemMetadata::class;
  protected $itemDataType = 'array';
  /**
   * @var int
   */
  public $otherNumberingEnd;
  /**
   * @var int
   */
  public $otherNumberingSchema;
  /**
   * @var int
   */
  public $otherNumberingStart;
  /**
   * @var int[]
   */
  public $pageToItem;
  /**
   * @var string
   */
  public $publicationDateEnd;
  /**
   * @var string
   */
  public $publicationDateStart;
  /**
   * @var string
   */
  public $serialTitle;
  /**
   * @var string
   */
  public $serialVolumeid;
  /**
   * @var int
   */
  public $volume;

  /**
   * @param string
   */
  public function setDisplayDate($displayDate)
  {
    $this->displayDate = $displayDate;
  }
  /**
   * @return string
   */
  public function getDisplayDate()
  {
    return $this->displayDate;
  }
  /**
   * @param string
   */
  public function setIssueDescription($issueDescription)
  {
    $this->issueDescription = $issueDescription;
  }
  /**
   * @return string
   */
  public function getIssueDescription()
  {
    return $this->issueDescription;
  }
  /**
   * @param int
   */
  public function setIssueEnd($issueEnd)
  {
    $this->issueEnd = $issueEnd;
  }
  /**
   * @return int
   */
  public function getIssueEnd()
  {
    return $this->issueEnd;
  }
  /**
   * @param int
   */
  public function setIssueStart($issueStart)
  {
    $this->issueStart = $issueStart;
  }
  /**
   * @return int
   */
  public function getIssueStart()
  {
    return $this->issueStart;
  }
  /**
   * @param OceanDataDocinfoWoodwingItemMetadata[]
   */
  public function setItem($item)
  {
    $this->item = $item;
  }
  /**
   * @return OceanDataDocinfoWoodwingItemMetadata[]
   */
  public function getItem()
  {
    return $this->item;
  }
  /**
   * @param int
   */
  public function setOtherNumberingEnd($otherNumberingEnd)
  {
    $this->otherNumberingEnd = $otherNumberingEnd;
  }
  /**
   * @return int
   */
  public function getOtherNumberingEnd()
  {
    return $this->otherNumberingEnd;
  }
  /**
   * @param int
   */
  public function setOtherNumberingSchema($otherNumberingSchema)
  {
    $this->otherNumberingSchema = $otherNumberingSchema;
  }
  /**
   * @return int
   */
  public function getOtherNumberingSchema()
  {
    return $this->otherNumberingSchema;
  }
  /**
   * @param int
   */
  public function setOtherNumberingStart($otherNumberingStart)
  {
    $this->otherNumberingStart = $otherNumberingStart;
  }
  /**
   * @return int
   */
  public function getOtherNumberingStart()
  {
    return $this->otherNumberingStart;
  }
  /**
   * @param int[]
   */
  public function setPageToItem($pageToItem)
  {
    $this->pageToItem = $pageToItem;
  }
  /**
   * @return int[]
   */
  public function getPageToItem()
  {
    return $this->pageToItem;
  }
  /**
   * @param string
   */
  public function setPublicationDateEnd($publicationDateEnd)
  {
    $this->publicationDateEnd = $publicationDateEnd;
  }
  /**
   * @return string
   */
  public function getPublicationDateEnd()
  {
    return $this->publicationDateEnd;
  }
  /**
   * @param string
   */
  public function setPublicationDateStart($publicationDateStart)
  {
    $this->publicationDateStart = $publicationDateStart;
  }
  /**
   * @return string
   */
  public function getPublicationDateStart()
  {
    return $this->publicationDateStart;
  }
  /**
   * @param string
   */
  public function setSerialTitle($serialTitle)
  {
    $this->serialTitle = $serialTitle;
  }
  /**
   * @return string
   */
  public function getSerialTitle()
  {
    return $this->serialTitle;
  }
  /**
   * @param string
   */
  public function setSerialVolumeid($serialVolumeid)
  {
    $this->serialVolumeid = $serialVolumeid;
  }
  /**
   * @return string
   */
  public function getSerialVolumeid()
  {
    return $this->serialVolumeid;
  }
  /**
   * @param int
   */
  public function setVolume($volume)
  {
    $this->volume = $volume;
  }
  /**
   * @return int
   */
  public function getVolume()
  {
    return $this->volume;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OceanDocTagMagazineSpecific::class, 'Google_Service_Contentwarehouse_OceanDocTagMagazineSpecific');
