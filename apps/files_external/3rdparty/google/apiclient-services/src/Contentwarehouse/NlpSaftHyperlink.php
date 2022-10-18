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

class NlpSaftHyperlink extends \Google\Model
{
  /**
   * @var string
   */
  public $anchorText;
  /**
   * @var int
   */
  public $byteEnd;
  /**
   * @var int
   */
  public $byteStart;
  protected $phraseType = NlpSaftPhrase::class;
  protected $phraseDataType = '';
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setAnchorText($anchorText)
  {
    $this->anchorText = $anchorText;
  }
  /**
   * @return string
   */
  public function getAnchorText()
  {
    return $this->anchorText;
  }
  /**
   * @param int
   */
  public function setByteEnd($byteEnd)
  {
    $this->byteEnd = $byteEnd;
  }
  /**
   * @return int
   */
  public function getByteEnd()
  {
    return $this->byteEnd;
  }
  /**
   * @param int
   */
  public function setByteStart($byteStart)
  {
    $this->byteStart = $byteStart;
  }
  /**
   * @return int
   */
  public function getByteStart()
  {
    return $this->byteStart;
  }
  /**
   * @param NlpSaftPhrase
   */
  public function setPhrase(NlpSaftPhrase $phrase)
  {
    $this->phrase = $phrase;
  }
  /**
   * @return NlpSaftPhrase
   */
  public function getPhrase()
  {
    return $this->phrase;
  }
  /**
   * @param string
   */
  public function setUrl($url)
  {
    $this->url = $url;
  }
  /**
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NlpSaftHyperlink::class, 'Google_Service_Contentwarehouse_NlpSaftHyperlink');
