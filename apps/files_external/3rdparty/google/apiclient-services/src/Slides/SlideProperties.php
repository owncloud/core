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

class SlideProperties extends \Google\Model
{
  /**
   * @var bool
   */
  public $isSkipped;
  /**
   * @var string
   */
  public $layoutObjectId;
  /**
   * @var string
   */
  public $masterObjectId;
  protected $notesPageType = Page::class;
  protected $notesPageDataType = '';

  /**
   * @param bool
   */
  public function setIsSkipped($isSkipped)
  {
    $this->isSkipped = $isSkipped;
  }
  /**
   * @return bool
   */
  public function getIsSkipped()
  {
    return $this->isSkipped;
  }
  /**
   * @param string
   */
  public function setLayoutObjectId($layoutObjectId)
  {
    $this->layoutObjectId = $layoutObjectId;
  }
  /**
   * @return string
   */
  public function getLayoutObjectId()
  {
    return $this->layoutObjectId;
  }
  /**
   * @param string
   */
  public function setMasterObjectId($masterObjectId)
  {
    $this->masterObjectId = $masterObjectId;
  }
  /**
   * @return string
   */
  public function getMasterObjectId()
  {
    return $this->masterObjectId;
  }
  /**
   * @param Page
   */
  public function setNotesPage(Page $notesPage)
  {
    $this->notesPage = $notesPage;
  }
  /**
   * @return Page
   */
  public function getNotesPage()
  {
    return $this->notesPage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SlideProperties::class, 'Google_Service_Slides_SlideProperties');
