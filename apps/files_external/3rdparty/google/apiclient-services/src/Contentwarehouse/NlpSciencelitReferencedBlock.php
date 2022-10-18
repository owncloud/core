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

class NlpSciencelitReferencedBlock extends \Google\Model
{
  protected $captionType = NlpSciencelitTokenizedText::class;
  protected $captionDataType = '';
  /**
   * @var string
   */
  public $reference;
  protected $titleType = NlpSciencelitTokenizedText::class;
  protected $titleDataType = '';
  /**
   * @var string
   */
  public $type;

  /**
   * @param NlpSciencelitTokenizedText
   */
  public function setCaption(NlpSciencelitTokenizedText $caption)
  {
    $this->caption = $caption;
  }
  /**
   * @return NlpSciencelitTokenizedText
   */
  public function getCaption()
  {
    return $this->caption;
  }
  /**
   * @param string
   */
  public function setReference($reference)
  {
    $this->reference = $reference;
  }
  /**
   * @return string
   */
  public function getReference()
  {
    return $this->reference;
  }
  /**
   * @param NlpSciencelitTokenizedText
   */
  public function setTitle(NlpSciencelitTokenizedText $title)
  {
    $this->title = $title;
  }
  /**
   * @return NlpSciencelitTokenizedText
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setType($type)
  {
    $this->type = $type;
  }
  /**
   * @return string
   */
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSciencelitReferencedBlock::class, 'Google_Service_Contentwarehouse_NlpSciencelitReferencedBlock');
