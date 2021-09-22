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

namespace Google\Service\AndroidPublisher\Resource;

use Google\Service\AndroidPublisher\ImagesDeleteAllResponse;
use Google\Service\AndroidPublisher\ImagesListResponse;
use Google\Service\AndroidPublisher\ImagesUploadResponse;

/**
 * The "images" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google\Service\AndroidPublisher(...);
 *   $images = $androidpublisherService->images;
 *  </code>
 */
class EditsImages extends \Google\Service\Resource
{
  /**
   * Deletes the image (specified by id) from the edit. (images.delete)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German).
   * @param string $imageType Type of the Image.
   * @param string $imageId Unique identifier an image within the set of images
   * attached to this edit.
   * @param array $optParams Optional parameters.
   */
  public function delete($packageName, $editId, $language, $imageType, $imageId, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType, 'imageId' => $imageId];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params]);
  }
  /**
   * Deletes all images for the specified language and image type. Returns an
   * empty response if no images are found. (images.deleteall)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German). Providing a language that is not
   * supported by the App is a no-op.
   * @param string $imageType Type of the Image. Providing an image type that
   * refers to no images is a no-op.
   * @param array $optParams Optional parameters.
   * @return ImagesDeleteAllResponse
   */
  public function deleteall($packageName, $editId, $language, $imageType, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType];
    $params = array_merge($params, $optParams);
    return $this->call('deleteall', [$params], ImagesDeleteAllResponse::class);
  }
  /**
   * Lists all images. The response may be empty. (images.listEditsImages)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German). There must be a store listing for
   * the specified language.
   * @param string $imageType Type of the Image. Providing an image type that
   * refers to no images will return an empty response.
   * @param array $optParams Optional parameters.
   * @return ImagesListResponse
   */
  public function listEditsImages($packageName, $editId, $language, $imageType, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ImagesListResponse::class);
  }
  /**
   * Uploads an image of the specified language and image type, and adds to the
   * edit. (images.upload)
   *
   * @param string $packageName Package name of the app.
   * @param string $editId Identifier of the edit.
   * @param string $language Language localization code (a BCP-47 language tag;
   * for example, "de-AT" for Austrian German). Providing a language that is not
   * supported by the App is a no-op.
   * @param string $imageType Type of the Image.
   * @param array $optParams Optional parameters.
   * @return ImagesUploadResponse
   */
  public function upload($packageName, $editId, $language, $imageType, $optParams = [])
  {
    $params = ['packageName' => $packageName, 'editId' => $editId, 'language' => $language, 'imageType' => $imageType];
    $params = array_merge($params, $optParams);
    return $this->call('upload', [$params], ImagesUploadResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EditsImages::class, 'Google_Service_AndroidPublisher_Resource_EditsImages');
