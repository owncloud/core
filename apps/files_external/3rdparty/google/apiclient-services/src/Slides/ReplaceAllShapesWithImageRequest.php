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

class ReplaceAllShapesWithImageRequest extends \Google\Collection
{
  protected $collection_key = 'pageObjectIds';
  protected $containsTextType = SubstringMatchCriteria::class;
  protected $containsTextDataType = '';
  /**
   * @var string
   */
  public $imageReplaceMethod;
  /**
   * @var string
   */
  public $imageUrl;
  /**
   * @var string[]
   */
  public $pageObjectIds;
  /**
   * @var string
   */
  public $replaceMethod;

  /**
   * @param SubstringMatchCriteria
   */
  public function setContainsText(SubstringMatchCriteria $containsText)
  {
    $this->containsText = $containsText;
  }
  /**
   * @return SubstringMatchCriteria
   */
  public function getContainsText()
  {
    return $this->containsText;
  }
  /**
   * @param string
   */
  public function setImageReplaceMethod($imageReplaceMethod)
  {
    $this->imageReplaceMethod = $imageReplaceMethod;
  }
  /**
   * @return string
   */
  public function getImageReplaceMethod()
  {
    return $this->imageReplaceMethod;
  }
  /**
   * @param string
   */
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  /**
   * @return string
   */
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  /**
   * @param string[]
   */
  public function setPageObjectIds($pageObjectIds)
  {
    $this->pageObjectIds = $pageObjectIds;
  }
  /**
   * @return string[]
   */
  public function getPageObjectIds()
  {
    return $this->pageObjectIds;
  }
  /**
   * @param string
   */
  public function setReplaceMethod($replaceMethod)
  {
    $this->replaceMethod = $replaceMethod;
  }
  /**
   * @return string
   */
  public function getReplaceMethod()
  {
    return $this->replaceMethod;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReplaceAllShapesWithImageRequest::class, 'Google_Service_Slides_ReplaceAllShapesWithImageRequest');
