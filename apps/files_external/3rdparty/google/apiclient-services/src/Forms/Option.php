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

namespace Google\Service\Forms;

class Option extends \Google\Model
{
  /**
   * @var string
   */
  public $goToAction;
  /**
   * @var string
   */
  public $goToSectionId;
  protected $imageType = Image::class;
  protected $imageDataType = '';
  /**
   * @var bool
   */
  public $isOther;
  /**
   * @var string
   */
  public $value;

  /**
   * @param string
   */
  public function setGoToAction($goToAction)
  {
    $this->goToAction = $goToAction;
  }
  /**
   * @return string
   */
  public function getGoToAction()
  {
    return $this->goToAction;
  }
  /**
   * @param string
   */
  public function setGoToSectionId($goToSectionId)
  {
    $this->goToSectionId = $goToSectionId;
  }
  /**
   * @return string
   */
  public function getGoToSectionId()
  {
    return $this->goToSectionId;
  }
  /**
   * @param Image
   */
  public function setImage(Image $image)
  {
    $this->image = $image;
  }
  /**
   * @return Image
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param bool
   */
  public function setIsOther($isOther)
  {
    $this->isOther = $isOther;
  }
  /**
   * @return bool
   */
  public function getIsOther()
  {
    return $this->isOther;
  }
  /**
   * @param string
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Option::class, 'Google_Service_Forms_Option');
