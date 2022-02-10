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

namespace Google\Service\PeopleService;

class UpdateContactPhotoRequest extends \Google\Collection
{
  protected $collection_key = 'sources';
  /**
   * @var string
   */
  public $personFields;
  /**
   * @var string
   */
  public $photoBytes;
  /**
   * @var string[]
   */
  public $sources;

  /**
   * @param string
   */
  public function setPersonFields($personFields)
  {
    $this->personFields = $personFields;
  }
  /**
   * @return string
   */
  public function getPersonFields()
  {
    return $this->personFields;
  }
  /**
   * @param string
   */
  public function setPhotoBytes($photoBytes)
  {
    $this->photoBytes = $photoBytes;
  }
  /**
   * @return string
   */
  public function getPhotoBytes()
  {
    return $this->photoBytes;
  }
  /**
   * @param string[]
   */
  public function setSources($sources)
  {
    $this->sources = $sources;
  }
  /**
   * @return string[]
   */
  public function getSources()
  {
    return $this->sources;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UpdateContactPhotoRequest::class, 'Google_Service_PeopleService_UpdateContactPhotoRequest');
