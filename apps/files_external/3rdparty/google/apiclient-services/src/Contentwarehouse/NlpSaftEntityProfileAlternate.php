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

class NlpSaftEntityProfileAlternate extends \Google\Model
{
  /**
   * @var int
   */
  public $count;
  /**
   * @var int
   */
  public $form;
  /**
   * @var string
   */
  public $frame;
  /**
   * @var int
   */
  public $language;
  /**
   * @var string
   */
  public $name;
  /**
   * @var int
   */
  public $sources;

  /**
   * @param int
   */
  public function setCount($count)
  {
    $this->count = $count;
  }
  /**
   * @return int
   */
  public function getCount()
  {
    return $this->count;
  }
  /**
   * @param int
   */
  public function setForm($form)
  {
    $this->form = $form;
  }
  /**
   * @return int
   */
  public function getForm()
  {
    return $this->form;
  }
  /**
   * @param string
   */
  public function setFrame($frame)
  {
    $this->frame = $frame;
  }
  /**
   * @return string
   */
  public function getFrame()
  {
    return $this->frame;
  }
  /**
   * @param int
   */
  public function setLanguage($language)
  {
    $this->language = $language;
  }
  /**
   * @return int
   */
  public function getLanguage()
  {
    return $this->language;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param int
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return int
   */
  public function getSources()
  {
    return $this->sources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftEntityProfileAlternate::class, 'Google_Service_Contentwarehouse_NlpSaftEntityProfileAlternate');
