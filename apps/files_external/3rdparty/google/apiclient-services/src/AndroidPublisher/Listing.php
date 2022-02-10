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

namespace Google\Service\AndroidPublisher;

class Listing extends \Google\Model
{
  /**
   * @var string
   */
  public $fullDescription;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $shortDescription;
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $video;

  /**
   * @param string
   */
  public function setFullDescription($fullDescription)
  {
    $this->fullDescription = $fullDescription;
  }
  /**
   * @return string
   */
  public function getFullDescription()
  {
    return $this->fullDescription;
  }
  /**
   * @param string
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return string
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setShortDescription($shortDescription)
  {
    $this->shortDescription = $shortDescription;
  }
  /**
   * @return string
   */
  public function getShortDescription()
  {
    return $this->shortDescription;
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
  /**
   * @param string
   */
  public function setVideo($video)
  {
    $this->video = $video;
  }
  /**
   * @return string
   */
  public function getVideo()
  {
    return $this->video;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Listing::class, 'Google_Service_AndroidPublisher_Listing');
