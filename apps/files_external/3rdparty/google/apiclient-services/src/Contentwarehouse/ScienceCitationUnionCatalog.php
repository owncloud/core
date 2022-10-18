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

class ScienceCitationUnionCatalog extends \Google\Collection
{
  protected $collection_key = 'Subject';
  protected $internal_gapi_mappings = [
        "canonicalUrlfp" => "CanonicalUrlfp",
        "metadataUrl" => "MetadataUrl",
        "numLibraries" => "NumLibraries",
        "subject" => "Subject",
        "url" => "Url",
  ];
  /**
   * @var string
   */
  public $canonicalUrlfp;
  /**
   * @var string
   */
  public $metadataUrl;
  /**
   * @var int
   */
  public $numLibraries;
  /**
   * @var string[]
   */
  public $subject;
  /**
   * @var string
   */
  public $url;

  /**
   * @param string
   */
  public function setCanonicalUrlfp($canonicalUrlfp)
  {
    $this->canonicalUrlfp = $canonicalUrlfp;
  }
  /**
   * @return string
   */
  public function getCanonicalUrlfp()
  {
    return $this->canonicalUrlfp;
  }
  /**
   * @param string
   */
  public function setMetadataUrl($metadataUrl)
  {
    $this->metadataUrl = $metadataUrl;
  }
  /**
   * @return string
   */
  public function getMetadataUrl()
  {
    return $this->metadataUrl;
  }
  /**
   * @param int
   */
  public function setNumLibraries($numLibraries)
  {
    $this->numLibraries = $numLibraries;
  }
  /**
   * @return int
   */
  public function getNumLibraries()
  {
    return $this->numLibraries;
  }
  /**
   * @param string[]
   */
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return string[]
   */
  public function getSubject()
  {
    return $this->subject;
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
class_alias(ScienceCitationUnionCatalog::class, 'Google_Service_Contentwarehouse_ScienceCitationUnionCatalog');
