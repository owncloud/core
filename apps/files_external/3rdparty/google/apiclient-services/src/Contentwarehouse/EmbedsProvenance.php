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

class EmbedsProvenance extends \Google\Collection
{
  protected $collection_key = 'itemtype';
  /**
   * @var string
   */
  public $annotationBlob;
  /**
   * @var string
   */
  public $canonicalUrl;
  /**
   * @var string
   */
  public $inputUrl;
  /**
   * @var string[]
   */
  public $itemtype;
  /**
   * @var string
   */
  public $retrievedTimestampMsec;
  /**
   * @var string
   */
  public $retrievedUrl;

  /**
   * @param string
   */
  public function setAnnotationBlob($annotationBlob)
  {
    $this->annotationBlob = $annotationBlob;
  }
  /**
   * @return string
   */
  public function getAnnotationBlob()
  {
    return $this->annotationBlob;
  }
  /**
   * @param string
   */
  public function setCanonicalUrl($canonicalUrl)
  {
    $this->canonicalUrl = $canonicalUrl;
  }
  /**
   * @return string
   */
  public function getCanonicalUrl()
  {
    return $this->canonicalUrl;
  }
  /**
   * @param string
   */
  public function setInputUrl($inputUrl)
  {
    $this->inputUrl = $inputUrl;
  }
  /**
   * @return string
   */
  public function getInputUrl()
  {
    return $this->inputUrl;
  }
  /**
   * @param string[]
   */
  public function setItemtype($itemtype)
  {
    $this->itemtype = $itemtype;
  }
  /**
   * @return string[]
   */
  public function getItemtype()
  {
    return $this->itemtype;
  }
  /**
   * @param string
   */
  public function setRetrievedTimestampMsec($retrievedTimestampMsec)
  {
    $this->retrievedTimestampMsec = $retrievedTimestampMsec;
  }
  /**
   * @return string
   */
  public function getRetrievedTimestampMsec()
  {
    return $this->retrievedTimestampMsec;
  }
  /**
   * @param string
   */
  public function setRetrievedUrl($retrievedUrl)
  {
    $this->retrievedUrl = $retrievedUrl;
  }
  /**
   * @return string
   */
  public function getRetrievedUrl()
  {
    return $this->retrievedUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmbedsProvenance::class, 'Google_Service_Contentwarehouse_EmbedsProvenance');
