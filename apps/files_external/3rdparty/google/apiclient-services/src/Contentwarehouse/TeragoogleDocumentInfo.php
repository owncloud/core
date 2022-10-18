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

class TeragoogleDocumentInfo extends \Google\Collection
{
  protected $collection_key = 'section';
  protected $attachmentType = TeragoogleDocumentInfoAttachment::class;
  protected $attachmentDataType = 'array';
  /**
   * @var int
   */
  public $averageTermWeight;
  protected $docType = GDocumentBase::class;
  protected $docDataType = '';
  /**
   * @var string
   */
  public $extendedDocid;
  /**
   * @var string
   */
  public $globalDocid;
  /**
   * @var int
   */
  public $originalEncoding;
  protected $sectionDataType = 'array';
  /**
   * @var string
   */
  public $sectionType;

  /**
   * @param TeragoogleDocumentInfoAttachment[]
   */
  public function setAttachment($attachment)
  {
    $this->attachment = $attachment;
  }
  /**
   * @return TeragoogleDocumentInfoAttachment[]
   */
  public function getAttachment()
  {
    return $this->attachment;
  }
  /**
   * @param int
   */
  public function setAverageTermWeight($averageTermWeight)
  {
    $this->averageTermWeight = $averageTermWeight;
  }
  /**
   * @return int
   */
  public function getAverageTermWeight()
  {
    return $this->averageTermWeight;
  }
  /**
   * @param GDocumentBase
   */
  public function setDoc(GDocumentBase $doc)
  {
    $this->doc = $doc;
  }
  /**
   * @return GDocumentBase
   */
  public function getDoc()
  {
    return $this->doc;
  }
  /**
   * @param string
   */
  public function setExtendedDocid($extendedDocid)
  {
    $this->extendedDocid = $extendedDocid;
  }
  /**
   * @return string
   */
  public function getExtendedDocid()
  {
    return $this->extendedDocid;
  }
  /**
   * @param string
   */
  public function setGlobalDocid($globalDocid)
  {
    $this->globalDocid = $globalDocid;
  }
  /**
   * @return string
   */
  public function getGlobalDocid()
  {
    return $this->globalDocid;
  }
  /**
   * @param int
   */
  public function setOriginalEncoding($originalEncoding)
  {
    $this->originalEncoding = $originalEncoding;
  }
  /**
   * @return int
   */
  public function getOriginalEncoding()
  {
    return $this->originalEncoding;
  }
  /**
   * @param TeragoogleDocumentInfoSection[]
   */
  public function setSection($section)
  {
    $this->section = $section;
  }
  /**
   * @return TeragoogleDocumentInfoSection[]
   */
  public function getSection()
  {
    return $this->section;
  }
  /**
   * @param string
   */
  public function setSectionType($sectionType)
  {
    $this->sectionType = $sectionType;
  }
  /**
   * @return string
   */
  public function getSectionType()
  {
    return $this->sectionType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TeragoogleDocumentInfo::class, 'Google_Service_Contentwarehouse_TeragoogleDocumentInfo');
