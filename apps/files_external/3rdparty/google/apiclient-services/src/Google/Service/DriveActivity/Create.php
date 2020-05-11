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

class Google_Service_DriveActivity_Create extends Google_Model
{
  protected $copyType = 'Google_Service_DriveActivity_Copy';
  protected $copyDataType = '';
  protected $newType = 'Google_Service_DriveActivity_DriveactivityNew';
  protected $newDataType = '';
  protected $uploadType = 'Google_Service_DriveActivity_Upload';
  protected $uploadDataType = '';

  /**
   * @param Google_Service_DriveActivity_Copy
   */
  public function setCopy(Google_Service_DriveActivity_Copy $copy)
  {
    $this->copy = $copy;
  }
  /**
   * @return Google_Service_DriveActivity_Copy
   */
  public function getCopy()
  {
    return $this->copy;
  }
  /**
   * @param Google_Service_DriveActivity_DriveactivityNew
   */
  public function setNew(Google_Service_DriveActivity_DriveactivityNew $new)
  {
    $this->new = $new;
  }
  /**
   * @return Google_Service_DriveActivity_DriveactivityNew
   */
  public function getNew()
  {
    return $this->new;
  }
  /**
   * @param Google_Service_DriveActivity_Upload
   */
  public function setUpload(Google_Service_DriveActivity_Upload $upload)
  {
    $this->upload = $upload;
  }
  /**
   * @return Google_Service_DriveActivity_Upload
   */
  public function getUpload()
  {
    return $this->upload;
  }
}
