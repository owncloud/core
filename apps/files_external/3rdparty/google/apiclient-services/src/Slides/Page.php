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

namespace Google\Service\Slides;

class Page extends \Google\Collection
{
  protected $collection_key = 'pageElements';
  protected $layoutPropertiesType = LayoutProperties::class;
  protected $layoutPropertiesDataType = '';
  protected $masterPropertiesType = MasterProperties::class;
  protected $masterPropertiesDataType = '';
  protected $notesPropertiesType = NotesProperties::class;
  protected $notesPropertiesDataType = '';
  /**
   * @var string
   */
  public $objectId;
  protected $pageElementsType = PageElement::class;
  protected $pageElementsDataType = 'array';
  protected $pagePropertiesType = PageProperties::class;
  protected $pagePropertiesDataType = '';
  /**
   * @var string
   */
  public $pageType;
  /**
   * @var string
   */
  public $revisionId;
  protected $slidePropertiesType = SlideProperties::class;
  protected $slidePropertiesDataType = '';

  /**
   * @param LayoutProperties
   */
  public function setLayoutProperties(LayoutProperties $layoutProperties)
  {
    $this->layoutProperties = $layoutProperties;
  }
  /**
   * @return LayoutProperties
   */
  public function getLayoutProperties()
  {
    return $this->layoutProperties;
  }
  /**
   * @param MasterProperties
   */
  public function setMasterProperties(MasterProperties $masterProperties)
  {
    $this->masterProperties = $masterProperties;
  }
  /**
   * @return MasterProperties
   */
  public function getMasterProperties()
  {
    return $this->masterProperties;
  }
  /**
   * @param NotesProperties
   */
  public function setNotesProperties(NotesProperties $notesProperties)
  {
    $this->notesProperties = $notesProperties;
  }
  /**
   * @return NotesProperties
   */
  public function getNotesProperties()
  {
    return $this->notesProperties;
  }
  /**
   * @param string
   */
  public function setObjectId($objectId)
  {
    $this->objectId = $objectId;
  }
  /**
   * @return string
   */
  public function getObjectId()
  {
    return $this->objectId;
  }
  /**
   * @param PageElement[]
   */
  public function setPageElements($pageElements)
  {
    $this->pageElements = $pageElements;
  }
  /**
   * @return PageElement[]
   */
  public function getPageElements()
  {
    return $this->pageElements;
  }
  /**
   * @param PageProperties
   */
  public function setPageProperties(PageProperties $pageProperties)
  {
    $this->pageProperties = $pageProperties;
  }
  /**
   * @return PageProperties
   */
  public function getPageProperties()
  {
    return $this->pageProperties;
  }
  /**
   * @param string
   */
  public function setPageType($pageType)
  {
    $this->pageType = $pageType;
  }
  /**
   * @return string
   */
  public function getPageType()
  {
    return $this->pageType;
  }
  /**
   * @param string
   */
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  /**
   * @return string
   */
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param SlideProperties
   */
  public function setSlideProperties(SlideProperties $slideProperties)
  {
    $this->slideProperties = $slideProperties;
  }
  /**
   * @return SlideProperties
   */
  public function getSlideProperties()
  {
    return $this->slideProperties;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Page::class, 'Google_Service_Slides_Page');
