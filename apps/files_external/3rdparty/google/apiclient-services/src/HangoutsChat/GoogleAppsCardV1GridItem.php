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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1GridItem extends \Google\Model
{
  /**
   * @var string
   */
  public $id;
  protected $imageType = GoogleAppsCardV1ImageComponent::class;
  protected $imageDataType = '';
  /**
   * @var string
   */
  public $layout;
  /**
   * @var string
   */
  public $subtitle;
  /**
   * @var string
   */
  public $textAlignment;
  /**
   * @var string
   */
  public $title;

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param GoogleAppsCardV1ImageComponent
   */
  public function setImage(GoogleAppsCardV1ImageComponent $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleAppsCardV1ImageComponent
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param string
   */
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return string
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param string
   */
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;
  }
  /**
   * @return string
   */
  public function getSubtitle()
  {
    return $this->subtitle;
  }
  /**
   * @param string
   */
  public function setTextAlignment($textAlignment)
  {
    $this->textAlignment = $textAlignment;
  }
  /**
   * @return string
   */
  public function getTextAlignment()
  {
    return $this->textAlignment;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1GridItem::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1GridItem');
