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

class Google_Service_PeopleService_UpdateContactPhotoRequest extends Google_Model
{
  public $personFields;
  public $photoBytes;

  public function setPersonFields($personFields)
  {
    $this->personFields = $personFields;
  }
  public function getPersonFields()
  {
    return $this->personFields;
  }
  public function setPhotoBytes($photoBytes)
  {
    $this->photoBytes = $photoBytes;
  }
  public function getPhotoBytes()
  {
    return $this->photoBytes;
  }
}
