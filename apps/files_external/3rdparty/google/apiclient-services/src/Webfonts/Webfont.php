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

namespace Google\Service\Webfonts;

class Webfont extends \Google\Collection
{
  protected $collection_key = 'variants';
  /**
   * @var string
   */
  public $category;
  /**
   * @var string
   */
  public $family;
  /**
   * @var string[]
   */
  public $files;
  /**
   * @var string
   */
  public $kind;
  /**
   * @var string
   */
  public $lastModified;
  /**
   * @var string[]
   */
  public $subsets;
  /**
   * @var string[]
   */
  public $variants;
  /**
   * @var string
   */
  public $version;

  /**
   * @param string
   */
  public function setCategory($category)
  {
    $this->category = $category;
  }
  /**
   * @return string
   */
  public function getCategory()
  {
    return $this->category;
  }
  /**
   * @param string
   */
  public function setFamily($family)
  {
    $this->family = $family;
  }
  /**
   * @return string
   */
  public function getFamily()
  {
    return $this->family;
  }
  /**
   * @param string[]
   */
  public function setFiles($files)
  {
    $this->files = $files;
  }
  /**
   * @return string[]
   */
  public function getFiles()
  {
    return $this->files;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param string
   */
  public function setLastModified($lastModified)
  {
    $this->lastModified = $lastModified;
  }
  /**
   * @return string
   */
  public function getLastModified()
  {
    return $this->lastModified;
  }
  /**
   * @param string[]
   */
  public function setSubsets($subsets)
  {
    $this->subsets = $subsets;
  }
  /**
   * @return string[]
   */
  public function getSubsets()
  {
    return $this->subsets;
  }
  /**
   * @param string[]
   */
  public function setVariants($variants)
  {
    $this->variants = $variants;
  }
  /**
   * @return string[]
   */
  public function getVariants()
  {
    return $this->variants;
  }
  /**
   * @param string
   */
  public function setVersion($version)
  {
    $this->version = $version;
  }
  /**
   * @return string
   */
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Webfont::class, 'Google_Service_Webfonts_Webfont');
