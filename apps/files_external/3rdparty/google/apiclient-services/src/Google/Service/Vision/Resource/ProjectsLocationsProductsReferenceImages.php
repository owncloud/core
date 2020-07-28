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

/**
 * The "referenceImages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $visionService = new Google_Service_Vision(...);
 *   $referenceImages = $visionService->referenceImages;
 *  </code>
 */
class Google_Service_Vision_Resource_ProjectsLocationsProductsReferenceImages extends Google_Service_Resource
{
  /**
   * Creates and returns a new ReferenceImage resource.
   *
   * The `bounding_poly` field is optional. If `bounding_poly` is not specified,
   * the system will try to detect regions of interest in the image that are
   * compatible with the product_category on the parent product. If it is
   * specified, detection is ALWAYS skipped. The system converts polygons into
   * non-rotated rectangles.
   *
   * Note that the pipeline will resize the image if the image resolution is too
   * large to process (above 50MP).
   *
   * Possible errors:
   *
   * * Returns INVALID_ARGUMENT if the image_uri is missing or longer than 4096
   * characters. * Returns INVALID_ARGUMENT if the product does not exist. *
   * Returns INVALID_ARGUMENT if bounding_poly is not provided, and nothing
   * compatible with the parent product's product_category is detected. * Returns
   * INVALID_ARGUMENT if bounding_poly contains more than 10 polygons.
   * (referenceImages.create)
   *
   * @param string $parent Required. Resource name of the product in which to
   * create the reference image.
   *
   * Format is `projects/PROJECT_ID/locations/LOC_ID/products/PRODUCT_ID`.
   * @param Google_Service_Vision_ReferenceImage $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string referenceImageId A user-supplied resource id for the
   * ReferenceImage to be added. If set, the server will attempt to use this value
   * as the resource id. If it is already in use, an error is returned with code
   * ALREADY_EXISTS. Must be at most 128 characters long. It cannot contain the
   * character `/`.
   * @return Google_Service_Vision_ReferenceImage
   */
  public function create($parent, Google_Service_Vision_ReferenceImage $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_Vision_ReferenceImage");
  }
  /**
   * Permanently deletes a reference image.
   *
   * The image metadata will be deleted right away, but search queries against
   * ProductSets containing the image may still work until all related caches are
   * refreshed.
   *
   * The actual image files are not deleted from Google Cloud Storage.
   * (referenceImages.delete)
   *
   * @param string $name Required. The resource name of the reference image to
   * delete.
   *
   * Format is:
   *
   * `projects/PROJECT_ID/locations/LOC_ID/products/PRODUCT_ID/referenceImages/IMA
   * GE_ID`
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_VisionEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_Vision_VisionEmpty");
  }
  /**
   * Gets information associated with a ReferenceImage.
   *
   * Possible errors:
   *
   * * Returns NOT_FOUND if the specified image does not exist.
   * (referenceImages.get)
   *
   * @param string $name Required. The resource name of the ReferenceImage to get.
   *
   * Format is:
   *
   * `projects/PROJECT_ID/locations/LOC_ID/products/PRODUCT_ID/referenceImages/IMA
   * GE_ID`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_Vision_ReferenceImage
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_Vision_ReferenceImage");
  }
  /**
   * Lists reference images.
   *
   * Possible errors:
   *
   * * Returns NOT_FOUND if the parent product does not exist. * Returns
   * INVALID_ARGUMENT if the page_size is greater than 100, or less   than 1.
   * (referenceImages.listProjectsLocationsProductsReferenceImages)
   *
   * @param string $parent Required. Resource name of the product containing the
   * reference images.
   *
   * Format is `projects/PROJECT_ID/locations/LOC_ID/products/PRODUCT_ID`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of items to return. Default 10,
   * maximum 100.
   * @opt_param string pageToken A token identifying a page of results to be
   * returned. This is the value of `nextPageToken` returned in a previous
   * reference image list request.
   *
   * Defaults to the first page if not specified.
   * @return Google_Service_Vision_ListReferenceImagesResponse
   */
  public function listProjectsLocationsProductsReferenceImages($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_Vision_ListReferenceImagesResponse");
  }
}
