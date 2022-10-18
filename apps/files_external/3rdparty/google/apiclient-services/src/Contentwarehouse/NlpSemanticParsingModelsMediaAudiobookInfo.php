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

class NlpSemanticParsingModelsMediaAudiobookInfo extends \Google\Collection
{
  protected $collection_key = 'narrators';
  /**
   * @var string
   */
  public $audiobookMid;
  /**
   * @var string[]
   */
  public $authors;
  /**
   * @var string
   */
  public $bookMid;
  /**
   * @var string[]
   */
  public $narrators;

  /**
   * @param string
   */
  public function setAudiobookMid($audiobookMid)
  {
    $this->audiobookMid = $audiobookMid;
  }
  /**
   * @return string
   */
  public function getAudiobookMid()
  {
    return $this->audiobookMid;
  }
  /**
   * @param string[]
   */
  public function setAuthors($authors)
  {
    $this->authors = $authors;
  }
  /**
   * @return string[]
   */
  public function getAuthors()
  {
    return $this->authors;
  }
  /**
   * @param string
   */
  public function setBookMid($bookMid)
  {
    $this->bookMid = $bookMid;
  }
  /**
   * @return string
   */
  public function getBookMid()
  {
    return $this->bookMid;
  }
  /**
   * @param string[]
   */
  public function setNarrators($narrators)
  {
    $this->narrators = $narrators;
  }
  /**
   * @return string[]
   */
  public function getNarrators()
  {
    return $this->narrators;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSemanticParsingModelsMediaAudiobookInfo::class, 'Google_Service_Contentwarehouse_NlpSemanticParsingModelsMediaAudiobookInfo');
