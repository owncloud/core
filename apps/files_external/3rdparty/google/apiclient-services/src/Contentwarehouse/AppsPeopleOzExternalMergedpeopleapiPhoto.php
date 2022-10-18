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

class AppsPeopleOzExternalMergedpeopleapiPhoto extends \Google\Collection
{
  protected $collection_key = 'htmlAttribution';
  /**
   * @var string
   */
  public $emojiAvatarUrl;
  /**
   * @var string
   */
  public $glyph;
  /**
   * @var string[]
   */
  public $htmlAttribution;
  /**
   * @var bool
   */
  public $isDefault;
  /**
   * @var bool
   */
  public $isMonogram;
  protected $metadataType = AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata::class;
  protected $metadataDataType = '';
  /**
   * @var string
   */
  public $monogramBackground;
  protected $photoIdType = AppsPeopleOzExternalMergedpeopleapiPhotoPhotoStorageId::class;
  protected $photoIdDataType = '';
  /**
   * @var string
   */
  public $photoToken;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $viewerUrl;

  /**
   * @param string
   */
  public function setEmojiAvatarUrl($emojiAvatarUrl)
  {
    $this->emojiAvatarUrl = $emojiAvatarUrl;
  }
  /**
   * @return string
   */
  public function getEmojiAvatarUrl()
  {
    return $this->emojiAvatarUrl;
  }
  /**
   * @param string
   */
  public function setGlyph($glyph)
  {
    $this->glyph = $glyph;
  }
  /**
   * @return string
   */
  public function getGlyph()
  {
    return $this->glyph;
  }
  /**
   * @param string[]
   */
  public function setHtmlAttribution($htmlAttribution)
  {
    $this->htmlAttribution = $htmlAttribution;
  }
  /**
   * @return string[]
   */
  public function getHtmlAttribution()
  {
    return $this->htmlAttribution;
  }
  /**
   * @param bool
   */
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  /**
   * @return bool
   */
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  /**
   * @param bool
   */
  public function setIsMonogram($isMonogram)
  {
    $this->isMonogram = $isMonogram;
  }
  /**
   * @return bool
   */
  public function getIsMonogram()
  {
    return $this->isMonogram;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function setMetadata(AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPersonFieldMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param string
   */
  public function setMonogramBackground($monogramBackground)
  {
    $this->monogramBackground = $monogramBackground;
  }
  /**
   * @return string
   */
  public function getMonogramBackground()
  {
    return $this->monogramBackground;
  }
  /**
   * @param AppsPeopleOzExternalMergedpeopleapiPhotoPhotoStorageId
   */
  public function setPhotoId(AppsPeopleOzExternalMergedpeopleapiPhotoPhotoStorageId $photoId)
  {
    $this->photoId = $photoId;
  }
  /**
   * @return AppsPeopleOzExternalMergedpeopleapiPhotoPhotoStorageId
   */
  public function getPhotoId()
  {
    return $this->photoId;
  }
  /**
   * @param string
   */
  public function setPhotoToken($photoToken)
  {
    $this->photoToken = $photoToken;
  }
  /**
   * @return string
   */
  public function getPhotoToken()
  {
    return $this->photoToken;
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
  /**
   * @param string
   */
  public function setViewerUrl($viewerUrl)
  {
    $this->viewerUrl = $viewerUrl;
  }
  /**
   * @return string
   */
  public function getViewerUrl()
  {
    return $this->viewerUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AppsPeopleOzExternalMergedpeopleapiPhoto::class, 'Google_Service_Contentwarehouse_AppsPeopleOzExternalMergedpeopleapiPhoto');
