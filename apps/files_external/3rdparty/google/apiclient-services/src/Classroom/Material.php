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

namespace Google\Service\Classroom;

class Material extends \Google\Model
{
  protected $driveFileType = SharedDriveFile::class;
  protected $driveFileDataType = '';
  protected $formType = Form::class;
  protected $formDataType = '';
  protected $linkType = Link::class;
  protected $linkDataType = '';
  protected $youtubeVideoType = YouTubeVideo::class;
  protected $youtubeVideoDataType = '';

  /**
   * @param SharedDriveFile
   */
  public function setDriveFile(SharedDriveFile $driveFile)
  {
    $this->driveFile = $driveFile;
  }
  /**
   * @return SharedDriveFile
   */
  public function getDriveFile()
  {
    return $this->driveFile;
  }
  /**
   * @param Form
   */
  public function setForm(Form $form)
  {
    $this->form = $form;
  }
  /**
   * @return Form
   */
  public function getForm()
  {
    return $this->form;
  }
  /**
   * @param Link
   */
  public function setLink(Link $link)
  {
    $this->link = $link;
  }
  /**
   * @return Link
   */
  public function getLink()
  {
    return $this->link;
  }
  /**
   * @param YouTubeVideo
   */
  public function setYoutubeVideo(YouTubeVideo $youtubeVideo)
  {
    $this->youtubeVideo = $youtubeVideo;
  }
  /**
   * @return YouTubeVideo
   */
  public function getYoutubeVideo()
  {
    return $this->youtubeVideo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Material::class, 'Google_Service_Classroom_Material');
