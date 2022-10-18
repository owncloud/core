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

class PseudoVideoData extends \Google\Model
{
  protected $internal_gapi_mappings = [
        "asrModel" => "AsrModel",
        "docKey" => "DocKey",
        "lang" => "Lang",
        "mustangDocId" => "MustangDocId",
        "url" => "Url",
  ];
  /**
   * @var string
   */
  public $asrModel;
  /**
   * @var string
   */
  public $docKey;
  /**
   * @var string
   */
  public $lang;
  /**
   * @var string
   */
  public $mustangDocId;
  /**
   * @var string
   */
  public $url;
  /**
   * @var string
   */
  public $s3Mode;
  /**
   * @var string
   */
  public $s3ModelInfoLabel;
  protected $transcriptType = PseudoVideoDataTranscript::class;
  protected $transcriptDataType = '';

  /**
   * @param string
   */
  public function setAsrModel($asrModel)
  {
    $this->asrModel = $asrModel;
  }
  /**
   * @return string
   */
  public function getAsrModel()
  {
    return $this->asrModel;
  }
  /**
   * @param string
   */
  public function setDocKey($docKey)
  {
    $this->docKey = $docKey;
  }
  /**
   * @return string
   */
  public function getDocKey()
  {
    return $this->docKey;
  }
  /**
   * @param string
   */
  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  /**
   * @return string
   */
  public function getLang()
  {
    return $this->lang;
  }
  /**
   * @param string
   */
  public function setMustangDocId($mustangDocId)
  {
    $this->mustangDocId = $mustangDocId;
  }
  /**
   * @return string
   */
  public function getMustangDocId()
  {
    return $this->mustangDocId;
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
  public function setS3Mode($s3Mode)
  {
    $this->s3Mode = $s3Mode;
  }
  /**
   * @return string
   */
  public function getS3Mode()
  {
    return $this->s3Mode;
  }
  /**
   * @param string
   */
  public function setS3ModelInfoLabel($s3ModelInfoLabel)
  {
    $this->s3ModelInfoLabel = $s3ModelInfoLabel;
  }
  /**
   * @return string
   */
  public function getS3ModelInfoLabel()
  {
    return $this->s3ModelInfoLabel;
  }
  /**
   * @param PseudoVideoDataTranscript
   */
  public function setTranscript(PseudoVideoDataTranscript $transcript)
  {
    $this->transcript = $transcript;
  }
  /**
   * @return PseudoVideoDataTranscript
   */
  public function getTranscript()
  {
    return $this->transcript;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PseudoVideoData::class, 'Google_Service_Contentwarehouse_PseudoVideoData');
