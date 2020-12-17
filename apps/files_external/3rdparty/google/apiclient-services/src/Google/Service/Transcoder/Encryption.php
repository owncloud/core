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

class Google_Service_Transcoder_Encryption extends Google_Model
{
  protected $aes128Type = 'Google_Service_Transcoder_Aes128Encryption';
  protected $aes128DataType = '';
  public $iv;
  public $key;
  protected $mpegCencType = 'Google_Service_Transcoder_MpegCommonEncryption';
  protected $mpegCencDataType = '';
  protected $sampleAesType = 'Google_Service_Transcoder_SampleAesEncryption';
  protected $sampleAesDataType = '';

  /**
   * @param Google_Service_Transcoder_Aes128Encryption
   */
  public function setAes128(Google_Service_Transcoder_Aes128Encryption $aes128)
  {
    $this->aes128 = $aes128;
  }
  /**
   * @return Google_Service_Transcoder_Aes128Encryption
   */
  public function getAes128()
  {
    return $this->aes128;
  }
  public function setIv($iv)
  {
    $this->iv = $iv;
  }
  public function getIv()
  {
    return $this->iv;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param Google_Service_Transcoder_MpegCommonEncryption
   */
  public function setMpegCenc(Google_Service_Transcoder_MpegCommonEncryption $mpegCenc)
  {
    $this->mpegCenc = $mpegCenc;
  }
  /**
   * @return Google_Service_Transcoder_MpegCommonEncryption
   */
  public function getMpegCenc()
  {
    return $this->mpegCenc;
  }
  /**
   * @param Google_Service_Transcoder_SampleAesEncryption
   */
  public function setSampleAes(Google_Service_Transcoder_SampleAesEncryption $sampleAes)
  {
    $this->sampleAes = $sampleAes;
  }
  /**
   * @return Google_Service_Transcoder_SampleAesEncryption
   */
  public function getSampleAes()
  {
    return $this->sampleAes;
  }
}
