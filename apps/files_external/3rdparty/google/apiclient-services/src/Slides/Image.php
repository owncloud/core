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

class Image extends \Google\Model
{
  /**
   * @var string
   */
  public $contentUrl;
  protected $imagePropertiesType = ImageProperties::class;
  protected $imagePropertiesDataType = '';
  protected $placeholderType = Placeholder::class;
  protected $placeholderDataType = '';
  /**
   * @var string
   */
  public $sourceUrl;

  /**
   * @param string
   */
  public function setContentUrl($contentUrl)
  {
    $this->contentUrl = $contentUrl;
  }
  /**
   * @return string
   */
  public function getContentUrl()
  {
    return $this->contentUrl;
  }
  /**
   * @param ImageProperties
   */
  public function setImageProperties(ImageProperties $imageProperties)
  {
    $this->imageProperties = $imageProperties;
  }
  /**
   * @return ImageProperties
   */
  public function getImageProperties()
  {
    return $this->imageProperties;
  }
  /**
   * @param Placeholder
   */
  public function setPlaceholder(Placeholder $placeholder)
  {
    $this->placeholder = $placeholder;
  }
  /**
   * @return Placeholder
   */
  public function getPlaceholder()
  {
    return $this->placeholder;
  }
  /**
   * @param string
   */
  public function setSourceUrl($sourceUrl)
  {
    $this->sourceUrl = $sourceUrl;
  }
  /**
   * @return string
   */
  public function getSourceUrl()
  {
    return $this->sourceUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Image::class, 'Google_Service_Slides_Image');
