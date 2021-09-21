@api @preview-extension-required
Feature: previews of files downloaded through the webdav API

  Background:
    Given user "Alice" has been created with default attributes and without skeleton files

  Scenario Outline: download previews with invalid width
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "Cannot set width of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"
    Examples:
      | width |
      | 0     |
      | 0.5   |
      | -1    |
      | false |
      | true  |
      | A     |
      | %2F   |


  Scenario Outline: download previews with invalid height
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "Cannot set height of 0 or smaller!"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"
    Examples:
      | height |
      | 0      |
      | 0.5    |
      | -1     |
      | false  |
      | true   |
      | A      |
      | %2F    |


  Scenario: download previews of files inside sub-folders
    Given user "Alice" has created folder "subfolder"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/subfolder/parent.txt"
    When user "Alice" downloads the preview of "/subfolder/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high


  Scenario Outline: download previews of file types that don't support preview
    Given user "Alice" has uploaded file "filesForUpload/<filename>" to "/<newfilename>"
    When user "Alice" downloads the preview of "/<newfilename>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"
    Examples:
      | filename     | newfilename |
      | simple.pdf   | test.pdf    |
      | simple.odt   | test.odt    |
      | new-data.zip | test.zip    |


  Scenario Outline: download previews of different image file types
    Given user "Alice" has uploaded file "filesForUpload/<imageName>" to "/<newImageName>"
    When user "Alice" downloads the preview of "/<newImageName>" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    Examples:
      | imageName      | newImageName  |
      | testavatar.jpg | testimage.jpg |
      | testavatar.png | testimage.png |


  Scenario: download previews of image after renaming it
    Given user "Alice" has uploaded file "filesForUpload/testavatar.jpg" to "/testimage.jpg"
    When user "Alice" moves file "/testimage.jpg" to "/testimage.txt" using the WebDAV API
    And user "Alice" downloads the preview of "/testimage.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high


  Scenario: download previews of shared files (to shares folder)
    Given the administrator has set the default folder for received shares to "Shares"
    And auto-accept shares has been disabled
    And user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    And user "Brian" has accepted share "/parent.txt" offered by user "Alice"
    When user "Brian" downloads the preview of "/Shares/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded image should be "32" pixels wide and "32" pixels high

  @notToImplementOnOCIS
  Scenario: download previews of shared files (to root)
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And user "Alice" has shared file "/parent.txt" with user "Brian"
    When user "Brian" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "200"
    And the downloaded hexadecimal image content should be "09504e470d0a1a0a0000000d4948445200000020000000200806000000737a7af4000000097048597300000ec400000ec401952b0e1b000009a2494441545885c5977b4c54d7b7c73f330ccc20280c50b03c443a23140854406da0af885a54daa4691393268d09696b9b80ff946868b42da49aa6a66d024d8434a5d2a24da406b55a52b14a4533c5aa104026304a86ca48c16160780c8cf338ebfec1f5dc92dfbdbfdbdcfc6e7e2b393967eff5d8dfbdf6da6bada3511445f83792767a7a9a4f3ffd94c3870f333535f53f0a1e3d7af49f1a7af8f0e1ff0940885eafaf7eebadb7282e2e263c3c9cf9f9794e9f3ecdca952b898e8ec66ab5d2d9d9496f6f2f25252500b8dd6edc6e379191910c0e0e323939494d4d0d4f3ef924313131880856ab958e8e0e56ac5881d168646c6c8cf3e7cf939898483018647474148bc50257ae5c91bd7bf74a5f5f9f288a22efbdf79ed8ed76d9b3678f389d4ea9a8a810bbdd2e5bb66c114551445114f9edb7dfe4871f7e10455164dfbe7d62b3d9a4aaaa4aa6a7a7455114f1f97cb26ddb36f9e38f3fa4acac4c161717a5bcbc5c464646a4a2a2427a7b7b65f7eedd72efde3dd13df7dc73e4e7e7f3c9279fb073e74e6edfbecde9d3a779ecb1c7b05aad141616929a9acafaf5ebff5b178a08d1d1d1188d46a2a2a2d4f9fcfc7c525252c8cacac26ab5323232426b6b2bab57af0660ebd6ad242727a3ebebeb43afd7131b1b4b201020232383e2e262fc7e3f269389969616366edc487f7fbf6a3c262686b6b636cc6633232323180c061c0e073333332a88aeae2e86878719181860efdebd242424b073e74e3556341acdd2db66b349777737ebd6ad232f2f8fc5c5452e5cb8405c5c1ccf3efb2c369b8da1a121b2b2b230994c2a088bc5c2e2e22266b399d4d4542c160b46a391cccc4c028100fbf7efe7f9e79fa7a0a0809494145c2e171d1d1da4a7a7f3c4134f303f3fbfe48d47e7faaf7cfc7ebf1c3972e46fc9d2d5d525bdbdbd120c06c5eff7cbc4c484288a228140408e1d3b267ebf5f144591d9d9590906832acfe9748adfef97999919f1783ccb8c3ee22b8ab28c1f0804647676563c1e8f78bd5e71b95c12121717573d343484c964e2c08103cccfcf73f6ec59626363a9adadc56c36333636c6c58b17f9e69b6f282d2d65c78e1d848686525353c3e2e222f5f5f5949494101a1a8acfe7a3b4b41411c1ed7673e6cc19ce9e3d4b5656165555554c4e4e72f4e8516c361b972f5f4697939343666626a3a3a36cd9b285d75e7b8dcaca4ab2b2b278eaa9a7282c2cc462b1a0d168181f1f07203b3b9bb2b23206060678f7dd7701989898202d2d0d80f5ebd7f3ce3bef505e5eceba75eb080f0fa7afaf8f888808f6ecd9433018a4a4a4044551d0858484e0f3f9484c4ce4faf5eb0078bd5eb45a2d81400080e6e666eaebebb97af52a003a9d6e298b85842c8be847a4d7eb01888f8f67d7ae5d242626a2288aaa0fa0d56a51148590868686ea969616366cd880c7e3e1c71f7fe4d5575f25292989919111666767898989e1d2a54b6cdcb891ecec6c82c12066b3597d2b8a42525212e1e1e100288a82c96462c3860d343636d2d9d94946460606836199bcc16040f3d76264b7db59b3660d5aadf61f76f5ff45dabf0e1a1a1ae8e9e96178787899d0d0d010d3d3d3ff9205676767b15aadea5867b7db696868202121018d46c3c2c2022b56aca0a3a3838e8e0e727272b874e912c9c9c9545454d0dcdccc83070fd8b56b1739393900d4d6d6e2f3f978e69967b87dfb366fbef926333333fcf2cb2f44444460b55a999b9b63f3e6cd58ad56060606a8acacc46432a16b6c6ce4e0c1838808870e1d62727212bd5ecf993367a8adad05c0e974525a5a4a7474349b376fa6a7a7870b172ea80046464678e59557282a2ae2fcf9f388083e9f8ffbf7ef13151545717131050505ecdfbf9f975e7a89b56bd7aa5955ab280a2121216a64ff336a6b6ba3abab8bdcdc5c44feab8ff9e28b2f989f9fe7c8912368341a1445c1e3f1a8fcc8c84860e9b668349a65babab2b2326a6a6a484848c06c3663341a898c8c64c78e1d7cf4d147e4e4e4b069d326eaebebd9be7d3b369b0dafd74b5252926aa4aeae0e9fcfa7f603d5d5d5c4c4c49094944444440406830180e4e4643232323874e810e9e9e9a4a7a72fbf05ff0ed2feef224b59aeaeaeee6f1b6d6d6d657e7efe6fc9ea0607073977ee1cc9c9c9bcfefaeb343535e172b978fbedb70904027cfdf5d7ac5ab58a6030a82a0d0f0f73ead429d2d2d2c8cfcfc76eb7b36ddb36262626703a9dc4c7c7a3d3e9b0582c582c168a8a8a282a2a02c0e7f3515f5f4f2010a0b2b2120e1c382076bb5dfc7ebfb4b7b7cb891327e4ce9d3bf2e1871f4a555595b85c2ee9ecec94cf3fff5cad76e5e5e5e2f3f9a4a1a141dadadaa4b2b2521445919e9e1e397efcb81c3e7c58a6a6a6646e6e4e161717a5a2a242d5adadad95fefe7e09068372f9f265d1bdfffefb343535313535456262220e8703afd7cb8b2fbec8a953a7301a8da4a5a571e3c60dd503a1a1a1e8743ad2d2d29679e6afdf8aa2f0c1071f909797c7cccc8c3aef703896824fa3c1e170a0bd7af52aab57af6672725275a3c160202c2c8c828202eaeaea387efcf8b2734b4848e0db6fbfa5b5b51580c71f7f9c63c78e71f2e4c965001e3c78a0169d47f4f2cb2f535d5dcd77df7dc7d6ad5bd178bd5e191b1b5b6a10753abc5e2f131313a4a4a4a0d56a191f1f272a2a8a909010c2c2c296ed647070904020c0f6eddb191d1d253e3e5e5d50afd7333737c7c3870f59b56ad5325db7db8dcfe75b920f0b0b63eddab56a2232180ca4a6a6a2d56ad5a0b97bf7ee320300b76edd42afd7ab5d6e4a4a0a7abd9ee6e666b51caf5cb992b8b8b87fd08d8e8e263e3e1ef8cf6b78edda35ac562b636363389d4e16161680a5141b1111b1acdd9e9a9aa2adad8d818101cc6633999999fcfcf3cfd8ed7660a970018c8f8ff3d34f3f313b3bab7aece2c58b288a425757173d3d3d4b00befffe7b1c0e0756ab952fbffc92f6f676eedcb903407d7d3d77efdee5e6cd9b2a80aaaa2a525353d5e6e5e0c183242424f0d5575f71efde3d003c1e0f1f7ffc316bd6aca1aaaa0a11e18d37de60d5aa55b4b4b4303636c6afbffecaf5ebd7d1ddba758bcf3efb0c11e1f7df7f5fe6aabfe66c00bfdf8fd168243b3b9b175e7801588afc47edfc237d9bcd46616121393939c4c6c6e2f178d8b469134f3ffd34274e9cc06432e1f57a595858409b919141676727d7ae5d43a3d110151585cd66a3bbbb9bb9b9b96500424343999e9ec6e572d1ddddadcefff9e79f747474909b9b0b80c964a2bbbb9bc9c9499c4e271111116a4ce5e6e6929e9eceeeddbbc9cbcb834020202d2d2d72e5ca15d9b76f9f0402013979f2a4b4b7b7cbe0e0a0b85c2e71381c6a22b1dbedd2d8d828376fde9485850571bbddd2d4d424376edc104551d47fcca1a121696c6c94fbf7ef8ba228d2dfdfafda3877ee9c34353589dbed96ff0040caa493186e05c30000000049454e44ae426082"
    And the downloaded image should be "32" pixels wide and "32" pixels high


  Scenario: download previews of other users files
    Given user "Brian" has been created with default attributes and without skeleton files
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Brian" downloads the preview of "/parent.txt" of "Alice" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "File not found: parent.txt in '%username%'"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: download previews of folders
    Given user "Alice" has created folder "subfolder"
    When user "Alice" downloads the preview of "/subfolder/" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "Unsupported file type"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"


  Scenario: download previews of not-existing files
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:message" in the response about user "Alice" should be "File with name parent.txt could not be located"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: Download file previews when it is disabled by the administrator
    Given the administrator has updated system config key "enable_previews" with value "false" and type "boolean"
    And user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: unset maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "null"
    And the administrator has updated system config key "preview_max_y" with value "null"
    When user "Alice" downloads the preview of "/parent.txt" with width "32" and height "32" using the WebDAV API
    Then the HTTP status code should be "404"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\NotFound"


  Scenario: set maximum size of previews
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    When the administrator updates system config key "preview_max_x" with value "null" using the occ command
    And the administrator updates system config key "preview_max_y" with value "null" using the occ command
    Then the HTTP status code should be "201"
    When user "Alice" downloads the preview of "/parent.txt" with width "null" and height "null" using the WebDAV API
    Then the HTTP status code should be "400"
    And the value of the item "/d:error/s:exception" in the response about user "Alice" should be "Sabre\DAV\Exception\BadRequest"


  Scenario Outline: download previews of different size smaller than the maximum size set
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "32"
    And the administrator has updated system config key "preview_max_y" with value "32"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "<http-code>"
    And the downloaded image should be "<width>" pixels wide and "<height>" pixels high
    Examples:
      | width | height | http-code |
      | 32    | 32     | 200       |
      | 12    | 12     | 200       |
      | 32    | 12     | 200       |
      | 12    | 32     | 200       |


  Scenario Outline: download previews of different size larger than the maximum size set
    Given user "Alice" has uploaded file "filesForUpload/lorem.txt" to "/parent.txt"
    And the administrator has updated system config key "preview_max_x" with value "32"
    And the administrator has updated system config key "preview_max_y" with value "32"
    When user "Alice" downloads the preview of "/parent.txt" with width "<width>" and height "<height>" using the WebDAV API
    Then the HTTP status code should be "<http-code>"
    And the downloaded image should be "32" pixels wide and "32" pixels high
    Examples:
      | width | height | http-code |
      | 64    | 64     | 200       |
      | 2048  | 2048   | 200       |
