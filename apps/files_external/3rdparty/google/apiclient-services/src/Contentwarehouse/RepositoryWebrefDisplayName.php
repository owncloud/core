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

class RepositoryWebrefDisplayName extends \Google\Model
{
  /**
   * @var string
   */
  public $canonicalName;
  /**
   * @var string
   */
  public $language;
  /**
   * @var string
   */
  public $subjectName;

  /**
   * @param string
   */
  public function setCanonicalName($canonicalName)
  {
    $this->canonicalName = $canonicalName;
  }
  /**
   * @return string
   */
  public function getCanonicalName()
  {
    return $this->canonicalName;
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
  public function setSubjectName($subjectName)
  {
    $this->subjectName = $subjectName;
  }
  /**
   * @return string
   */
  public function getSubjectName()
  {
    return $this->subjectName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RepositoryWebrefDisplayName::class, 'Google_Service_Contentwarehouse_RepositoryWebrefDisplayName');
